<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $model
 * @property int|null $equipment_type_id
 * @property int|null $equipment_category_id
 * @property int $processing_capability_id
 * @property int|null $image_id
 * @property int|null $isDeleted
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ChecklistComponentTemplate[] $checklistComponentTemplates
 * @property EquipmentCategory $equipmentCategory
 * @property EquipmentComponent[] $equipmentComponents
 * @property EquipmentSpec[] $equipmentSpecs
 * @property EquipmentTechService[] $equipmentTechServices
 * @property EquipmentType $equipmentType
 * @property FicEquipment[] $ficEquipments
 * @property FicTechService[] $ficTechServices
 * @property Metadata $image
 * @property MaintenanceChecklistItemTemplate[] $maintenanceChecklistItemTemplates
 * @property MaintenanceChecklistTemplate[] $maintenanceChecklistTemplates
 * @property ProcessingCapability $processingCapability
 * @property ProductEquipment[] $productEquipments
 * @property TechService[] $techServices
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'processing_capability_id'], 'required'],
            [['equipment_type_id', 'equipment_category_id', 'processing_capability_id', 'image_id', 'isDeleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['model'], 'string', 'max' => 200],
            [['model'], 'unique'],
            [['equipment_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentCategory::class, 'targetAttribute' => ['equipment_category_id' => 'id']],
            [['equipment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentType::class, 'targetAttribute' => ['equipment_type_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Metadata::class, 'targetAttribute' => ['image_id' => 'id']],
            [['processing_capability_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProcessingCapability::class, 'targetAttribute' => ['processing_capability_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'equipment_type_id' => 'Equipment Type ID',
            'equipment_category_id' => 'Equipment Category ID',
            'processing_capability_id' => 'Processing Capability ID',
            'image_id' => 'Image ID',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[ChecklistComponentTemplates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChecklistComponentTemplates()
    {
        return $this->hasMany(ChecklistComponentTemplate::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[EquipmentCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentCategory()
    {
        return $this->hasOne(EquipmentCategory::class, ['id' => 'equipment_category_id']);
    }

    /**
     * Gets query for [[EquipmentComponents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentComponents()
    {
        return $this->hasMany(EquipmentComponent::class, ['equipment_id' => 'id']);
    }

    public function getComponents()
    {
        return $this->hasMany(Component::class, ['id' => 'component_id'])->via('equipmentComponents');
    }

    public function getEquipmentComponentParts()
    {
        return $this->hasMany(EquipmentComponentPart::class, ['equipment_component_id' => 'id'])->via('equipmentComponents');
    }

    /**
     * Gets query for [[EquipmentSpecs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentSpecs()
    {
        return $this->hasMany(EquipmentSpec::class, ['equipment_id' => 'id']);
    }
    public function getTechnologyServices()
    {
        return $this->hasMany(TechService::class, ['id' => 'tech_service_id'])->via('equipmentTechServices');
    }

    /**
     * Gets query for [[EquipmentTechServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentTechServices()
    {
        return $this->hasMany(EquipmentTechService::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[EquipmentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentType()
    {
        return $this->hasOne(EquipmentType::class, ['id' => 'equipment_type_id']);
    }

    /**
     * Gets query for [[FicEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicEquipments()
    {
        return $this->hasMany(FicEquipment::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[FicTechServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicTechServices()
    {
        return $this->hasMany(FicTechService::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[Image]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Metadata::class, ['id' => 'image_id']);
    }

    /**
     * Gets query for [[MaintenanceChecklistItemTemplates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenanceChecklistItemTemplates()
    {
        return $this->hasMany(MaintenanceChecklistItemTemplate::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[MaintenanceChecklistTemplates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenanceChecklistTemplates()
    {
        return $this->hasMany(MaintenanceChecklistTemplate::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[ProcessingCapability]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcessingCapability()
    {
        return $this->hasOne(ProcessingCapability::class, ['id' => 'processing_capability_id']);
    }

    /**
     * Gets query for [[ProductEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductEquipments()
    {
        return $this->hasMany(ProductEquipment::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[TechServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTechServices()
    {
        return $this->hasMany(TechService::class, ['id' => 'tech_service_id'])->viaTable('equipment_tech_service', ['equipment_id' => 'id']);
    }

    public static function getEquipments()
    {
        return self::find()->all();
    }
}
