<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180220_115427_new_ujian_table
 */
class m180220_115427_new_ujian_table extends Migration
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
        echo "m180220_115427_new_ujian_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('ujian', [
            'id' => Schema::TYPE_PK,
            'nama_test' => Schema::TYPE_STRING,
            'waktu_test' => Schema::TYPE_DATETIME,
            'durasi_test' => Schema::TYPE_INTEGER
        ]);
    }

    public function down()
    {
        echo "m180220_115427_new_ujian_table cannot be reverted.\n";

        return false;
    }

}
