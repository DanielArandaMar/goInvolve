@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        
        <!--  PRIMERA COLUMNA  -->
        <div class="col-md-8">
            <div class="card-c head-profile mb-2">
                <div class="head">
                    @if($user->image)
                    <div class="image">
                        <img src="{{ route('user.get-image', $user->image) }}" alt="">
                    </div>
                    @else 
                     <div class="image">
                        <img src="{{ asset('img/default2.png') }}" alt="Imagen por defecto">
                    </div>
                    @endif
                    <div class="text-info">
                        <h3>{{ $user->name.' '.$user->surname }}</h3>
                        <h5 class="text-muted">{{ '@'.$user->nick }}</h5>
                    </div>
                </div>
            </div> 
            
           
          @if(count($posts) != 0)
            @foreach($posts as $post)
                 @include('post.post', $post)
             @endforeach
          @else
          <div class="d-flex justify-content-center mt-5">
            <span class="text-muted text-center">Aún no hay preguntas publicadas</span>    
          </div>
          
          @endif
           
            
            <div class="pagination d-flex justify-content-center w-100">
                {{ $posts->links() }}    
            </div>
            
            
        </div>
        <!--  PRIMERA COLUMNA  -->
        
        
        <!--  SEGUNDA COLUMNA  -->
        <div class="col-md-4 aside">
            <div class="card">
                <div class="card-body">
                    <h4>Estadísticas de {{ $user->name }}</h4>
                   
                    <div class="items">
                        <div class="item">
                            <span class="total">{{ count($likes) }}</span>
                            <span class="label">Dudas</span>
                        </div>
                         <div class="item">
                            <span class="total">{{ count($posts) }}</span>
                            <span class="label">Preguntas</span>
                        </div>
                        <div class="item">
                            <span class="total">{{ count($comments) }}</span>
                            <span class="label">Respuestas</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--  SEGUNDA COLUMNA  -->
        
        
    </div>
</div>




@endsection
