<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProductEquipment[] $productEquipments
 * @property ProductMedia[] $productMedia
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ProductEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductEquipments()
    {
        return $this->hasMany(ProductEquipment::class, ['product_id' => 'id']);
    }

    public function getFicProducts()
    {
        return $this->hasMany(FicProduct::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductMedias()
    {
        return $this->hasMany(ProductMedia::class, ['product_id' => 'id']);
    }

    public function getMedias()
    {
        return $this->hasMany(Metadata::class, ['id' => 'media_id'])->via('productMedias');
    }

    public static function getProducts()
    {
        return self::find()->all();
    }
}
