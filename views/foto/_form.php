<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Foto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="foto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'produto_id')->hiddenInput(['value'=> $this->context->idProduto])->label(false) ?>

    <?= $form->field($model, 'capa')->checkbox() ?>

    <?= $form->field($model, 'path')->fileInput(['multiple' => false, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
