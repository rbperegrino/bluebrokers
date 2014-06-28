<?php

class m140623_103616_tbl_anuncio extends CDbMigration
{
    public function up()
    {
        $this->createTable('tbl_anuncio', array(
            'id' => 'pk',
            'titulo' => 'string NOT NULL',
            'descricao' => 'text NOT NULL',
            'ano' => 'string',
            'telefone' => 'string',
            'email' => 'string NOT NULL',
            'cidade' => 'string',
            'estado' => 'string',
            'valor' => 'string',
            'destaque' => 'boolean DEFAULT 0',
            'atributo_1' => 'string',
            'atributo_2' => 'string',
            'atributo_3' => 'string',
            'subcategoria_id' => 'int(11) NOT NULL',
            'status' => 'boolean DEFAULT 1',
            'criado' => 'datetime DEFAULT NULL',
            'criado_por' => 'int(11) DEFAULT NULL',
            'modificado' => 'datetime DEFAULT NULL',
            'modificado_por' => 'int(11) DEFAULT NULL',
        ), 'ENGINE=InnoDB');
    }

    public function down()
    {
        $this->dropTable('tbl_anuncio');
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