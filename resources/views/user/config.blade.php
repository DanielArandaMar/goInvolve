@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-c">
                <div class="card-header-c d-flex justify-content-center">
                    <span class="text-center">{{ $title }}</span>
                </div>

                <div class="card-body-c">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="group d-flex direction-row">
                          
                            <div class="input-c w-50 mx-2">
                                <input id="name" placeholder="Insert your name please" type="text" class="@error('name') is-invalid @enderror" name="name" 
                                       value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                     
                            <div class="input-c w-50 mx-2">
                                <input id="surname" placeholder="Insert your complete surname" type="text" class="@error('surname') is-invalid @enderror" name="surname" 
                                       value="{{ Auth::user()->surname }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                        </div>
                        
                        <div class="group row">

                                <div class="input-c">
                                    
                                    <input type="file" name="image">
                                    
                                </div>
                            </div>
                        
                        @if(Auth::user()->image)
                        <div class="image">
                            <img src="{{ route('user.get-image', Auth::user()->image) }}" alt="">
                        </div>
                        @endif
                        
                        @if(!Auth::user()->image)
                        <div class="not-image">
                            Your photo
                        </div>
                         @endif
                    
                        <div class="group row">

                                <div class="input-c">
                                    <input id="nick"  placeholder="Insert your nickname" type="text" class="@error('nick') is-invalid @enderror" name="nick" 
                                           value="{{ Auth::user()->nick }}" required autocomplete="nick" autofocus>

                                    @error('nick')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        
                        <div class="group row">                      
                            <div class="input-c">
                                <input id="email"  placeholder="Insert a valid email" type="email" class=" @error('email') is-invalid @enderror" name="email" 
                                       value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                            
                        
                        

                        <div class="form-group row mb-0 d-flex justify-content-center">
                         
                                <button type="submit" class="btn-c-1 mt-4">
                                    {{ __('Save changes') }}
                                </button>

                              
                         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('message'))
    <div class="alert-c color-success">
        <span>{{ session('message') }}</span>
    </div>
@endif

@endsection


