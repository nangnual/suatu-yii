<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "soal_ujian".
 *
 * @property int $id
 * @property int $id_ujian
 * @property string $soal
 */
class SoalUjian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'soal_ujian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ujian', 'soal'], 'required'],
            [['id_ujian'], 'integer'],
            [['soal'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ujian' => 'Id Ujian',
            'soal' => 'Soal',
        ];
    }
}
