<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Atribut */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="customer-form">

    <?php $form = ActiveForm::begin([ 'options' => [
					'enctype' => 'multipart/form-data',
					'id' => 'dynamic-form' ]
	]); ?>


    <div class="row" style="margin:35px -10px;">
        <div class="col-sm-4">
            <?= $form->field($modelAtribut, 'nazivAtr')->textInput(['maxlength' => true])->label('Atribut') ?>
        </div>
    </div>

	<div class="row">
	<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading"><h5><i class="glyphicon glyphicon-envelope"></i> Unesi vrijednosti</h5></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 15, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsVrijednostAtributa[0],
                'formId' => 'dynamic-form',
                'formFields' => [
					'vrijAtrID',
					//'atrID',
                    'vrijednost',
                ],
             ]); ?>


				     <div class="container-items"><!-- widgetContainer -->

						<?php foreach ($modelsVrijednostAtributa as $i => $modelVrijednostAtributa): ?>
							<div class="item panel panel-default"><!-- widgetBody -->
								<div class="panel-heading">
									<h5 class="panel-title pull-left">Vrijednost</h5>
									<div class="pull-right">
										<button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
										<button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="panel-body">
										<?php
											// necessary for update action.
											if (! $modelVrijednostAtributa->isNewRecord) {
												echo Html::activeHiddenInput($modelVrijednostAtributa, "[{$i}]vrijAtrID");
											}
										?>

										<div class="row">
											<div class="col-sm-12">
												 <?= $form->field($modelVrijednostAtributa, "[{$i}]vrijednost")->textInput(['maxlength' => true])->label('') ?>
											</div>
										</div> <!-- .row -->
								</div>
							</div>
						<?php endforeach; ?>
				     </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
	</div>
	</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton($modelVrijednostAtributa->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

