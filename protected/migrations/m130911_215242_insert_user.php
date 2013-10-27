<?php

class m130911_215242_insert_user extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp() {
        $this->insert('trk_user', array(
            'username' => 'admin',
            'email' => 'me@novrian.info',
            'password' => md5('123456'),
            'create_time' => date('Y-m-d H:i:s'),
            'update_time' => date('Y-m-d H:i:s'),
        ));
        for($i = 0; $i < 5; $i++) {
            $this->insert('trk_user', array(
                'username' => 'user_' . $i,
                'email' => 'user_' . $i . '@example.com',
                'password' => md5('123456'),
                'create_time' => date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
            ));
        }
    }

    public function safeDown()
    {
        $this->truncateTable('trk_user');
    }
}
