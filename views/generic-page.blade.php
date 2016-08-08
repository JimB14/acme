@extends('base')

@section('browsertitle')
  {{ $browser_title }}
@stop


@section('content')
    @if((Acme\auth\LoggedIn::user()) && (Acme\auth\LoggedIn::user()->access_level == 2))
      <form method="post" action="/admin/page/edit" id="editpage" name="editpage">
          <article id="editablecontent" class="editablecontent" itemprop="description" style="width:100%; line-height:2em;margin-bottom: 15px;">
              {!! $page_content !!}
          </article>

          <article class="admin-hidden">
              <a class="btn btn-primary" href="#" onclick="saveEditedPage()">Save</a>
              <a class="btn btn-info" href="#!" onclick="turnOffEditing()">Cancel</a>
              &nbsp;&nbsp;&nbsp;
              <!-- pages.page_id will only be zero if it's a new page  -->
              @if($page_id == 0)
                <br><br>
                <input class="browser-title" type="text" name="browser_title" placeholder="Enter browser title (slug)"  width="150">
              @endif
          </article>

          <input type="hidden" name="thedata" id="thedata">
          <input type="hidden" name="old" id="old">
          <input type="hidden" name="page_id" id="page_id" value="{!! $page_id !!}">
      </form>
    @else
      {!! $page_content !!}
    @endif

@stop
