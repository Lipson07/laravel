<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
      public function index(){
        $posts=Post::all();
       
        return view('post',compact('posts'));
      }
      public function create(){
        $postsArr=[
          [
            'tittle'=>'z svo',
            'content'=>'war',
            'image'=>'imagesvo.jpg',
            'likes'=>20,
            'is_published'=>1,

          ],
                 [
            'tittle'=>'zw svo',
            'content'=>'wwar',
            'image'=>'imagesvo.jpg',
            'likes'=>50,
            'is_published'=>1,

          ],

        ];
          foreach($postsArr as $item){
            
            Post::create($item);
          }
          dd('create');
      }
      public function update(){
        $post=Post::find(6);
        $post->update([
          'tittle'=>'update',
            'content'=>'update',
            'image'=>'update',
            'likes'=>2,
            'is_published'=>0
        ]);
        dd('update');
      }
      public function delete(){
          $post=Post::find(3);
          $post->delete();
          dd('deleted');
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
