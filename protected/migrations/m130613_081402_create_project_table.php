<?php

class m130613_081402_create_project_table extends CDbMigration {

    private $_prefix = 'trk_';

    public function up() {
        $this->createTable($this->_prefix . 'project', array(
            'id'             => 'pk',
            'name'           => 'string NOT NULL',
            'description'    => 'text NOT NULL',
            'create_time'    => 'datetime DEFAULT NULL',
            'create_user_id' => 'int(11) DEFAULT NULL',
            'update_time'    => 'datetime DEFAULT NULL',
            'update_user_id' => 'int(11) DEFAULT NULL'
        ), 'ENGINE=InnoDB');
    }

    public function down() {
        $this->dropTable($this->_prefix . 'project');
    }
}
