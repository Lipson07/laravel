<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;
class PostController extends Controller
{
      public function index(){
        $posts=Post::all();
      
        return view('post.index',compact('posts'));
      }
      public function create(){ 
        $categories=Category::all();
        $tags=Tag::all();
        return view('post.create',compact('categories','tags'));
      }
      public function show(Post $post){
       return view('post.show',compact('post'));
      }
      public function edit(Post $post){
        $categories=Category::all();
        $tags=Tag::all();
            return view('post.edit',compact('post','categories','tags'));
      }
      
      public function store(){
        $data=request()->validate([
          'tittle'=>'required|string',
          "content"=>'string',
          "image"=>'string',
          "category_id"=>'',
          "tags"=>'',
        ]);
        $tags=$data['tags'];
        unset($data['tags']);
       $post= Post::create($data);
     
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
      }
      public function update(Post $post){
        $data=request()->validate([
          'tittle'=>'string',
          "content"=>'string',
          "image"=>'string',
          "category_id"=>'',
          "tags"=>'',
        ]);
        $tags=$data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show',$post->id);
      }
      public function destroy(Post $post){
       $post->delete();
       return redirect()->route('post.index');
      }
      public function firstOrCreate(){

        $anotherPost=[
           'tittle'=>'zw svo',
            'content'=>'wwar',
            'image'=>'imagesvo.jpg',
            'likes'=>50,
            'is_published'=>1,

        ];
      $post=Post::firstOrCreate(['tittle'=>'zwo svo'],['tittle'=>'zwo svo',
            'content'=>'owwar',
            'image'=>'imagesvo.jpg',
            'likes'=>50,
            'is_published'=>1,
      ]);
          dump($post->content);
          dd('finished');

      }
      public function updateOrCreate(){
         
        $anotherPost=[
           'tittle'=>'update',
            'content'=>'update',
            'image'=>'imagesvo.jpg',
            'likes'=>50,
            'is_published'=>1,

        ];
        $post=Post::updateOrCreate([
          'tittle'=>'zw svo'
        ],$anotherPost);
        dump($post->content);
        dd("end");
      }
      
}
