<?php

class m170905_214254_create_table_authitem extends CDbMigration
{

    public function up()
    {
        $this->execute('
            drop table if exists `AuthItem`;
            create table `AuthItem`
            (
            `name`                 varchar(64) not null,
            `type`                 integer not null,
            `description`          text,
            `bizrule`              text,
            `data`                 text,
             primary key (`name`)
            ) engine InnoDB;
            ');
    }

    public function down()
    {
        $this->execute('drop table `AuthItem`;');
    }
}
