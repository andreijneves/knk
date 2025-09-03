<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'use_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'use_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'use_tipo')->dropDownList([ 'adm' => 'Adm', 'user' => 'User', ], ['prompt' => '']) ?>
    <?= $form->field($model, 'use_telefone')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'use_pass')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
