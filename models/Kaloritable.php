<?php

namespace farukkkaradeniz\kalorimetre\models;

use Yii;

/**
 * This is the model class for table "kaloritable".
 *
 * @property integer $id
 * @property string $userid
 * @property string $YemekName
 * @property string $meal
 * @property string $Tarih
 * @property integer $kalori
 */
class Kaloritable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kaloritable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'YemekName', 'meal'], 'required'],
            [['Tarih'], 'safe'],
            [['kalori'], 'integer'],
            [['userid'], 'string', 'max' => 255],
            [['YemekName'], 'string', 'max' => 30],
            [['meal'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'YemekName' => 'Yemek Name',
            'meal' => 'Meal',
            'Tarih' => 'Tarih',
            'kalori' => 'Kalori',
        ];
    }
}
