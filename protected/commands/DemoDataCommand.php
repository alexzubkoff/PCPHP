<?php

class DemoDataCommand extends CConsoleCommand
{
    // $app = Yii::app();
    // const USERS = Yii::app()->basePath . '/data/demo/users.php';
    // const LOCATIONS = Yii::app()->basePath . '/data/demo/locations.php';
    // const GROUPS = Yii::app()->basePath . '/data/demo/groups.php';
    // const USER_GROUPS = Yii::app()->basePath . '/data/demo/user_groups.php';
    // const USER_ROLES = Yii::app()->basePath . '/data/demo/user_roles.php';
    // const DIRECTIONS = Yii::app()->basePath . '/data/demo/directions.php';

    public function actionFillOutTableLocations()
    {
        $locations = require_once Yii::app()->basePath . '/data/demo/locations.php';
        $command = Yii::app()->db->createCommand();
        foreach ($locations as $location) {
            $command->insert('locations', $location);
        }
    }

    public function actionFillOutTableUsers()
    {
        $users = require_once Yii::app()->basePath . '/data/demo/users.php';
        $command = Yii::app()->db->createCommand();
        foreach ($users as $user) {
            $command->insert('users', $user);
        }
    }

    public function actionFillOutTableDirections()
    {
        $directions = require_once Yii::app()->basePath . '/data/demo/directions.php';
        $command = Yii::app()->db->createCommand();
        foreach ($directions as $direction) {
            $command->insert('directions', $direction);
        }
    }

    public function actionFillOutTableGroups()
    {
        $groups = require_once Yii::app()->basePath . '/data/demo/groups.php';
        $command = Yii::app()->db->createCommand();
        foreach ($groups as $group) {
            $command->insert('groups', $group);
        }
    }

    public function actionFillOutTableUserGroups()
    {
        $user_groups = require_once Yii::app()->basePath . '/data/demo/user_groups.php';
        $command = Yii::app()->db->createCommand();
        foreach ($user_groups as $user_group) {
            $command->insert('user_groups', $user_group);
        }
    }

    public function actionFillOutTableUserRoles()
    {
        $user_roles = require_once Yii::app()->basePath . '/data/demo/user_roles.php';
        $command = Yii::app()->db->createCommand();
        foreach ($user_roles as $user_role) {
            $command->insert('user_roles', $user_role);
        }
    }
    
    public function actionFillOutTablesUserRoles() 
    {   
        $auth = Yii::app()->authManager;
        $auth->createOperation('createGroup');
        $auth->createOperation('updateGroup');
        $auth->createOperation('deleteGroup');
        $auth->createOperation('createUser');
        $auth->createOperation('updateUser');
        $auth->createOperation('deleteUser');

        $task = $auth->createTask('createOwnLocationGroup', 'Allows a user to create his own location  group', 'return $params["id"] == Yii::app()->user->id;');
        $task->addChild('createGroup');

        $task = $auth->createTask('updateOwnLocationGroup', 'Allows a user to update his own location group', 'return $params["id"] == Yii::app()->user->id;');
        $task->addChild('updateGroup');

        $task = $auth->createTask('deleteOwnLocationGroup', 'Allows a user to delete his own location group', 'return $params["id"] == Yii::app()->user->id;');
        $task->addChild('deleteGroup');

        $task = $auth->createTask('updateOwnUser', 'Allows a user to update his record', 'return $params["id"] == Yii::app()->user->id;');
        $task->addChild('updateUser');

        $role = $auth->createRole('teacher');
        $role->addChild('updateOwnLocationGroup');
        $role->addChild('updateOwnUser');

        $role = $auth->createRole('coordinator');
        $role->addChild('teacher');
        $role->addChild('createOwnLocationGroup');
        $role->addChild('deleteOwnLocationGroup');

        $role = $auth->createRole('administrator');
        $role->addChild('createGroup');
        $role->addChild('updateGroup');
        $role->addChild('deleteGroup');
        $role->addChild('createUser');
        $role->addChild('updateUser');
        $role->addChild('deleteUser');
     
    }
}
