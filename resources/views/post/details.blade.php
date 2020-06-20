@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            @include('post.post', $post)
        </div>
        
        <div class="col-lg-12">
            <div class="comments">
                <div class="comment-form">
                    @if(session('message'))
                    <div class="alert-c color-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form  action="{{ route('comment.save') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                        
                        <div class="group">
                            @if($errors->has('content'))
                                <span class="text-danger">**** {{ $errors->first('content') }}</span>
                            @endif
                            <textarea spellcheck="false" name="content" placeholder="Write the solution here :)"></textarea>
                        </div>
                       
                        <div class="group">
                            <button type="submit" class="btn-c-1">Share</button>
                        </div>
                    </form>
                </div>
                
                @if(count($comments) != 0)
                <div class="answers my-5">
                      <h3>Answers ({{ count($post->comments) }})</h3>
                      
                      @foreach($comments as $post)
                        @include('post.comment', $post)
                      @endforeach
                </div>
                @else
                    <div class="answers my-5">
                        <span class="text-center w-100 my-3 text-muted">Aún no hay soluciones publicadas</span>
                    </div>
                @endif
            </div>
            
           
            
        </div>
    </div>
</div>
                                 
                                 


@endsection