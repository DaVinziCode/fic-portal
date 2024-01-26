<?php

namespace app\models\requesttransactions;

use linslin\yii2\curl\curl;
use yii\helpers\Json;
use Yii;

/**
 * This is the model class for table "sample_type".
 *
 * @property int $id
 * @property int $sample_type_id
 * @property int $lab_id
 * @property int $sub_lab_id
 */
class Sample extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sample';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dost_ilab_local_portal');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['analyte', 'method', 'fee'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'analyte' => 'Analyte',
            'method' => 'Method',
            'fee' => 'Fee',
        ];
    }

    // public static function getSubCatList($cat_id)
    // {
    //     $subCategories = self::find()
    //         ->where(['lab_id' => $cat_id])
    //         ->all();
    //     return $subCategories;
    // }
}
