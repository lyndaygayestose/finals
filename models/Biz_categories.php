<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biz_categories".
 *
 * @property int $id
 * @property int $business_id
 * @property int $category_id
 *
 * @property Businesses $business
 * @property Categories $category
 */
class Biz_categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biz_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id', 'category_id'], 'required'],
            [['business_id', 'category_id'], 'integer'],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Businesses::className(), 'targetAttribute' => ['business_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'business_id' => 'Business ID',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinesses()
    {
        return $this->hasOne(Businesses::className(), ['id' => 'business_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiz_categories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
