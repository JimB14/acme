<?php
$controller = null;
$method = null;

include(__DIR__ . "/../bootstrap/start.php");
Dotenv::load(__DIR__ .  "/../");
include(__DIR__ .  "/../bootstrap/db.php");
include(__DIR__ . "/../routes.php");

// Data used below coming from routes.php
$match = $router->match();

//dd($match);

if(is_string($match['target']))
{
  list($controller, $method) = explode("@", $match['target']);// list construct takes values from array and assigns them to variables
}

// is_callable — Verify that the contents of a variable can be called as a function
if( ($controller != null) && (is_callable(array($controller, $method))))
{
  $object = new $controller();
  // call_user_func_array — Call a callback with an array of parameters
  call_user_func_array(array($object, $method), array($match['params']));
}
else if($match && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
}
else
{
  echo "Cannot find $controller -> $method";
  exit();
}
