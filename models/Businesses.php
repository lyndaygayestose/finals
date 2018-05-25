<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "businesses".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $telephone
 *
 * @property BizCategories[] $bizCategories
 */
class Businesses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'businesses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'city', 'telephone'], 'required'],
            [['name', 'city'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 50],
            [['telephone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'city' => 'City',
            'telephone' => 'Telephone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBizCategories()
    {
        return $this->hasMany(BizCategories::className(), ['business_id' => 'id']);
    }
}
