<?php

class m170903_180547_create_table_AuthAssignment extends CDbMigration
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

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}