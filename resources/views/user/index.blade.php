@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        
        <!--  PRIMERA COLUMNA  -->
        <div class="col-md-8">
            @if(session('message'))
            <div class="alert-c color-success">
                <span>Question uploaded !</span>
            </div>
            @endif
          @if(count($posts) != 0)
            @foreach($posts as $post)
                 @include('post.post', $post)
             @endforeach
          @else
          <div class="d-flex justify-content-center mt-5">
            <span class="text-muted text-center">No hay publiaciones</span>    
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
                    <h4>Make a question <i class="fas fa-question"></i></h4>
                   
                    <form method="POST" action="{{ route('post.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="group">
                             @if($errors->has('content'))
                            <span class="text-danger">*Empty field</span>
                            @endif
                            <textarea name="content" placeholder="Write question"></textarea>
                           
                        </div>
                        <div class="group mb-4">
                            <span>*Select an image of the problem</span>
                            <input type="file" name="image_path">
                        </div>
                        <input type="submit" class="btn-c-1" value="Upload">
                    </form>
                </div>
            </div>
        </div>
        <!--  SEGUNDA COLUMNA  -->
        
        
    </div>
</div>




@endsection
