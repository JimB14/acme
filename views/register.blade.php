@extends('base')

  @section('browsertitle')
    Acme: Register
  @stop

  @section('content')
  <div class="row">

      <div class="col-md-2">

      </div>

      <div class="col-md-8">
          <h1>Register</h1>

          <hr>

          <form name="registerform" id="registerform" class="form-horizontal" action="register" method="post" novalidate>

            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">First name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control required" name="first_name" id="first_name" placeholder="First name" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label">Last name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control required" name="last_name" id="last_name" placeholder="Last name">
                </div>
            </div>

              <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control required email" name="email" id="email" placeholder="user@example.com">
                  </div>
              </div>

              <div class="form-group">
                  <label for="verify_email" class="col-sm-2 control-label">Verify email</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control" name="verify_email" id="verify_email" placeholder="user@example.com">
                  </div>
              </div>

              <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control required" name="password" id="password" placeholder="Password">
                  </div>
              </div>

              <div class="form-group">
                  <label for="verify_password" class="col-sm-2 control-label">Verify password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" name="verify_password" id="verify_password" placeholder="Verify password">
                  </div>
              </div>

              <hr>

              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Register</button>
                  </div>
              </div>

          </form>
      </div>

      <div class="col-md-2">

      </div>

    </div><!-- // .row  -->
</div><!-- // .container -->
@stop

@section('bottomjs')
<script>
$(document).ready(function(){

  $("#registerform").validate({
      rules: {
          verify_email: {
            required: true,
            email: true,
            equalTo: "#email"
          },
          verify_password:  {
            required: true,
            equalTo: "#password"
          }
      }
  });

});
</script>
@stop
