<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>', 'url'=>array('admin')),
);
?>

<h1><?php echo $label; ?></h1>


<div class="widget">
    <div class="head"><h5 class="iClipboard">Menu</h5></div>
    <div class="body">
        
        <?php echo "<?php"; ?> echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/middlenav/add.png').'<span>Novo <?php echo $this->class2name($this->modelClass); ?></span>', $this->createUrl('novo'), array('class'=> 'btn55 mr10 aligncenter')); ?>
    

    </div>
</div> 
<div class="table">
    <div class="head"><h5 class="iFrames">Lista de Dias</h5></div>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead style="background:white;">
            <tr>
                <th>Nome</th>
               
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

           <?php echo "<?php"; ?>

           foreach($model as $c ){


               ?>

               <tr class="gradeA" id="">

                <td style="vertical-align:middle;">
                    <?php echo "<?php"; ?> echo $c->nome; ?>
                </td>
                
                <td width="180" style="vertical-align:middle;">                   
                    <?php echo "<?php"; ?> 
                        if(Yii::app()->user->id == 'admin'):
                        	echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/color/pencil.png'), $this->createUrl('update', array('id' => $c->id)), array('class' => 'btn14 mr5 botDir', 'title' => 'Editar'));
                            echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl.'/images/icons/color/cross.png'), $this->createUrl('delete', array('id' => $c->id)), array('confirm' => 'Deseja Excluir esta Empresa?','class' => 'btn14 mr5 botDir', 'title' => 'Remover', ));
                        endif;
                    ?>
                
                    
                </td>
               




            </tr>
            <?php echo "<?php"; ?> } ?>


        </tbody>
    </table>
</div>