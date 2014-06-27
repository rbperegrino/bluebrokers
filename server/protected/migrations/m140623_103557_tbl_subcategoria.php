<?php

class m140623_103557_tbl_subcategoria extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_subcategoria', array(
            'id' => 'pk',
            'nome' => 'string NOT NULL',
            'categoria_id' => 'int(11) NOT NULL',
            'status' => 'boolean DEFAULT 1',
            'criado' => 'datetime DEFAULT NULL',
            'criado_por' => 'int(11) DEFAULT NULL',
            'modificado' => 'datetime DEFAULT NULL',
            'modificado_por' => 'int(11) DEFAULT NULL',
        ), 'ENGINE=InnoDB');
    }

    public function down()
    {
        $this->dropTable('tbl_subcategoria');
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