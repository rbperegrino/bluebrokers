<?php

class m140623_103542_tbl_categoria extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_categoria', array(
            'id' => 'pk',
            'nome' => 'string NOT NULL',
            'imagem' => 'string NOT NULL',
            'status' => 'boolean DEFAULT 1',
            'criado' => 'datetime DEFAULT NULL',
            'criado_por' => 'int(11) DEFAULT NULL',
            'modificado' => 'datetime DEFAULT NULL',
            'modificado_por' => 'int(11) DEFAULT NULL',
        ), 'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->dropTable('tbl_categoria');
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