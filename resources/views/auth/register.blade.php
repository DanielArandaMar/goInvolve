@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-c">
                <div class="card-header-c d-flex justify-content-center">
                    <span class="text-center">FREE REGISTER</span>
                </div>

                <div class="card-body-c">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        
                        
                        <div class="group row">
                            <div class="input-c">
                                <input id="name" placeholder="Insert your name please" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                        <div class="group row">
                            <div class="input-c">
                                <input id="surname" placeholder="Insert your complete surname" type="text" class="@error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="group row">
                      
                            <div class="input-c">
                                <input id="nick"  placeholder="Insert your nickname" type="text" class="@error('nick') is-invalid @enderror" name="nick" value="{{ old('nick') }}" required autocomplete="nick" autofocus>

                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="group row">
                            

                            <div class="input-c">
                                <input id="email"  placeholder="Insert a valid email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="group row">
                            

                            <div class="input-c">
                                <input id="password"  placeholder="Insert a password (minimum 8 characters)" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="group row">
                           

                            <div class="input-c">
                                <input id="password-confirm" placeholder="Please repit your password"  type="password"  name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="group row mb-0 d-flex justify-content-center">
                           
                                <button type="submit" class="btn-c-1">
                                    {{ __('Register') }}
                                </button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
