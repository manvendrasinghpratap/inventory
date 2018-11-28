@extends('user.layouts.login')
@section('content')
   <div class="page-form">
      <div class="header-content">
          <h1>Reset Password</h1>
      </div>
      <div class="body-content">
         {{ Form::open(array('url' => 'password/email','class'=>'form','method'=>'post')) }}
		 
		 
         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-icon right"><i class="fa fa-user"></i>
               <input id="email" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
               @if ($errors->has('email'))
                  <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                </span>
               @endif
            </div>
         </div>
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Send Password Reset Link
				</button>
			</div>
		</div>
         {{ Form::close() }}
         <div class="clearfix"></div>
      </div>
   </div>
@endsection