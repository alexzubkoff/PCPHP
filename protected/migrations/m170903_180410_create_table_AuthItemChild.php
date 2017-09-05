<?php

class m170903_180410_create_table_AuthItemChild extends CDbMigration
{

    public function up()
    {
        $this->execute('
            drop table if exists `AuthItemChild`;
            create table `AuthItemChild`
            (
            `parent`               varchar(64) not null,
            `child`                varchar(64) not null,
            primary key (`parent`,`child`),
            foreign key (`parent`) references `AuthItem` (`name`) on delete cascade on update cascade,
            foreign key (`child`) references `AuthItem` (`name`) on delete cascade on update cascade
            ) engine InnoDB;');
    }

    public function down()
    {
        $this->execute('drop table `AuthItemChild`;');
    }
}
