<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fic".
 *
 * @property int $id
 * @property string $name
 * @property int|null $municipality_city_id
 * @property string|null $suc
 * @property string|null $address
 * @property float|null $longitude
 * @property float|null $latitude
 * @property string|null $contact_person
 * @property string|null $email
 * @property string|null $contact_number
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Facility[] $facilities
 * @property FicEquipment[] $ficEquipments
 * @property FicFacility[] $ficFacilities
 * @property FicPersonnel[] $ficPersonnels
 * @property FicService[] $ficServices
 * @property FicSns[] $ficSns
 * @property FicTechService[] $ficTechServices
 * @property JobOrderRequest[] $jobOrderRequests
 * @property MunicipalityCity $municipalityCity
 * @property Service[] $services
 * @property SupplierRating[] $supplierRatings
 * @property UserProfile[] $userProfiles
 * @property UserProfile[] $userProfiles0
 */
class Fic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['municipality_city_id'], 'integer'],
            [['longitude', 'latitude'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 150],
            [['suc'], 'string', 'max' => 255],
            [['contact_person', 'email'], 'string', 'max' => 128],
            [['contact_number'], 'string', 'max' => 32],
            [['name'], 'unique'],
            [['municipality_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => MunicipalityCity::class, 'targetAttribute' => ['municipality_city_id' => 'id']],
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
            'municipality_city_id' => 'Municipality City ID',
            'suc' => 'Suc',
            'address' => 'Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'contact_person' => 'Contact Person',
            'email' => 'Email',
            'contact_number' => 'Contact Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Facilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::class, ['id' => 'facility_id'])->viaTable('fic_facility', ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[FicEquipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicEquipments()
    {
        return $this->hasMany(FicEquipment::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[FicFacilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicFacilities()
    {
        return $this->hasMany(FicFacility::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[FicPersonnels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicPersonnels()
    {
        return $this->hasMany(FicPersonnel::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[FicServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicServices()
    {
        return $this->hasMany(FicService::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[FicSns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicSns()
    {
        return $this->hasMany(FicSns::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[FicTechServices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFicTechServices()
    {
        return $this->hasMany(FicTechService::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[JobOrderRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobOrderRequests()
    {
        return $this->hasMany(JobOrderRequest::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[MunicipalityCity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipalityCity()
    {
        return $this->hasOne(MunicipalityCity::class, ['id' => 'municipality_city_id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::class, ['id' => 'service_id'])->viaTable('fic_service', ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[SupplierRatings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierRatings()
    {
        return $this->hasMany(SupplierRating::class, ['fic_id' => 'id']);
    }

    /**
     * Gets query for [[UserProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfile::class, ['fic_affiliation' => 'id']);
    }

    /**
     * Gets query for [[UserProfiles0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles0()
    {
        return $this->hasMany(UserProfile::class, ['id' => 'user_profile_id'])->viaTable('fic_personnel', ['fic_id' => 'id']);
    }
    public static function getFics()
    {
        return self::find()->all();
    }
}
