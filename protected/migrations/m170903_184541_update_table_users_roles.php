<?php

class m170903_184541_update_table_users_roles extends CDbMigration
{

    public function up()
    {
        $this->execute('
            UPDATE `caesar`.`user_roles` SET `role` = 2 WHERE `user_roles`.`id` = 1;
            UPDATE `caesar`.`user_roles` SET `role` = 2 WHERE `user_roles`.`id` = 14;
            UPDATE `caesar`.`user_roles` SET `role` = 2 WHERE `user_roles`.`id` = 18;
            UPDATE `caesar`.`user_roles` SET `role` = 2 WHERE `user_roles`.`id` = 19;
            UPDATE `caesar`.`user_roles` SET `role` = 2 WHERE `user_roles`.`id` = 21;
            UPDATE `caesar`.`user_roles` SET `role` = 2 WHERE `user_roles`.`id` = 22;
            UPDATE `caesar`.`user_roles` SET `role` = 2 WHERE `user_roles`.`id` = 23;
            UPDATE `caesar`.`user_roles` SET `role` = 3 WHERE `user_roles`.`id` = 3;
            UPDATE `caesar`.`user_roles` SET `role` = 3 WHERE `user_roles`.`id` = 4;
            ');
    }

    public function down()
    {
        $this->execute('
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 1;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 14;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 18;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 19;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 21;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 22;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 23;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 3;
            UPDATE `caesar`.`user_roles` SET `role` = 1 WHERE `user_roles`.`id` = 4;
            ');
    }

}
