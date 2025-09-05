<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%produto}}`.
 */
class m250905_183019_create_produto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%produto}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%produto}}');
    }
}
