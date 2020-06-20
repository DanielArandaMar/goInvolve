<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function save(Request $request){
        $user = \Auth::user();
        
        $validate = $this->validate($request, [
            'content'  =>  'required|string',
            'post_id'  =>  'required|integer'
        ]);
        
        $content = $request->input('content');
        $post_id = $request->input('post_id');
        
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->post_id = $post_id;
        $comment->content = $content;
        
        $save = $comment->save();
        $message = 'Error al publicar tu respuesta';
        if($save){
            $message = 'Respuesta publicada con éxito';
        } 
       
        return redirect()->route('post.detail', $post_id)
                         ->with(['message' => $message]);
    }
    
    public function remove($id){
        $user = \Auth::user();
        
        $comment = Comment::find($id);
        $message = 'Error al borrar tu respuesta';
        if($user && $user->id == $comment->user->id){
             $deleted = $comment->delete();
               
             if($deleted) {
                $message = 'Se ha borrado tu respuesta';
            }
        } else {
            $message = 'Permiso denegado';
        }
           
        return redirect()->route('post.detail', ['id' => $comment->post->id])
                         ->with(['message' => $message]);
    }
}
