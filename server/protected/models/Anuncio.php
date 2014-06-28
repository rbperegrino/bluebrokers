<?php

/**
 * This is the model class for table "tbl_anuncio".
 *
 * The followings are the available columns in table 'tbl_anuncio':
 * @property integer $id
 * @property string $titulo
 * @property string $descricao
 * @property string $ano
 * @property string $telefone
 * @property string $email
 * @property string $cidade
 * @property string $estado
 * @property string $valor
 * @property integer $destaque
 * @property string $atributo_1
 * @property string $atributo_2
 * @property string $atributo_3
 * @property integer $status
 * @property integer $subcategoria_id
 * @property string $criado
 * @property integer $criado_por
 * @property string $modificado
 * @property integer $modificado_por
 *
 * The followings are the available model relations:
 * @property Subcategoria $subcategoria
 */
class Anuncio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Anuncio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_anuncio';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, descricao, email', 'required'),
			array('destaque, status, subcategoria_id, criado_por, modificado_por', 'numerical', 'integerOnly'=>true),
			array('titulo, telefone, email, cidade, estado, valor, atributo_1, atributo_2, atributo_3', 'length', 'max'=>255),
			array('ano', 'length', 'max'=>50),
			array('criado, modificado', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, descricao, ano, telefone, email, cidade, estado, valor, destaque, atributo_1, atributo_2, atributo_3, status, subcategoria_id, criado, criado_por, modificado, modificado_por', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'subcategoria' => array(self::BELONGS_TO, 'Subcategoria', 'subcategoria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'descricao' => 'Descricao',
			'ano' => 'Ano',
			'telefone' => 'Telefone',
			'email' => 'Email',
			'cidade' => 'Cidade',
			'estado' => 'Estado',
			'valor' => 'Valor',
			'destaque' => 'Destaque',
			'atributo_1' => 'Atributo 1',
			'atributo_2' => 'Atributo 2',
			'atributo_3' => 'Atributo 3',
			'status' => 'Status',
			'subcategoria_id' => 'Subcategoria',
			'criado' => 'Criado',
			'criado_por' => 'Criado Por',
			'modificado' => 'Modificado',
			'modificado_por' => 'Modificado Por',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('ano',$this->ano,true);
		$criteria->compare('telefone',$this->telefone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cidade',$this->cidade,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('destaque',$this->destaque);
		$criteria->compare('atributo_1',$this->atributo_1,true);
		$criteria->compare('atributo_2',$this->atributo_2,true);
		$criteria->compare('atributo_3',$this->atributo_3,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('subcategoria_id',$this->subcategoria_id);
		$criteria->compare('criado',$this->criado,true);
		$criteria->compare('criado_por',$this->criado_por);
		$criteria->compare('modificado',$this->modificado,true);
		$criteria->compare('modificado_por',$this->modificado_por);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}