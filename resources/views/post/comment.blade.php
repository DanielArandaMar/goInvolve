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
                            
                            <div class="user-name"> {{ $post->user->name }} {{ $post->user->surname }}</div>    
                        </div>
                        <div class="date text-muted">{{ \FormatTime::LongTimeFilter($post->created_at) }}</div>
                    </div>
                    <!-- HEAD DEL POST  -->
                    
                    
                    <!-- BODY DEL POST  -->
                    <div class="content">
                        <p>
                            {{ $post->content }}
                        </p>
                        @if($post->user->id == Auth::user()->id)
                            <a href="{{ route('comment.remove', $post->id) }}" title="Eliminar mi respuesta"> <i class="fas fa-trash"></i></a>
                        @endif
                    </div>
                    <!-- BODY DEL POST  -->    
                    
                    
                </div>
            </div>

