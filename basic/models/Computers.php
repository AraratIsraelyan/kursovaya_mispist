<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "computers".
 *
 * @property int $id_computer
 * @property string $model
 * @property string $specification
 * @property float $price
 *
 * @property Orderproduct[] $orderproducts
 */
class Computers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'computers';
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
            'id_computer' => 'Код компьютера',
            'model' => 'Модель',
            'specification' => 'Характеристики',
            'price' => 'Цена',
        ];
    }

    /**
     * Gets query for [[Orderproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderproducts()
    {
        return $this->hasMany(Orderproduct::className(), ['id_computer' => 'id_computer']);
    }
}
