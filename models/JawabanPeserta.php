<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jawaban_peserta".
 *
 * @property int $id
 * @property int $id_soal_ujian
 * @property string $jawaban
 * @property int $id_peserta_test
 *
 * @property PesertaTest $pesertaTest
 * @property SoalUjian $soalUjian
 */
class JawabanPeserta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jawaban_peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_soal_ujian', 'jawaban', 'id_peserta_test'], 'required'],
            [['id_soal_ujian', 'id_peserta_test'], 'integer'],
            [['jawaban'], 'string'],
            [['id_peserta_test'], 'exist', 'skipOnError' => true, 'targetClass' => PesertaTest::className(), 'targetAttribute' => ['id_peserta_test' => 'id']],
            [['id_soal_ujian'], 'exist', 'skipOnError' => true, 'targetClass' => SoalUjian::className(), 'targetAttribute' => ['id_soal_ujian' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_soal_ujian' => 'Id Soal Ujian',
            'jawaban' => 'Jawaban',
            'id_peserta_test' => 'Id Peserta Test',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaTest()
    {
        return $this->hasOne(PesertaTest::className(), ['id' => 'id_peserta_test']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoalUjian()
    {
        return $this->hasOne(SoalUjian::className(), ['id' => 'id_soal_ujian']);
    }
}
