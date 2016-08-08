<!DOCTYPE html><!-- Template header and footer @base.html -->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
      @yield('browsertitle')
    </title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">

    @yield('css')

</head>

<body>

  @include('topnav')
  @yield('outsidecontainer')

    <div class="container">

      <div class="row">
          <br><br>
          <div class="col-md-offset-2 col-md-8">
            @include('errormessage')
          </div>

          <div class="col-md-2">
          </div>
      </div>

      <div class="row">
        <div class="col-md-12" style="margin-top:20px;">
            @yield('content')
        </div>
      </div>

    </div><!-- // .container -->


    <footer class="footer">
        <div class="row">
            <div class="col-md-3">
                <div style="padding-left:8px;">
                    <h4>Contact Us</h4>
                    123 Main St<br>
                    Akron, OH <br>
                    44302<br>
                    1+ 330-555-1212
                </div>
            </div>

            <div class="col-md-6">
            </div>

            <div class="col-md-3">
              <img src="/assets/map-small.png" class="pull-right">
            </div>
        </div>
    </footer>


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
  @if((Acme\auth\LoggedIn::user()) && (Acme\auth\LoggedIn::user()->access_level == 2))
      <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.10/ckeditor.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
  @endif

  @yield('bottomjs')
  @include('admin.admin-js')


</body>

</html>
