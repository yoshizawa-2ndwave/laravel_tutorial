<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\validationPost;
use Debugbar;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->get('keywords');
        $fromDate = $request->get('fromDate');
        $toDate = $request->get('toDate');
        $dateCheck = $request->get('dateCheck');
        //全角スペースを半角スペースに置換、半角スペースごと配列へ分割
        $keywords = preg_split("/[\s+]/", str_replace('　', ' ', $keywords));
        $posts = Post::where(function ($query) use($keywords, $fromDate, $toDate, $dateCheck) {
            foreach($keywords as $word){
                if($word){
                    $query->where('content', 'like', "%{$word}%");
                }
            }
            if($dateCheck){
                //日付があればfrom toそれぞれ絞り込み
                if($fromDate){
                    $query->whereDate('created_at','>=' ,$fromDate);
                }
                if($toDate){
                    $query->whereDate('created_at', '<=', $toDate);
                }
            }
        })->latest('created_at')->paginate(20);
        return view('posts.index', compact('posts','fromDate', 'toDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  validationPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validationPost $request)
    {
        $post = Post::create($request->all());
        $request->session()->flash('message', '登録しました。');
        return redirect()->route('posts.show', [$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  validationPost  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(validationPost $request, Post $post)
    {
        $post->update($request->all());
        $request->session()->flash('message', '更新しました。');
        return redirect()->route('posts.show', [$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('message','削除しました。');
    }
}
