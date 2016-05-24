<?php

namespace farukkkaradeniz\kalorimetre\models;

use Yii;

/**
 * This is the model class for table "yemekler".
 *
 * @property integer $id
 * @property string $yemekName
 * @property integer $kalori
 * @property string $ogunid
 */
class Yemekler extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yemekler';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['yemekName', 'kalori', 'ogunid'], 'required'],
            [['kalori'], 'integer'],
            [['yemekName'], 'string', 'max' => 30],
            [['ogunid'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'yemekName' => 'Yemek Name',
            'kalori' => 'Kalori',
            'ogunid' => 'Ogunid',
        ];
    }
}
