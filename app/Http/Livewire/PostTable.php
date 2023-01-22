<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class PostTable extends TableComponent
{

    public $per_page = 15;
    public $header_title = 'Posts';
    public $header_breadcrumb = 'Posts';
    public $tb_title = 'Listagem de posts';
    public $tb_desc = 'Posts cadastrados no sistema';
    public $btn_create = 'Novo Post';
    public $btn_create_href = 'posts.create';
    public $checkbox = false;

    public function query()
    {
        if (Auth::user()->administrator == 'N') {
            return Post::with('category', 'user')->where('user_id', Auth::id());
        }

        return Post::with('category', 'user');
    }

    public function columns()
    {
        return [
            Column::make('ID', 'id')->searchable()->sortable(),
            Column::make('Título', 'title')->searchable()->sortable(),
            Column::make('Autor', 'user.name')->searchable()->sortable(),
            Column::make('Categoria', 'category.category')->searchable()->sortable(),
            Column::make('Data', 'created_at')->view('painel.posts.post_date_table')->searchable()->sortable(),
            Column::make('Operações')->view('painel.posts.post-links-table'),
        ];
    }
}
