<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{

  public function up()
  {

      $this->execute("
          INSERT INTO pages (browser_title, page_content)
          VALUES
          ('About', 'Acme Tours has been providing national and international tour services since 1985. Our services are available for organizations, groups, families and individuals.')
      ");
  }

  public function down()
  {

  }


}
