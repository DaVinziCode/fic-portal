<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "metadata".
 *
 * @property int $id
 * @property string $basename
 * @property string $filename
 * @property string $filepath
 * @property string $type
 * @property int $size
 * @property string $extension
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Equipment[] $equipments
 * @property Part[] $parts
 * @property ProductMedia[] $productMedia
 * @property SupplierMedia[] $supplierMedia
 */
class Metadata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metadata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['basename', 'filename', 'filepath', 'type', 'size', 'extension'], 'required'],
            [['size'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['basename', 'filename', 'filepath'], 'string', 'max' => 255],
            [['type', 'extension'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'basename' => 'Basename',
            'filename' => 'Filename',
            'filepath' => 'Filepath',
            'type' => 'Type',
            'size' => 'Size',
            'extension' => 'Extension',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Equipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::class, ['image_id' => 'id']);
    }

    /**
     * Gets query for [[Parts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParts()
    {
        return $this->hasMany(Part::class, ['media_id' => 'id']);
    }

    /**
     * Gets query for [[ProductMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductMedia()
    {
        return $this->hasMany(ProductMedia::class, ['media_id' => 'id']);
    }

    /**
     * Gets query for [[SupplierMedia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierMedia()
    {
        return $this->hasMany(SupplierMedia::class, ['media_id' => 'id']);
    }

    public function getLink()
    {
        return Yii::$app->params['liveServer'] . $this->filepath;
    }
}
