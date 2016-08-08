<?php
namespace Acme\controllers;

use duncan3dc\Laravel\BladeInstance;
use Acme\models\Page;
use Acme\Validation\Validator;
use Cocur\Slugify\Slugify;

class AdminController extends BaseController
{
    /**
     * Saved edited page; called via ajax
     * @return string
     */
    public function postSavePage()
    {
        $okay = true;

        $page_id = $_REQUEST['page_id'];
        $page_content = $_REQUEST['thedata'];

        // check if page exists (new page will have page_id > 0)
        if($page_id > 0)
        {
            $page = Page::find($page_id); // store row of data in $page
        }
        else
        {
            // create new instance of Page
            $page = new Page;

            // create new instance of Slugify
            $slugify = new Slugify;

            // retrieve post data and store in variable
            $browser_title = $_REQUEST['browser_title'];
            $page->browser_title = $browser_title;
            $page->slug = $slugify->slugify($browser_title);

            // check if slugify version of $browser_title is in DB; if found, store in $results
            $results = Page::where('slug', '=', $slugify->slugify($browser_title))->get();

            // loop will execute only if $results is not empty; if not empty, slug exists, so $okay = false;
            foreach($results as $result)
            {
                $okay = false;
            }
        }

        // store page_content in $page
        $page->page_content = $page_content;

        if($okay)
        {
            $page->save();
            echo "OK";
        }
        else
        {
            // reach here if $okay = false
            echo "Browser title is already in use. Please choose another title.";
        }
    }

    /**
     * Adds new page to DB
     * @return mew page
     */
    public function getAddPage()
    {
        $page_id = 0;
        $browser_title = '';
        $page_content = 'This is your new page. To edit, click Admin > Edit page';

        echo $this->blade->render('generic-page', [
          'page_id' => $page_id,
          'browser_title' => $browser_title,
          'page_content' => $page_content,
        ]);
    }


}
