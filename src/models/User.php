<?php
namespace Acme\Models;
// gives User.php access to Model class in Eloquent package
// Note path directories separated with backslash (\) not forward slash (/)
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    // Get all testimonials associated with a particular user
    public function testimonials()
    {
      return $this->hasMany('Acme\models\Testimonial');
    }
}
