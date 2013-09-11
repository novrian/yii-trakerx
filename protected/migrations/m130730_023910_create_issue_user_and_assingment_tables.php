<?php

class m130730_023910_create_issue_user_and_assingment_tables extends CDbMigration
{

    private $_prefix = 'trk_';

    public function up() {
        // create issue table
        $this->createTable($this->_prefix . 'issue', array(
            'id'             => 'pk',
            'name'           => 'string NOT NULL',
            'description'    => 'text',
            'project_id'     => 'int(11) DEFAULT NULL',
            'type_id'        => 'int(11) DEFAULT NULL',
            'status_id'      => 'int(11) DEFAULT NULL',
            'owner_id'       => 'int(11) DEFAULT NULL',
            'requester_id'   => 'int(11) DEFAULT NULL',
            'create_time'    => 'datetime DEFAULT NULL',
            'create_user_id' => 'int(11) DEFAULT NULL',
            'update_time'    => 'datetime DEFAULT NULL',
            'update_user_id' => 'int(11) DEFAULT NULL'
        ), 'ENGINE=InnoDB');

        // create user table
        $this->createTable($this->_prefix . 'user', array(
            'id'              => 'pk',
            'username'        => 'string NOT NULL',
            'email'           => 'string NOT NULL',
            'password'        => 'string NOT NULL',
            'last_login_time' => 'datetime DEFAULT NULL',
            'create_time'     => 'datetime DEFAULT NULL',
            'create_user_id'  => 'int(11) DEFAULT NULL',
            'update_time'     => 'datetime DEFAULT NULL',
            'update_user_id'  => 'int(11) DEFAULT NULL'
        ), 'ENGINE=InnoDB');

        // Assigment Table
        $this->createTable($this->_prefix . 'project_user', array(
            'project_id' => 'int(11) NOT NULL',
            'user_id'    => 'int(11) NOT NULL',
            'PRIMARY KEY(`project_id`, `user_id`)'
        ), 'Engine=InnoDB');

        // For Key
        $this->addForeignKey('fk_issue_project', $this->_prefix . 'issue', 'project_id', $this->_prefix . 'project', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_issue_owner', $this->_prefix . 'issue', 'owner_id', $this->_prefix . 'user', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_issue_requester', $this->_prefix . 'issue', 'requester_id', $this->_prefix . 'user', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_project_user', $this->_prefix . 'project_user', 'project_id', $this->_prefix . 'project', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_user_project', $this->_prefix . 'project_user', 'user_id', $this->_prefix . 'user', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('fk_issue_project', 'trk_issue');
        $this->dropForeignKey('fk_issue_owner', 'trk_issue');
        $this->dropForeignKey('fk_issue_requester', 'trk_issue');
        $this->dropForeignKey('fk_project_user', 'trk_project_user');
        $this->dropForeignKey('fk_user_project', 'trk_project_user');
        $this->truncateTable($this->_prefix . 'project_user');
        $this->truncateTable($this->_prefix . 'issue');
        $this->truncateTable($this->_prefix . 'user');
        $this->dropTable($this->_prefix . 'project_user');
        $this->dropTable($this->_prefix . 'issue');
        $this->dropTable($this->_prefix . 'user');

    }
}
