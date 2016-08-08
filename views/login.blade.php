@extends('base')

@section('browsertitle')
  Acme: Login
@stop

@section('content')
<div class="row">

      <div class="col-md-7 col-center-block">
          <div class="box-with-border">
              <h1>Log In</h1>
              <hr>
              <form name="loginform" id="loginform" action="/login" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{!! htmlspecialchars($signer->getSignature()) !!}">
                  <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          <input type="email" class="form-control email required" name="email" id="email" placeholder="user@example.com" autofocus>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control required" name="password" id="password" placeholder="Password">
                      </div>
                  </div>

                  <hr>

                  <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Sign in</button>
                      </div>
                  </div>

              </form>
        </div>
    </div>
</div><!-- // .row -->
@stop

@section('bottomjs')
<script>
$(document).ready(function(){

  $("#loginform").validate();

});
</script>
@stop
