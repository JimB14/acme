<?php
namespace Acme\auth;

use Acme\models\User;

class LoggedIn
{
    // don't need to call an instance of a static function
    public static function user()
    {
        if(isset($_SESSION['user']))
        {
            $user = $_SESSION['user'];
            return $user;
        }
        else
        {
            return false;
        }
    }
}
