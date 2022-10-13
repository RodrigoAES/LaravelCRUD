<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(Request $request) {
        $new_post = [
            'title' => 'Meu primeiro post',
            'content' => 'conteúdo qualquer',
            'author' => 'Rodrigo'
        ];

        $post = new Post($new_post);
        $post->save();

        $post = new Post();
        $post->title = 'Meu segundo post';
        $post->content = 'conteudo do segundo post';
        $post->author = 'Rodrigo alves';
        $post->save();

        dd($post);
    }
}
