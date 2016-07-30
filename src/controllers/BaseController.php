<?php
namespace Acme\Controllers;

// use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;

class BaseController
{

  protected $blade;

  public function __construct()
  {
    $this->blade = new BladeInstance("/vagrant/views", "/vagrant/cache/views");
  }

}
