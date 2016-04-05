@extends('layout.master')

@section('title')
  SignUp
@stop

@section('container')
<section>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  col-md-offset-3 col-lg-offset-3">
      <form action="{{ route('signUp') }}" method="POST" role="form">
        <legend>SingUp</legend>

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
          <input type="text" class="form-control" id="signUpName" value="{{ $page }}" name="name">
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          <input type="text" class="form-control" id="signUpEmail" placeholder="page@example.net" name="email">
        </div>
        <div class="form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
          <input type="password" class="form-control" id="signUpPass" placeholder="********" name="pass" autofocus>
        </div>

        <input type="hidden" name="_token" id="input_token" class="form-control" value="{{ Session::token() }}">

        <button type="submit" class="btn btn-primary form-control">Ok</button>
      </form>
    </div>
  </div>
</section>
@stop