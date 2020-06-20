<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Comment;
use App\Like;

class PostController extends Controller
{
    public function __construct() {
       $this->middleware('auth');
    }
    
    public function upload(Request $request){
        
        $post = new Post();
        
        $validate = $this->validate($request, [
           'content'    => 'required|string',
           'image_path' => 'image'
        ]);
        
        $image_path = $request->file('image_path');
        if($image_path){
            $name = time().$image_path->getClientOriginalName();
            Storage::disk('posts')->put($name, \File::get($image_path));
            $post->image_path = $name;
        } else {
            $post->image_path = null;
        }
        
        $userId = \Auth::user()->id;
        $content = $request->input('content');

        
        $post->user_id = $userId;
        $post->content = $content;
        
        $saved = $post->save();
        
        if($saved){
            $message = true;
        } else {
            $message = false;
        }
        
        return redirect()->route('home')
                ->with(['message' => $message]);
    }
    
    public function getImage($fileName){
        $image = Storage::disk('posts')->get($fileName);
        return new Response($image, 200);
    }
    
    public function details($id){
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)
                            ->orderBy('id', 'desc')
                            ->get();
        
        return view('post.details', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
    
    public function uploadPost(){
        
        return view('post.upload-post');
    }
    
    public function favorites(){
        $likes = Like::where('user_id', \Auth::user()->id)->paginate(10);
        return view('post.favorites', [
            'likes' => $likes
        ]);
    }
    
    public function editPost($id){
        $post = Post::find($id);
        $user = \Auth::user();
        
        if($post && $post->user->id == $user->id){
            return view('post.edit-post', [
                'post' => $post
            ]);
        } else {
            return redirect('/');
        }   
    }
    
    public function update(Request $request){
        // ENCONTAR OBJETO DEL USUARIO
        $user = \Auth::user();
        
        // VALIDAR LOS DATOS OBTENIDOS
        $validate = $this->validate($request, [
           'post_id' => 'required|integer',
           'content' => 'required|string',
           'image'   => 'image'
        ]);
        
        // ENCONTRAR EL OBJETO QUE VAMOS ACTUALIZAR
        $post_id = $request->input('post_id');
        $post = Post::find($post_id);
        
        // ASIGNAR VALORES 
        $content = $request->input('content');
        $image = $request->file('image_path');
        
        if($image){
            $img_name = time().$image->getClientOriginalName();
            Storage::disk('posts')->put($img_name, \File::get($image));
            $post->image_path = $img_name;
        } 
        
         $post->content = $content;
      
        
        // ACTUALIZAR
         $update = $post->update();
         
         $message = 'Updated failed';
         if($update){
             $message = 'Updated completed !';
         }
        
        // RETORNAR
         return redirect()->route('post.edit', [
             'id' => $post->id
         ])->with(['message' => $message]);
    }
}
