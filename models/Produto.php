<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $pro_id
 * @property string $pro_nome
 * @property string $des
 * @property float $preco
 *
 * @property Foto[] $fotos
 * @property Pedido[] $pedidos
 */
class Produto extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preco'], 'default', 'value' => 0.00],
            [['pro_nome', 'des'], 'required'],
            [['preco'], 'number'],
            [['pro_nome'], 'string', 'max' => 100],
            [['des'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'pro_nome' => 'Pro Nome',
            'des' => 'descrição',
            'preco' => 'preço',
        ];
    }

    /**
     * Gets query for [[Fotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Foto::class, ['prod_id' => 'pro_id']);
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::class, ['prod_id' => 'pro_id']);
    }

}
