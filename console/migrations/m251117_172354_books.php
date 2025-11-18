<?php

use yii\db\Migration;
use yii\db\Schema;

class m251117_172354_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m251117_172354_books cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('books', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'body' => Schema::TYPE_TEXT,
        ]);
    }

    /*
    public function down()
    {
        echo "m251117_172354_books cannot be reverted.\n";

        return false;
    }
    */
}
