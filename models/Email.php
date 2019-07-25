<?php

namespace evandro\mailmanager\models;

use Yii;

/**
 * This is the model class for table "mm_email".
 *
 * @property integer $id
 * @property string $from
 * @property string $to
 * @property string $subject
 * @property string $body
 * @property string $status
 */
class Email extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 'draft';
    const STATUS_PENDING = 'pending';
    const STATUS_SENDT = 'sendt';
    const STATUS_FAILED = 'failed';
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mm_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to', 'subject', 'body'], 'required'],
            [['body'], 'string'],
            [['when'], 'safe'],
            [['from', 'to', 'subject', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from' => Yii::t('app', 'From'),
            'to' => Yii::t('app', 'To'),
            'subject' => Yii::t('app', 'Subject'),
            'body' => Yii::t('app', 'Body'),
            'status' => Yii::t('app', 'Status'),
            'when' => Yii::t('app', 'When'),
        ];
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \yii\db\BaseActiveRecord::beforeSave()
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        
        if (!isset($this->status)) {
            $this->status = static::STATUS_PENDING;
        }
        return true;
    }
}
