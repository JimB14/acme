<?php
namespace Acme\controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Acme\Auth\LoggedIn;

class AuthenticationController extends BaseController
{
    /**
     * Shows the login page
     * @return html
     */
    public function getShowLoginPage()
    {
        echo $this->blade->render("login", ['signer' => $this->signer]);
    }

    /**
     * Logs authorized user in
     * @return boolean
     */
    public function postShowLoginPage()
    {
        // Cross site request forgery protection
        if (!$this->signer->validateSignature($_POST['_token'])) {
            header('HTTP/1.0 400 Bad Request');
            exit;
        }

        // assign true/false checker
        $okay = true;

        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        // look up User
        $user = User::where('email', '=', $email)
              ->first();

        if($user != null)
        {
            // validate stored hashed password using PHP boolean password_verify()
            if(!password_verify($password, $user->password))
            {
                $okay = false;
            }

            if ($user->active == 0)
            {
                $okay = false;
            }
        }
        else
        {
            $okay = false;
        }

        // if valid, log user in and header to home page
        if($okay)
        {
            // store user data in SESSION variable
            $_SESSION['user'] = $user;

            // send user to home page
            header("Location: /");
            exit();
        }
        else
        {
            // error message
            $_SESSION['msg'] = ["Invalid login"];

            // send user back to login page
            echo $this->blade->render("login", ['signer' => $this->signer]);

            // empty SESSION['msg'] variable
            unset($_SESSION['msg']);
            exit();
        }
    }

    /**
     * Logs user out
     * @return header redirect
     */
    public function getLogout()
    {
        // clear SESSION['user'] to log user out
        unset($_SESSION['user']);

        // destroy session
        session_destroy();

        // send user to login page
        header("Location: /login");
        exit();

    }


}
