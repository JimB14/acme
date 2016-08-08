<?php
namespace Acme\controllers;

// use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Kunststube\CSRFP\SignatureGenerator;

class BaseController
{
    // create variable to be available for all controllers (if they include 'extends BaseController')
    protected $blade;
    protected $signer;  // from Kunststube\CSRFP

    public function __construct()
    {
        $this->signer = new SignatureGenerator(getenv('CSRF_SECRET'));
        $this->blade = new BladeInstance(getenv('VIEWS_DIRECTORY'), getenv('CACHE_DIRECTORY')); // environmental variables
    }

}
