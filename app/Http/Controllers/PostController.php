<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = new Post();

        $post = $post->find($id);
        dd($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find(2);
        $post->title = 'Meu post atualizado';
        $post->save();

        $posts = Post::find($id)->update([
            'title' => 'novo título',
            'content' => 'novo content',
            'author' => 'rodrigo alves'
        ]);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post) {
            $post->delete();
        }   

        $post = Post::find($id)->delete();
    }
}
