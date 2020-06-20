<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Post;
use App\Like;
use App\Comment;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    

    public function index($search = null) {
        if (!empty($search)) {
            $posts = Post::where('content', 'LIKE', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }

        return view('user.index', [
            'posts' => $posts
        ]);
    }

    public function config() {
        $title = 'Edit my data';
        return view('user.config', [
            'title' => $title
        ]);
    }

    public function update(Request $request) {
        // EL OBEJTO COMPLETO DEL USUARIO IDENTIFICADO
        $user = \Auth::user();
       
        // ENCONTRAR EL ID DEL USUARIO A ACTUALIZAR
        $userId = $user->id;
        
        
        // VALIDAR LOS DATOS INSERTADOS EN EL FORMULARIO
        $valiate = $this->validate($request, [
            'name'      => 'required|string|max:200',
            'surname'   => 'required|string|max:200',
            'nick'      => 'required|string|max:200|unique:users,nick,'.$userId,
            'email'     => 'required|string|email|unique:users,email,'.$userId,
            'image'     => 'image'
        ]);
        
        // EN CASO DE QUE LLEGUE UNA IMAGEN
        $image_path = $request->file('image');
        if($image_path){
            $name = time().$image_path->getClientOriginalName();
            Storage::disk('users')->put($name, \File::get($image_path));
            $user->image = $name;
        } else {
            $user->image = null;
        }
        
        // DAR VALORES A LAS VARIABLES
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $nick = $request->input('nick');
        
        // ASIGNAR VALORES AL OBJETO
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->nick = $nick;
        
        // ACTUALIZAR EL USUARIO COMPLETO
        $update = $user->update();

        if ($update) {
            $message = '¡ Usuario actualizado !';
        } else {
            $message = 'Error: Updated data fails';
        }
       
        return redirect()->route('user.config')
                        ->with(['message' => $message]);
    }
    
    public function getImage($imageName){
        $file = Storage::disk('users')->get($imageName);
        return new Response($file, 200);
    }
    
    public function profile($id){
        $user = User::where('id', $id)->first();
        $posts = Post::where('user_id', $user->id)->paginate(10);
        $likes = Like::where('user_id', $user->id)->get();
        $comments = Comment::where('user_id', $user->id)->get();
        
        return view('user.profile', [
           'user'   => $user,
           'posts'  => $posts,
           'likes'  => $likes,
           'comments' => $comments
        ]);
    }

}
