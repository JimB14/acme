<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{

  public function up()
  {

      $this->execute("
            INSERT INTO pages
            (browser_title, page_content, slug)
            VALUES
            ('About Acme', '<h1>About Acme</h1><p>All about this company.</p>', 'about-acme')
        ");
        $this->execute("
            INSERT INTO pages
            (browser_title, page_content, slug)
            VALUES
            ('Success', '<h1>Success</h1><p>Welcome to Acme!</p>', 'success')
        ");
        $this->execute("
            INSERT INTO pages
            (browser_title, page_content, slug)
            VALUES
            ('Not Found', '<h1>Page Not Found!</h1><p>Page not found!</p>', 'page-not-found')
        ");
        $this->execute("
            INSERT INTO pages
            (browser_title, page_content, slug)
            VALUES
            ('Account Activated', '<h1>Acount Now Active</h1><p>Your account is now active, and you can log in.</p>', 'account-activated')
        ");
        $this->execute("
            INSERT INTO pages
            (browser_title, page_content, slug)
            VALUES
            ('Saved', '<h1>Testimonial Saved</h1><p>Your testimonial has been saved.</p>', 'testimonial-saved')
        ");

  }

  public function down()
  {

  }


}
