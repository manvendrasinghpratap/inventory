@extends('admin.layouts.login')
@section('content')
   <div class="page-form width460">
      <div class="header-content">
         <h1> Administrator Panel</h1>
      </div>
      <div class="body-content">
         <p style="display:none;">Log in with a social scan:</p>
         <div class="row mbm text-center" style="display:none;">
            <div class="col-md-4"><a href="#" class="btn btn-sm btn-twitter btn-block"><i class="fa fa-twitter fa-fw"></i>Twitter</a></div>
            <div class="col-md-4"><a href="#" class="btn btn-sm btn-facebook btn-block"><i class="fa fa-facebook fa-fw"></i>Facebook</a></div>
            <div class="col-md-4"><a href="#" class="btn btn-sm btn-google-plus btn-block"><i class="fa fa-google-plus fa-fw"></i>Google +</a></div>
         </div>
         {{ Form::open(array('url' => 'login','class'=>'form')) }}
         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             <label>Enter Email:</label>
            <div class="input-icon right"><i class="fa fa-user"></i>
               <input id="email" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
               @if ($errors->has('email'))
                  <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                </span>
               @endif
            </div>
         </div>
         <div id = 'password_div' class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
             <label>Enter Password:</label>
            <div class="input-icon right"><i class="fa fa-key"></i>
               <input type="password" placeholder="Password" name="password" class="form-control">
               @if ($errors->has('password'))
                  <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                  </span>
               @endif
            </div>
         </div>
         <div class="form-group pull-right">
            <button id = 'loginbutton' type="submit" class="btn btn-success">Log In &nbsp; <i class="fa fa-chevron-circle-right"></i></button>

         </div>
         {{ Form::close() }}
         <div class="clearfix"></div>
      </div>
   </div>
@endsection
@push('scripts')
@endpush
