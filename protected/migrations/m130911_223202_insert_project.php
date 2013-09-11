<?php

class m130911_223202_insert_project extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->insert('trk_project', array(
                'name' => 'Project ' . $i,
                'description' => 'Project ' . $i . ' description lorem ipsum dolor sit amet'
            ));
        }
    }

    public function safeDown()
    {
        return false;
    }
}
