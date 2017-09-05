<?php

class UserRoles extends CActiveRecord 
{
    public function tableName() 
    {
        return 'user_roles';
    }

    public function relations() 
    {
        return array(
            'role0' => array(self::BELONGS_TO, 'Roles', 'role'),
            'user0' => array(self::BELONGS_TO, 'Users', 'user'),
        );
    }

    public static function model($className = __CLASS__) 
    {
        return parent::model($className);
    }
}
