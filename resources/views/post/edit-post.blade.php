@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        
        <!--  SEGUNDA COLUMNA  -->
        <div class="col-md-12 aside upload">
            <div class="card">
                <div class="card-body">
                    @if(session('message'))
                    <div class="alert-c color-success">
                        <span>{{ session('message') }}</span>
                    </div>
                    @endif
                    <h4>Update post <i class="fas fa-question"></i></h4>
                    <form method="POST" action="{{ route('post.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="group">
                             @if($errors->has('content'))
                            <span class="text-danger">*Empty field</span>
                            @endif
                            <textarea name="content" placeholder="Write question">{{ $post->content }}</textarea>
                           
                        </div>
                        <div class="group mb-4">
                            <span>*Select an image of the problem</span>
                            <input type="file" name="image_path">
                            
                            @if($post->image_path)
                            <div class="image-post w-25">
                                <img src="{{ route('post.get-image', $post->image_path) }}" alt="{{ $post->image_path }}">
                            </div>
                            @endif
                        </div>
                        <input type="submit" class="btn-c-1" value="Save and upload">
                    </form>
                </div>
            </div>
        </div>
        <!--  SEGUNDA COLUMNA  -->
        
        
    </div>
</div>




@endsection


