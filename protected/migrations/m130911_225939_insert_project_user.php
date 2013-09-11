<?php

class m130911_225939_insert_project_user extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $maxUser = 6;
        $maxProject = 20;

        $u = 1;
        for ($p = 1; $p <= 20; $p++) {
            if ($u > $maxUser) {
                $u = 1;
            }

            $this->insert('trk_project_user', array(
                'project_id' => $p,
                'user_id' => $u
            ));
            $u++;
        }
    }

    public function safeDown()
    {
        echo "m130911_225939_insert_project_user does not support migration down.\n";
        return false;
    }
}
