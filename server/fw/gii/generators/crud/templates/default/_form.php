<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo "<?php \$form=\$this->beginWidget('CActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class' => 'mainForm'),
)); ?>\n"; ?>

<div class="widget first">	
	
	<div class="head">
		<h5 class="iList"><?php echo "<?php echo \$model->isNewRecord ? 'Criar' : 'Editar'?>" ?> <?php echo $this->getModelClass(); ?></h5>
	</div>

	<div class="rowElem">
		<p class="note">Campos com <span class="required">*</span> são requeridos.</p>
	</div>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement || $column->name == 'criado' || $column->name == 'modificado' || $column->name == 'c_usuario' || $column->name == 'm_usuario')
		continue;
?>
	<div class="rowElem">
		<?php echo "<?php echo ".$this->generateActiveLabel($this->modelClass,$column)."; ?>\n"; ?>
		<div class="formRight">
			<?php echo "<?php echo ".$this->generateActiveField($this->modelClass,$column)."; ?>\n"; ?>
			<?php echo "<?php echo \$form->error(\$model,'{$column->name}'); ?>\n"; ?>
		</div>
		<div class="fix"></div>
	</div>

<?php
}
?>
	
<?php echo "<?php echo CHtml::submitButton(\$model->isNewRecord ? 'Salvar' : 'Editar', array('class' => 'greyishBtn submitForm')); ?>\n"; ?>
<div class="fix"></div>
	
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->