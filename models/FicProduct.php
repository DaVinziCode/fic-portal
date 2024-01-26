<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fic_product".
 *
 * @property int $id
 * @property string|null $global_id
 * @property int $product_id
 * @property int $fic_id
 * @property string $name
 * @property string|null $description
 * @property int|null $local_media_id
 * @property boolean $is_public
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Fic $fic
 * @property Product $product
 */
class FicProduct extends \yii\db\ActiveRecord
{
    public $imageProduct;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fic_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'name'], 'required'],
            [['product_id', 'fic_id', 'local_media_id'], 'integer'],
            [['description'], 'string'],
            [['is_public'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['global_id'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 128],
            [['fic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fic::class, 'targetAttribute' => ['fic_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'global_id' => 'Global ID',
            'product_id' => 'Product Category',
            'fic_id' => 'Fic ID',
            'is_public' => 'Status',
            'name' => 'Product Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Fic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFic()
    {
        return $this->hasOne(Fic::class, ['id' => 'fic_id']);
    }

    // public function getUserProfile()
    // {
    //     return $this->hasOne(UserProfile::class, ['id' => 'fic_id']);
    // }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getProductMedias()
    {
        return $this->hasMany(ProductMedia::class, ['product_id' => 'id'])->via('product');
    }


    public function getMedias()
    {
        return $this->hasMany(Media::class, ['id' => 'media_id'])->via('productMedias');
    }

    public function getLocalMedia()
    {
        return $this->hasOne(LocalMedia::class, ['id' => 'local_media_id']);
    }

    public static function getFicProducts()
    {
        return self::find()->all();
    }
}
