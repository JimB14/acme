<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{

    public function up()
    {
        $password_hash = password_hash('verysecret', PASSWORD_DEFAULT);

        $this->execute("
            INSERT INTO users
            (first_name, last_name, email, password)
            VALUES
            ('Jim', 'Burns', 'jim.burns14@gmail.com', '$password_hash')
        ");
    }

    public function down()
    {

    }

}
