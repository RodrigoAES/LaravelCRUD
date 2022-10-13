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

    public function read(Request $r) {
        $post = new Post();

        $post = $post->find();
        dd($post);
    }

    public function all(Request $r) {
        $posts = Post::all();

        return $posts;
    }

    public function update(Request $r) {
        $post = Post::find(2);
        $post->title = 'Meu post atualizado';
        $post->save();

        $posts = Post::where('id','>', 2)->update([
            'title' => 'novo título',
            'content' => 'novo content',
            'author' => 'rodrigo alves'
        ]);

        return $post;
    }

    public function delete(Request $r) {
        $post = Post::find(2);
        if($post) {
            $post->delete();
        }   

        $post = Post::where('id', '>', 0)->delete();
    }
}
