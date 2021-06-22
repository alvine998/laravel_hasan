
@extends('layout.log')
@section('content')
  			<div class="login-content">
			<form action="{{ route('login') }}" method="post">
				@csrf
				<div class="card-body">
				{{-- Error Alert --}}
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
				<img src="{{ url('forntend/images/login/user.png')}}">
				<h2 class="title">Selamat Datang</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
				 @error('login_gagal')
                                                    {{-- <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> --}}
                                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                        <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @enderror
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input">
				   @if($errors->has('username'))
                    <span class="error">{{ $errors->first('username') }}</span>
                 @endif
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input">
				 @if($errors->has('password'))
                 <span class="error">{{ $errors->first('password') }}</span>
                @endif
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
				
            </form>
        </div>
@stop
