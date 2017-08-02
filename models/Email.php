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
        ];
    }
    
    /**
     * Sends this email and saves it to the database
     */
    public function send()
    {
        // set status to Email::STATUS_PENDING
        $this->status = self::STATUS_PENDING;
        $this->save();

        // try send the email
        $result = Yii::$app->mailer->compose()
            ->setFrom($this->from)
            ->setTo($this->to)
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
        
        if ($result) {
            $this->status = self::STATUS_SENDT;
            // TODO add date time and who sendt the email
        } else {
            $this->status = self::STATUS_FAILED;
            // TODO add date time and who sendt the email
        }
        $this->save();
    }
}
