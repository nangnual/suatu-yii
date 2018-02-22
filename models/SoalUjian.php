<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "soal_ujian".
 *
 * @property int $id
 * @property int $id_ujian
 * @property string $soal
 *
 * @property JawabanPeserta[] $jawabanPesertas
 * @property Ujian $ujian
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
            [['id_ujian'], 'exist', 'skipOnError' => true, 'targetClass' => Ujian::className(), 'targetAttribute' => ['id_ujian' => 'id']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::className(), ['id_soal_ujian' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUjian()
    {
        return $this->hasOne(Ujian::className(), ['id' => 'id_ujian']);
    }
}
