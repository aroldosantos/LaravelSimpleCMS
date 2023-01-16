<?php

namespace App\Http\Controllers\Painel;

use App\Contracts\CategoriaRepositoryInterface;
use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct(
        protected PostRepositoryInterface $posts,
        protected CategoriaRepositoryInterface $categorias
    ) {}

    public function index()
    {
        return $this->posts->getAll();
    }

    public function create()
    {
        $categorias = $this->categorias->getAll();
        return view('painel.posts.posts_create', [
            'categorias' => $categorias,
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
        $data['img_dest'] = $this->imagePath($request);

        $this->posts->create($data);
        return redirect()->route('posts.create')->with('status', 'Post criado com sucesso!');

    }

    public function show($id)
    {
        return $this->posts->find($id);
    }

    public function edit($id)
    {
        $post = $this->posts->find($id);
        $categorias = $this->categorias->getAll();

        return view('painel.posts.posts_update', [
            'post' => $post,
            'categorias' => $categorias,
        ]);
    }

    public function update(PostStoreRequest $request)
    {
        $id = $request->post_id;
        $data = $request->validated();
        $data['img_dest'] = $this->imagePath($request);

        $this->deleteImage($id);
        $this->posts->update($data, $id);
        return redirect()->route('posts.edit', ['id' => $id])->with('status', 'Post Atualizado com sucesso!');
    }

    public function delete($id)
    {
        $this->deleteImage($id);
        $this->posts->destroy($id);
        return redirect()->route('posts')->with('status', 'Post excluído com sucesso!');
    }

    public function deleteImage($id)
    {
        $image = $this->posts->find($id)->img_dest;
        if ($image) {
            Storage::delete($image);
        }
    }

    public function imagePath(PostStoreRequest $request)
    {
        if ($request->file('image')) {
            $path = $request->image->store('public/images');
            return $path;
        }
    }

}
