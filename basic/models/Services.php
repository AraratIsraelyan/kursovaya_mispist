<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id_services
 * @property int $id_employeer
 * @property string $name
 * @property string $description
 * @property float $price
 *
 * @property Orderproduct[] $orderproducts
 * @property Employers $employeer
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_employeer', 'name', 'description', 'price'], 'required'],
            [['id_employeer'], 'integer'],
            [['price'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
            [['id_employeer'], 'exist', 'skipOnError' => true, 'targetClass' => Employers::className(), 'targetAttribute' => ['id_employeer' => 'id_employeer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_services' => 'Id Services',
            'id_employeer' => 'Id Employeer',
            'name' => 'Name',
            'description' => 'Description',
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
        return $this->hasMany(Orderproduct::className(), ['id_services' => 'id_services']);
    }

    /**
     * Gets query for [[Employeer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeer()
    {
        return $this->hasOne(Employers::className(), ['id_employeer' => 'id_employeer']);
    }
}
