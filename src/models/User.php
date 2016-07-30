<?php
namespace Acme\Models;
// gives User.php access to Model class in Eloquent package
// Note path directories separated with backslash (\) not forward slash (/)
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{

  public $timestamps = false;  // because our database doesn't have fields for timestamps (create & update fields)

}
