<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Like;
USE aPP\User;

class LikeController extends Controller
{
    
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    
    
    public function like($postId){
        // OBTENER AL USUARIO COMPLETO
        $user = \Auth::user();
        
        // ENCONTRAR TODOS LOS LIKES DEL POST
        $likes = Like::where('post_id', $postId)->get();
        $total = count($likes);
        
        // COMPROBAR QUE NO HAYA DADO LIKE
        $like_validate = Like::where('post_id', $postId)
                                ->where('user_id', $user->id)
                                ->get();
        if(count($like_validate) == 0){
             // INSTANCEAR OBJETO DE LIKE
            $like = new Like();

            // ASIGNAR VALORES AL OBJETO
            $like->user_id = $user->id;
            $like->post_id = $postId;

            // GURDAR EN LA BASE DE DATOS
            $saved = $like->save();
            if($saved){
                $json = [
                    'message' => 'Haz dado me en duda',
                    'total'  => $total + 1,
                    'code' => 200
                ];
                
            } else {
                $json = [
                    'message' => 'Error al dar me en duda',
                    'code' => 500
                ];
            }
        } else {
            $json = [
              'message' => 'Ya haz dado me en duda a esta publicación',
              'code' => 400
            ];
        }
        
        return response()->json($json, $json['code']);
    }
    
    
    
    public function dislike($postId){
        // OBTENER EL OBJETO DEL USUARIO
        $user = \Auth::user();
        
        // ENCONTRAR TODOS LOS LIKES DEL POST
        $likes = Like::where('post_id', $postId)->get();
        $total = count($likes);
        
       // ENCONTRAR EL LIKE PARA REMOVER
       $like = Like::where('user_id', $user->id)
                    ->where('post_id', $postId)
                    ->first();
       
        // COMPROBAR QUE EXISTE UN LIKE DE ESE USUARIO EN LA PUBLICACIÓN
        if($like){
           // ELIMINAR EL LIKE
            $removed = $like->delete();
            if($removed){
                $data = [
                    'message' => 'Haz quitado tu me en duda',
                    'total'   => $total - 1,
                    'code' => 200
                ];
            } else {
                $data = [
                   'message' => 'Error al quitar me en duda',
                    'code' => 500
                ];
            }
           
        } else {
            $data = [
                'message' => 'Algo salió mal',
                'code'   => 400
            ];
        }
       
        return response()->json($data, $data['code']);
    }
}
