@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        
        <!--  SEGUNDA COLUMNA  -->
        <div class="col-md-12 aside upload">
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
