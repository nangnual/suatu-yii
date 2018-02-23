<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ujian".
 *
 * @property int $id
 * @property string $nama_test
 * @property string $waktu_test
 * @property int $durasi_test
 *
 * @property PesertaTest[] $pesertaTests
 * @property SoalUjian[] $soalUjians
 */
class Ujian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ujian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu_test'], 'safe'],
            [['durasi_test'], 'integer'],
            [['nama_test'], 'string', 'max' => 255],
            [['instruksi'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_test' => 'Nama Test',
            'waktu_test' => 'Waktu Test',
            'durasi_test' => 'Durasi Test',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaTests()
    {
        return $this->hasMany(PesertaTest::className(), ['id_ujian' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoalUjians()
    {
        return $this->hasMany(SoalUjian::className(), ['id_ujian' => 'id']);
    }
}
