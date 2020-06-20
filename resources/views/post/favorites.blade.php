@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        
        <!--  PRIMERA COLUMNA  -->
      
        <div class="col-md-12">
             <h3 class="text-muted my-4">Mis favoritos</h3>
            @if(session('message'))
            <div class="alert-c color-success">
                <span>Question uploaded !</span>
            </div>
            @endif
          @if(count($likes) != 0)
            @foreach($likes as $like)
                 <div class="card post">
                <div class="card-body">
                    <!-- HEAD DEL POST  -->
                    <div class="head">
                        <div class="data">
                            
                            @if($like->post->user->image)
                            <div class="image-user">                   
                                <img src="{{ route('user.get-image', $like->post->user->image) }}" alt="">
                            </div>
                            @else
                            <div class="image-user">                   
                                <img src="{{ asset('img/default2.png') }}" alt="Imagen por defecto">
                            </div>
                            @endif
                            
                            <a  href="{{ route('user.profile', $like->post->user->id) }}" class="user-name"> {{ $like->post->user->name }} {{ $like->post->user->surname }}</a>    
                        </div>
                        <div class="date text-muted">{{ \FormatTime::LongTimeFilter($like->post->created_at) }}</div>
                    </div>
                    <!-- HEAD DEL POST  -->
                    
                    <!-- BODY DEL POST  -->
                    <div class="content">
                        <p>
                            {{ $like->post->content }}
                        </p>
                    </div>
                    <!-- BODY DEL POST  --> 
                    
                    <!-- PIE DEL POST -->
                    <div class="foot">
                        
                        <!-- ENCASO DE QUE HAYA UNA IMAGEN -->
                        @if($like->post->image_path)
                        <button class="btn-c-1" title="Image post"> <i class="fas fa-image"></i></button>
                        @endif
                        <!-- ENCASO DE QUE HAYA UNA IMAGEN -->
                        
                        
                    </div>
                    <!-- PIE DEL POST -->
                    
                    <div class="stats">
                        <div class="group d-flex justify-space-around align-items-center flex-row">
                            <i class="fas fa-question mr-1"></i><span class="total-likes-{{ $like->post->id }}" id="totalLikes-{{ $like->post->id }}"> {{ count($like->post->likes) }}</span>
                        </div>
                        <a href="{{ route('post.detail', $like->post->id) }}">{{ count($like->post->comments) }} Anwers</a>
                    </div>
                    
                      <div class="stats deeper">
                            <?php $likeV = false; ?>
                            @foreach($like->post->likes as $like)
                              @if(Auth::user()->id == $like->user->id)
                                   <?php $likeV = true; ?>
                              @endif
                            @endforeach
                           
                         @if($likeV)
                            <a class="btn btn-primary dislikeBtn btn-sm text-white" data-id="{{ $like->post->id }}"><i class="fas fa-question"></i></a>
                         @elseif(!$likeV)
                             <a  data-id="{{ $like->post->id }}"  class="btn btn-light likeBtn btn-sm"><i class="fas fa-question mr-1"></i></a>
                         @endif
                        
                        
                       
                       
                    </div>
                    
                     
                    
                </div>
            </div>


             @endforeach
          @else
          <div class="d-flex justify-content-center mt-5">
            <span class="text-muted text-center">Aún no hay preguntas publicadas</span>    
          </div>
          
          @endif
          
           <div class="pagination d-flex justify-content-center w-100">
                {{ $likes->links() }}    
            </div>
           
        </div>
        <!--  PRIMERA COLUMNA  -->
        
        
       
        
        
    </div>
</div>




@endsection
