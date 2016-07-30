<?php
include(__DIR__ . "/../bootstrap/start.php");
Dotenv::load(__DIR__ .  "/../");
include(__DIR__ .  "/../bootstrap/db.php");
include(__DIR__ . "/../routes.php");

// boolean
$match = $router->match();

// list construct takes values from array and assigns them to variables
list($controller, $method) = explode("@", $match['target']);

// is_callable — Verify that the contents of a variable can be called as a function
if(is_callable(array($controller, $method)))
{
  $object = new $controller();
  // call_user_func_array — Call a callback with an array of parameters
  call_user_func_array(array($object, $method), array($match['params']));
}
else
{
  echo "Cannot find $controller -> $method";
  exit();
}
