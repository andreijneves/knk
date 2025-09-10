<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property int $id
 * @property int|null $produto_id
 * @property int|null $capa
 * @property string|null $path
 *
 * @property Produto $produto
 */
class Foto extends \yii\db\ActiveRecord
{

   
    public $imageFiles;

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
            [['produto_id', 'capa', 'path'], 'default', 'value' => null],
            [['produto_id', 'capa'], 'integer'],
            [['path'], 'string', 'max' => 100],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['produto_id' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'produto_id' => 'Produto ID',
            'capa' => 'Capa',
            'path' => 'Path',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['ID' => 'produto_id']);
    }


    public function upload($img)
    {        

        $this->path = 'uploads/' . $this->produto_id . '/' . $img->baseName . '.' . $img->extension;
        if (!is_dir('uploads/' . $this->produto_id)) {
            mkdir('uploads/' . $this->produto_id, 0777, true);
        }
        $img->saveAs($this->path);
        $this->save(false);
        return true;
        

    }
}


