<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\Foto;

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

public $fotos; // For handling multiple file uploads
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

        return Foto::find()->where(['prod_id' => $this->pro_id])->all();
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
   
    public function upload()
    {
       
       
        if ($this->validate()) {
            ////die('validation passed1');
            $files = glob('uploads/' . $this->pro_id . '_*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }

            //die('validation passed2');
            Foto::deleteAll(['prod_id' => $this->pro_id]); // Delete existing photos for the product
            foreach ($this->fotos as $file) {
                $filePath = 'uploads/' . $this->pro_id . '_' . $file->baseName . '.' . $file->extension;
                if ($file->saveAs($filePath)) {
                    // Save file information to the Foto model
                    $fotoModel = new Foto();
                    $fotoModel->prod_id = $this->pro_id;
                    $fotoModel->path = $filePath;
                    $fotoModel->capa= 0; // Default to not cover
                    $fotoModel->save();
                }
            }
          
        } else {
            die('validation failed');
        }
    }
    




}
