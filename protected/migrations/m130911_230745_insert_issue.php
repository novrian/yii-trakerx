<?php

class m130911_230745_insert_issue extends CDbMigration
{
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        $maxUser = 6;
        $maxProject = 20;
        $maxStatType = 2;
        for ($i = 0; $i < 100; $i++) {
            $project = rand(1,20);
            $status = rand(0, 2);
            $type = rand(0,2);
            $this->insert('trk_issue', array(
                'name' => sprintf("Issue %s at Project %s", $i, $project),
                'description' => sprintf("Description for issue %s lorem ipsum dolor sit amet", $i),
                'project_id' => $project,
                'type_id' => $type,
                'status_id' => $status,
                'owner_id' => rand(1, 6),
                'requester_id' => rand(1, 6),
                'create_time' => date('Y-m-d H:i:s'),
                'update_time' => date('Y-m-d H:i:s'),
            ));
        }
    }

    public function safeDown()
    {
        echo "m130911_230745_insert_issue does not support migration down.\n";
        return false;
    }
}
