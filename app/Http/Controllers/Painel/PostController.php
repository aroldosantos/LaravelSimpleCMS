<?php

/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Http\Controllers\Painel;

use App\Contracts\CategoriaRepositoryInterface;
use App\Contracts\PostRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostController Controller
 */
class PostController extends Controller
{
    /**
     * PostController constructor
     * @param PostRepositoryInterface $posts,
     * @param CategoriaRepositoryInterface $categorias
     */
    public function __construct(
        protected PostRepositoryInterface $posts,
        protected CategoriaRepositoryInterface $categorias
    ) {}

    /**
     * Index Method
     *
     * Returns all posts
     */
    public function index()
    {
        return $this->posts->getAll();
    }

    /**
     * Create method
     *
     * Form for creating a new post
     */
    public function create()
    {
        $categorias = $this->categorias->getAll();
        return view('painel.posts.posts_create', [
            'categorias' => $categorias,
        ]);
    }

    /**
     * Store method
     * @param PostStoreRequest $request
     *
     * Validate and create a new post with the information received
     */
    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
        $data['img_dest'] = $this->imagePath($request);

        $this->posts->create($data);
        return redirect()->route('posts.create')->with('status', 'Post criado com sucesso!');

    }

    /**
     * Show method
     * @param int $id
     *
     * Find a specific post
     */
    public function show($id)
    {
        return $this->posts->find($id);
    }

    /**
     * Edit method
     * @param int $id
     *
     * Form to update a specific post
     */
    public function edit($id)
    {
        $post = $this->posts->find($id);
        $categorias = $this->categorias->getAll();

        return view('painel.posts.posts_update', [
            'post' => $post,
            'categorias' => $categorias,
        ]);
    }

    /**
     * update method
     * @param PostStoreRequest $request
     *
     * validate and update a specific post with the information received
     */
    public function update(PostStoreRequest $request)
    {
        $id = $request->post_id;
        $data = $request->validated();
        $data['img_dest'] = $this->imagePath($request);

        $this->deleteImage($id);
        $this->posts->update($data, $id);
        return redirect()->route('posts.edit', ['id' => $id])->with('status', 'Post Atualizado com sucesso!');
    }

    /**
     * Delete method
     * @param int $id
     *
     * Delete a specific post
     */
    public function delete($id)
    {
        $this->deleteImage($id);
        $this->posts->destroy($id);
        return redirect()->route('posts')->with('status', 'Post excluído com sucesso!');
    }

    /**
     * DeleteImage method
     * @param int $id
     *
     * Find and delete the post image if any
     */
    public function deleteImage($id)
    {
        $image = $this->posts->find($id)->img_dest;
        if ($image) {
            Storage::delete($image);
        }
    }

    /**
     * ImagePath method
     * @param PostStoreRequest $request
     *
     * Returns the relative path of the image with its name after creation.
     */
    public function imagePath(PostStoreRequest $request)
    {
        if ($request->file('image')) {
            $path = $request->image->store('public/images');
            return $path;
        }
    }

}
