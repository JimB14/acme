<?php
namespace Acme\controllers;

use duncan3dc\Laravel\BladeInstance;
use Acme\models\Page;

class PageController extends BaseController
{

  public function getShowHomePage()
  {
      echo $this->blade->render("home");
  }

  public function getShowPage()
  {
      $browser_title = '';
      $page_content = '';
      $page_id = 0;

      // extract page name from url
      $uri = explode("/", $_SERVER['REQUEST_URI']);
      $target = $uri[1];

      // find matching page in Database
      $page =  Page::where('slug', '=', $target)->get();

      // look up page contents
      foreach($page as $item)
      {
          $browser_title  = $item->browser_title;
          $page_content = $item->page_content;
          $page_id = $item->id;
      }

      if(strlen($browser_title) == 0)
      {
        header("Location: /page-not-found");
        exit();
      }

      // pass content to blade template
      echo $this->blade->render('generic-page', [
          'browser_title' => $browser_title,
          'page_content'  => $page_content,
          'page_id'       => $page_id,
      ]);
  }

  public function getShow404()
  {
    header("HTTP/1.0 404 Not Found");
    echo $this->blade->render('page-not-found');
  }


}
