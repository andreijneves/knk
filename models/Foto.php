<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property int $fot_id
 * @property string $path
 * @property int $capa
 * @property int $prod_id
 *
 * @property Produto $prod
 */
class Foto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'capa', 'prod_id'], 'required'],
            [['capa', 'prod_id'], 'integer'],
            [['path'], 'string', 'max' => 100],
            [['prod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['prod_id' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fot_id' => 'Fot ID',
            'path' => 'Path',
            'capa' => 'Capa',
            'prod_id' => 'Prod ID',
        ];
    }

    /**
     * Gets query for [[Prod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Produto::class, ['pro_id' => 'prod_id']);
    }

}
