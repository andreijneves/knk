<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('criar  Usuário', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'use_id',
            'use_email:email',
            //se_pass',
            'use_nome',
            'use_tipo',
            'use_telefone',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'use_id' => $model->use_id]);
                 }
            ],
        ],
    ]); ?>


</div>
