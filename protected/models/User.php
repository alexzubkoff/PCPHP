<?php

class User extends CActiveRecord
{

	public function tableName()
	{
		return 'users';
	}

	public function rules()
	{
            
		return array(
			array('username, password, location', 'required'),
			array('location', 'numerical', 'integerOnly'=>true),
			array('firstname, lastname, username, password, type', 'length', 'max'=>45),
			array('id, firstname, lastname, username, password, location, type', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'userGroups' => array(self::HAS_MANY, 'UserGroups', 'user'),
			'userRoles' => array(self::HAS_MANY, 'UserRoles', 'user'),
			'location0' => array(self::BELONGS_TO, 'Locations', 'location'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'username' => 'Username',
			'password' => 'Password',
			'location' => 'Location',
			'type' => 'Type',
		);
	}
        
	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('location',$this->location);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
