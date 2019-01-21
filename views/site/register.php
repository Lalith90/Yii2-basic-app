<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;

?>

<div class="col-sm-4 col-sm-offset-4">
    <h1>Registration Form</h1>

<?php $form = ActiveForm::begin();?>
<?= $form->field($model,'username')->textInput();?>

<?= $form->field($model,'password')->passwordInput();?>

<?= $form->field($model,'password_repeat')->passwordInput();?>

<?=Html::submitButton('Register',['class'=>'btn btn-primary'])?>

<?php ActiveForm::end()?>

</div>