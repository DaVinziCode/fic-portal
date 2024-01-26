<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tech_service".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Equipment[] $equipment
 * @property EquipmentTechService[] $equipmentTechServices
 * @property FicTechService[] $ficTechServices
 */
class TechService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tech_service';
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
            [['name'], 'unique'],
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
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasMany(Equipment::class, ['id' => 'equipment_id'])->viaTable('equipment_tech_service', ['tech_service_id' => 'id']);
    }

    /**
     * Gets query for [[EquipmentTechServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentTechServices()
    {
        return $this->hasMany(EquipmentTechService::class, ['tech_service_id' => 'id']);
    }

    /**
     * Gets query for [[FicTechServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicTechServices()
    {
        return $this->hasMany(FicTechService::class, ['tech_service_id' => 'id']);
    }

    public static function getServices()
    {
        return self::find()->all();
    }
}
