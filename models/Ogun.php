<?php

namespace farukkkaradeniz\kalorimetre\models;

use Yii;

/**
 * This is the model class for table "ogun".
 *
 * @property integer $id
 * @property string $Name
 */
class Ogun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ogun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
        ];
    }
}
