<?php

use Phinx\Migration\AbstractMigration;

class SeedTestimonialsTable extends AbstractMigration
{

  public function up()
  {
      $this->execute("
          INSERT INTO testimonials (title, testimonial, user_id, created_at)
          VALUES
          (
          'Best Tour Company around',
          'Acme Tours is the best tour company I have traveled with. Not only did they take us to the best places, show us how to avoid the tourist traps, but they educated us in a way that magnified an already great experience.',
          '1',
          '2016-08-04 22:18:36'
          )
      ");
  }

  public function down()
  {

  }

}
