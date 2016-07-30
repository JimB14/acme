<?php
namespace Acme\Validation;

use Respect\Validation\Validator as Valid;

// class name must match file name
class Validator
{

  public function isValid($validation_data)
  {

    $errors = [];

    foreach($validation_data as $name => $value)
    {
      if(isset($_REQUEST[$name]))
      {

        $rules = explode("|", $value);

        foreach($rules as $rule)
        {
          $exploded = explode(":", $rule);

          switch($exploded[0])
          {
            case 'min':
                $min = $exploded[1];
                if(Valid::stringType()->length($min, null)->validate($_REQUEST[$name]) == false)
                {
                  $errors[] = $name . " must be at least " . $min . " characters long.";
                }
                break;

            case 'email':
                if(Valid::email()->validate($_REQUEST[$name]) == false)
                {
                  $errors[] = $name . " must be a valid email address. Please try again.";
                }
                break;

            case 'equalTo':
                if(Valid::equals($_REQUEST[$name])->validate($_REQUEST[$exploded[1]]) == false)
                {
                  $errors[] = "Values do not match. Please try again.";
                }
                break;

            default:
            // do nothing
          }
        }
      }
    }
    return $errors;
  }
}
