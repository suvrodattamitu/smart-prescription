<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | SmartPrescription</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
   
    <link rel="stylesheet" href="{{ asset('assets/css') }}/bootstrap.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets/css') }}/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
</head>

<body>
    
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN TO CONTINUE...</h3>
				<!-- <p>This is the best app ever!</p> -->
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                           
                            @csrf

                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input id="email" type="email" value="admin@admin.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input id="password" type="password" value="12345678" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="checkbox login-checkbox">
                                <label style="margin-left:20px;">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me </label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <!-- <a class="btn btn-default btn-block" href="#">Register</a> -->
                        </form>
                    </div>
                </div>
			</div>
			<!-- <div class="text-center login-footer">
				<p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
			</div> -->
		</div>   
    </div>
   
</body>

</html>