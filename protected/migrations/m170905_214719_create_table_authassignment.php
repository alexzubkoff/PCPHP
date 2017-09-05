<?php

class m170905_214719_create_table_authassignment extends CDbMigration
{

    public function up()
    {
        $this->execute('
            drop table if exists `AuthAssignment`;
            create table `AuthAssignment`
            (
            `itemname`             varchar(64) not null,
            `userid`               varchar(64) not null,
            `bizrule`              text,
            `data`                 text,
            primary key (`itemname`,`userid`),
            foreign key (`itemname`) references `AuthItem` (`name`) on delete cascade on update cascade
            ) engine InnoDB;
            ');
    }

    public function down()
    {
        $this->execute('drop table `AuthAssignment`;');
    }
}
