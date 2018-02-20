<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180220_105232_add_user_table
 */
class m180220_105232_add_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180220_105232_add_user_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'email' => Schema::TYPE_STRING,
            'password' => Schema::TYPE_STRING
        ]);
    }

    public function down()
    {
        echo "m180220_105232_add_user_table cannot be reverted.\n";

        return false;
    }
}
