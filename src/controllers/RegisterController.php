<?php
namespace Acme\controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Acme\Email\SendEmail;
use Acme\Models\UserPending;

class RegisterController extends BaseController
{

    public function getShowRegisterPage()
    {
        echo $this->blade->render("register", ['signer' => $this->signer]);
    }

    public function postShowRegisterPage()
    {
        // Cross site request forgery protection
        if (!$this->signer->validateSignature($_POST['_token'])) {
            header('HTTP/1.0 400 Bad Request');
            exit;
        }

        $errors = [];

        $validation_data = [
          'first_name'    => 'min:3',
          'last_name'     => 'min:3',
          'email'         => 'email|equalTo:verify_email|unique:User',
          'verify_email'  => 'email',
          'password'      => 'min:3|equalTo:verify_password',
        ];

        // create new instance of Validator model
        $validator = new Validator;

        $errors = $validator->isValid($validation_data);

        if(count($errors) > 0)
        {
            $_SESSION['msg'] = $errors;
            echo $this->blade->render("register", ['signer' => $this->signer]);
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

        // concatenate two 32 character random strings into a 64 character string
        $token = md5(uniqid(rand(), true)) . md5(uniqid(rand(), true));

        // create new instance of UserPending object (possible by use statement at top of page)
        $user_pending = new UserPending;
        // store value of $token (above) in $user_pending object's token
        $user_pending->token = $token;
        // store value of user object id into user_pending object's user_id
        $user_pending->user_id = $user->id;
        $user_pending->save();

        // store into $message, the rendering of welcome-email template and pass $token
        $message = $this->blade->render('emails.welcome-email', ['token' => $token]);

        // send verification email to user
        SendEmail::sendEmail($user->email, 'Welcome to Acme', $message);

        header("Location: /success");
        exit();
    }

    public function getVerifyAccount()
    {
        // initialize variable
        $user_id = 0;

        // get value of token from query string in user email and store in variable
        $token = $_GET['token'];

        //dd($token);

        // look for token in table and, if found, store row of results in $user_pending
        $user_pending = UserPending::where('token', '=', $token)->get(); // result row stored in $user_pending

        // loop through result array and store users_pending.user_id in $user_id
        foreach($user_pending as $item)
        {
            $user_id = $item->user_id; // old way:  $user_id = $item['user_id']
        }

        if($user_id > 0)
        {
            // update active field in users table (users.active) to 1 & delete from users_pending table
            // find user using value of $user_id & store in $user variable
            $user = User::find($user_id);
            $user->active = 1;
            $user->save();

            UserPending::where('token', '=', $token)->delete();

            header("Location: /account-activated");
            exit();
        }
        else
        {
            header("Locaton: /page-not-found");
            exit();
        }
    }


}
