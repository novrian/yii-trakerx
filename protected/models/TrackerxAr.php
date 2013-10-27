<?php

abstract class TrackerxAr extends CActiveRecord {

    public function beforeSave() {
        if (Yii::app()->user->id) {
            $id = Yii::app()->user->id;
        } else {
            $id = 1;
        }

        if ($this->isNewRecord) {
            $this->create_user_id = $id;
        }

        $this->update_user_id = $id;

        return parent::beforeSave();
    }

    public function behaviors() {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
            ),
        );
    }

}
