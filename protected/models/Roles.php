<?php

class Roles extends CActiveRecord
{
	public function tableName()
	{
		return 'roles';
	}

	public function relations()
	{
		return array(
			'userRoles' => array(self::HAS_MANY, 'UserRoles', 'role'),
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
