<?php

/**
 * This is the model class for table "tbl_subcategoria".
 *
 * The followings are the available columns in table 'tbl_subcategoria':
 * @property integer $id
 * @property string $nome
 * @property integer $categoria_id
 * @property integer $status
 * @property string $criado
 * @property integer $criado_por
 * @property string $modificado
 * @property integer $modificado_por
 *
 * The followings are the available model relations:
 * @property Categoria $categoria
 */
class Subcategoria extends CActiveRecord
{

    public $categoria_nome;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subcategoria the static model class
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
		return 'tbl_subcategoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, categoria_id', 'required'),
			array('categoria_id, status, criado_por, modificado_por', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>255),
			array('criado, modificado', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nome, categoria_id, status, criado, criado_por, modificado, modificado_por, categoria_nome', 'safe', 'on'=>'search'),
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
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nome' => 'Nome',
			'categoria_id' => 'Categoria',
			'status' => 'Status',
            'categoria' => 'Categoria',
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
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('categoria_id',$this->categoria_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('criado',$this->criado,true);
		$criteria->compare('criado_por',$this->criado_por);
		$criteria->compare('modificado',$this->modificado,true);
		$criteria->compare('modificado_por',$this->modificado_por);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



}