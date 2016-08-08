<?php
namespace Acme\models;
// gives User.php access to Model class in Eloquent package
// Note path directories separated with backslash (\) not forward slash (/)
use Illuminate\Database\Eloquent\Model as Eloquent;

class Testimonial extends Eloquent
{
    public function user()
    {
      return $this->hasOne('Acme\models\User');
    }

}
