<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;

?>

<div class="col-sm-4 col-sm-offset-4">
    <h1><? $title ?></h1>

    <?php $form = ActiveForm::begin();?>
    <?= $form->field($model,'name')->textInput(['placeholder'=>'Please enter your name']);?>

    <?= $form->field($model,'birthday')->textInput(['type'=>'date']);?>
    <?= $form->field($model,'nic')->textInput();?>
    <?= $form->field($model,'mobile')->textInput();?>
    <?= $form->field($model,'land')->textInput();?>
    <?= $form->field($model,'designation_id')->dropDownList(ArrayHelper::map($designation,'id','name'),['prompt'=>'Select a designation']);?>
    <?= $form->field($model,'description')->textarea();?>

    <?=Html::submitButton($btnText,['class'=>'btn btn-primary'])?>

    <?php ActiveForm::end()?>

</div>