<?php
namespace Acme\controllers;

use duncan3dc\Laravel\BladeInstance;
use Acme\models\Testimonial;
use Acme\Validation\Validator;
use Acme\auth\LoggedIn;

class TestimonialController extends BaseController
{
    public function getShowTestimonials()
    {
        // get all testimonials from db using built in 'all' method
        $testimonials = Testimonial::all();

        // call template
        echo $this->blade->render('testimonials', ['testimonials' => $testimonials]);

    }


    public function getShowAdd()
    {
        echo $this->blade->render('add-testimonial');
    }


    public function postShowAdd()
    {
        $errors = [];

        $validation_data = [
          'title'         => 'min:3',
          'testimonial'   => 'min:10',
        ];

        // create new instance of Validator model
        $validator = new Validator;

        $errors = $validator->isValid($validation_data);

        if(count($errors) > 0)
        {
            $_SESSION['msg'] = $errors;
            echo $this->blade->render('add-testimonial');
            unset($_SESSION['msg']);
            exit();
        }

        // get data & insert into database
        $testimonial = new Testimonial;
        $testimonial->title = $_REQUEST['title'];
        $testimonial->testimonial = $_REQUEST['testimonial'];
        $testimonial->user_id = LoggedIn::user()->id;
        $testimonial->save();

        header("Location: /testimonial-saved");
        exit();

    }


}
