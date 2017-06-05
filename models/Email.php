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
 */
class Email extends \yii\db\ActiveRecord
{
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
            [['from', 'to', 'subject'], 'string', 'max' => 255],
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
        ];
    }
}
