<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peserta_test".
 *
 * @property int $id
 * @property int $id_user
 * @property string $nama
 * @property string $email
 * @property string $password
 * @property int $id_ujian
 *
 * @property JawabanPeserta[] $jawabanPesertas
 * @property Ujian $ujian
 * @property User $user
 */
class PesertaTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peserta_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'email', 'password', 'id_ujian'], 'required'],
            [['id_user', 'id_ujian'], 'integer'],
            [[ 'email', 'password'], 'string', 'max' => 255],
            [['id_ujian'], 'exist', 'skipOnError' => true, 'targetClass' => Ujian::className(), 'targetAttribute' => ['id_ujian' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'id_ujian' => 'Id Ujian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::className(), ['id_peserta_test' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUjian()
    {
        return $this->hasOne(Ujian::className(), ['id' => 'id_ujian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
