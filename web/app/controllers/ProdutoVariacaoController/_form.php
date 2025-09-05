<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProdutoVariacao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produto-variacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'produto_id')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco_adicional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'criado_em')->textInput() ?>

    <?= $form->field($model, 'atualizado_em')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
