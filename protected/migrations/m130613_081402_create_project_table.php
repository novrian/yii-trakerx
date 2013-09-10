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

        // Insert 20 Tes Project
        for ($i = 0; $i <= 20; $i++) {
            $this->insert($this->_prefix . 'project', array(
                'name' => 'Test Project ' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dolor dui, pellentesque id tincidunt tristique, mollis id nunc. Ut quis.'
            ));
        }
	}

	public function down() {
        $this->dropTable($this->_prefix . 'project');
        $this->dropTable($this->_prefix . 'issue');
        $this->dropTable($this->_prefix . 'user');
        $this->dropTable($this->_prefix . 'project_user');
	}

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
}
