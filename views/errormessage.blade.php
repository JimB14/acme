@if(isset($_SESSION['msg']))
<div class="alert alert-danger" role="alert" style="margin-top:30px;margin-bottom:-15px;">
  <ul>
    @foreach($_SESSION['msg'] as $error)
      <li>{!! $error !!}</li>
    @endforeach
  <ul>
</div>
@endif
