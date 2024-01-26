<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inquiry".
 *
 * @property int $id
 * @property int|null $fic_id
 * @property string $subject
 * @property string $name
 * @property string $email
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Fic $fic
 */
class Inquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fic_id'], 'integer'],
            [['subject', 'name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['subject', 'name'], 'string', 'max' => 128],
            [['email'], 'string', 'max' => 255],
            [['fic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fic::class, 'targetAttribute' => ['fic_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fic_id' => 'Fic ID',
            'subject' => '',
            'name' => '',
            'email' => '',
            'message' => '',
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
}
