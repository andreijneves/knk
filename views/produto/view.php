<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Produto $model */

$this->title = $model->pro_id;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 Html::csrfMetaTags();
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pro_id' => $model->pro_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pro_id' => $model->pro_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pro_id',
            'pro_nome',
            'des',
            'preco',
        ],
    ]); ?>
    <h3>Fotos do produto        
    </h3>
    <div class="container">

    <?php   
        foreach ($model->getFotos() as $foto): ?>
        <div class="foto-item" style="display: inline-block; margin: 10px; text-align: center;">
            <img src="<?= Yii::getAlias('@web') . '/' . $foto->path ?>" alt="Foto do Produto" style="max-width: 150px; max-height: 150px; display: block; margin-bottom: 5px;">
            <?php if ($foto->capa): ?>
                <strong>Capa</strong>
            <?php else: ?>
                <form method="post" action="<?= \yii\helpers\Url::to(['foto/set-capa', 'id' => $foto->fot_id]) ?>">
                    <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
                    <button type="submit" class="btn btn-sm btn-primary">Definir como Capa</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>

</div>
