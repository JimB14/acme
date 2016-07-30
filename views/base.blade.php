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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

    @yield('content')

    <div class="row footer-background" style=" margin-top:50px;">
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

  </div><!-- // .container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>

  @yield('bottomjs')


</body>

</html>
