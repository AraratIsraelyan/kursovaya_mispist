<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laptops".
 *
 * @property int $id_laptop
 * @property string $model
 * @property string $specification
 * @property float $price
 *
 * @property Orderproduct[] $orderproducts
 */
class Laptops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laptops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'specification', 'price'], 'required'],
            [['price'], 'number'],
            [['model', 'specification'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_laptop' => 'Код ноутбука',
            'model' => 'Модель',
            'specification' => 'Характеристики',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Orderproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderproducts()
    {
        return $this->hasMany(Orderproduct::className(), ['id_laptop' => 'id_laptop']);
    }
}
