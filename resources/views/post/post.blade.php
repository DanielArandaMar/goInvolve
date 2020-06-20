<div class="card post">
                <div class="card-body">
                    <!-- HEAD DEL POST  -->
                    <div class="head">
                        <div class="data">
                            
                            @if($post->user->image)
                            <div class="image-user">                   
                                <img src="{{ route('user.get-image', $post->user->image) }}" alt="">
                            </div>
                            @else
                            <div class="image-user">                   
                                <img src="{{ asset('img/default2.png') }}" alt="Imagen por defecto">
                            </div>
                            @endif
                            
                            <a  href="{{ route('user.profile', $post->user->id) }}" class="user-name"> {{ $post->user->name }} {{ $post->user->surname }}</a>    
                        </div>
                        <div class="date text-muted">{{ \FormatTime::LongTimeFilter($post->created_at) }}</div>
                    </div>
                    <!-- HEAD DEL POST  -->
                    
                    <!-- BODY DEL POST  -->
                    <div class="content">
                        <p>
                            {{ $post->content }}
                        </p>
                    </div>
                    <!-- BODY DEL POST  --> 
                    
                    <!-- PIE DEL POST -->
                    <div class="foot">
                        
                        <!-- ENCASO DE QUE HAYA UNA IMAGEN -->
                        @if($post->image_path)
                        <button class="btn-c-1" title="Image post" id="btnImage"> <i class="fas fa-image"></i></button>
                        
                        <div class="image-post" id="imagePost">
                            <img src="{{ route('post.get-image', $post->image_path) }}" alt="{{ 'Imagen de la publicación' }}">
                        </div>
                        @endif
                        
                        
                        
                        <!-- ENCASO DE QUE HAYA UNA IMAGEN -->
                        
                        
                    </div>
                    <!-- PIE DEL POST -->
                    
                    <div class="stats">
                        <div class="group d-flex justify-space-around align-items-center flex-row">
                            <i class="fas fa-question mr-1"></i><span class="total-likes-{{ $post->id }}" id="totalLikes-{{ $post->id }}"> {{ count($post->likes) }}</span>
                        </div>
                        <div class="group">
                            <a href="{{ route('post.detail', $post->id) }}">{{ count($post->comments) }} Anwers</a> 
                            @if(Auth::user()->id == $post->user->id)
                            <a href="{{ route('post.edit', $post->id) }}" title="Editar post" class="mx-2"> <i class="fas fa-edit text-muted"></i></a>
                            @endif
                        </div>

                        
                    </div>
                     
                    
                      <div class="stats deeper">
                            <?php $likeV = false; ?>
                            @foreach($post->likes as $like)
                              @if(Auth::user()->id == $like->user->id)
                                   <?php $likeV = true; ?>
                              @endif
                            @endforeach
                           
                         @if($likeV)
                            <a class="btn btn-primary dislikeBtn btn-sm text-white" data-id="{{ $post->id }}"><i class="fas fa-question"></i></a>
                         @elseif(!$likeV)
                             <a  data-id="{{ $post->id }}"  class="btn btn-light likeBtn btn-sm"><i class="fas fa-question mr-1"></i></a>
                         @endif
                        
                        
                       
                       
                    </div>
                    
                     
                    
                </div>
            </div>

