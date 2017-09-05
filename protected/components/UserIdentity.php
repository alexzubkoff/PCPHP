<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $user = User::model()->findByAttributes(['username' => $this->username]);
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->password !== $this->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $user->id;
            $this->setState('firstname', $user->first_name);
            $this->setState('lastname', $user->last_name);
            $this->setState('type', $user->type);
            $this->setState('location', $user->location_id);
            $this->setState('picture', $user->picture);

            $location = Locations::model()->findByAttributes(['id' => $user->location_id]);
            $this->setState('city', $location->full_name);
            $user_roles = UserRoles::model()->findByAttributes(['user' => $user->id]);
            $role = Roles::model()->findByAttributes(['id' => $user_roles->role]);
            $this->setState('role', $role->name);

            $auth = Yii::app()->authManager;
            if (!$auth->isAssigned($role->name, $this->id)) {
                $auth->assign($role->name, $this->id);
                $auth->save();
            }
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}
