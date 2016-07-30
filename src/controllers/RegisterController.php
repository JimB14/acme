<?php
namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;

class RegisterController extends BaseController
{

  public function getShowRegisterPage()
  {
      echo $this->blade->render("register"); // echo a blade register template
  }

  public function postShowRegisterPage()
  {
      $errors = [];

      $validation_data = [
        'first_name'    => 'min:3',
        'last_name'     => 'min:3',
        'email'         => 'email|equalTo:verify_email',
        'verify_email'  => 'email',
        'password'      => 'min:3|equalTo:verify_password',
      ];

      // create new instance of Validator model
      $validator = new Validator;

      $errors = $validator->isValid($validation_data);

      if(count($errors) > 0)
      {
          $_SESSION['msg'] = $errors;
          echo $this->blade->render('register');
          unset($_SESSION['msg']);
          exit();
      }

      // save to database
      $user = new User; // create new instance of User model to hold information

      // Store posted data into variables & save into database
      $user->first_name = $_REQUEST['first_name'];
      $user->last_name = $_REQUEST['last_name'];
      $user->email = $_REQUEST['email'];
      $user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
      $user->save();

      echo 'New user successfully registered!';
  }

  public function getShowLoginPage()
  {
      echo $this->blade->render("login"); // echo a blade login template
  }

}
