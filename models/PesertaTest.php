<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peserta_test".
 *
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property string $password
 * @property int $id_ujian
 */
class PesertaTest extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['nama', 'email', 'password', 'id_ujian'], 'required'],
            [['id_ujian'], 'integer'],
            [['nama', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'id_ujian' => 'Id Ujian',
        ];
    }
}
