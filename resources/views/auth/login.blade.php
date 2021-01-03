@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-form text-center">
        <form action="{{ route('login') }}" method="post">
            @csrf
			<img src="/img/pucclogo.png" class="img-fluid mx-auto d-block" width="55%">
			<h3 class="text-center mb-4">PUCC Vote | Login</h3>
			<div class="form-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
				<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>
			<div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Login') }}
                </button>
			</div>
		</form>
    </div>
</div>
@endsection
