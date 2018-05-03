<?php

namespace evandro\mailmanager;

use evandro\mailmanager\models\Email;
use Yii;
use yii\helpers\VarDumper;
use yii\mail\MailerInterface;

class Message extends \yii\swiftmailer\Message
{
    /**
     * Sends this email message.
     * @param MailerInterface $mailer the mailer that should be used to send this message.
     * If no mailer is given it will first check if [[mailer]] is set and if not,
     * the "mail" application component will be used instead.
     * @return bool whether this message is sent successfully.
     */
    public function send(MailerInterface $mailer = null)
    {   
        // create email model object
        $email = new Email();
        // format FROM for storing in db
        if (is_array($this->getFrom())) {
            foreach ($this->getFrom() as $from_email => $from_name) {
                if ($from_name != null) {
                    $email->from .= $from_name . ' <' . $from_email . '>; ';
                } else {
                    $email->from .= $from_email . '; ';
                }
            }
            $email->from = rtrim($email->from, '; ');
        } else {
            $email->from = $this->getFrom();
        }
        // format TO for storing in db
        if (is_array($this->getTo())) {
            foreach ($this->getTo() as $to_email => $to_name) {
                if ($to_name != null) {
                    $email->to .= $to_name . ' <' . $to_email . '>; ';
                } else {
                    $email->to .= $to_email . '; ';
                }
            }
            $email->to = rtrim($email->to, '; ');
        } else {
            $email->to = $this->getTo();
        }
        $email->subject = $this->getSubject();
        $email->body = $this->toString();
        
        // set status to Email::STATUS_PENDING and save
        $email->status = Email::STATUS_PENDING;
        if (!$email->save()) {
            $error = ''.VarDumper::dump($this->getFrom());
            foreach ($email->getErrors() as $attribute => $message) {
                $error .= $attribute . '=>' . implode(';', $message);
            }
            throw new \Exception($error);
        }
        // try sending the email
        $result = $this->_send($mailer);
        
        if ($result) {
            $email->status = Email::STATUS_SENDT;
            // TODO add date time and who sendt the email
        } else {
            $email->status = Email::STATUS_FAILED;
            // TODO add date time and who sendt the email
        }
        $email->save();
        return $result;
    }
    
    private function _send(MailerInterface $mailer = null)
    {
        if ($mailer === null && $this->mailer === null) {
            $mailer = Yii::$app->getMailer();
        } elseif ($mailer === null) {
            $mailer = $this->mailer;
        }
        return $mailer->send($this);
    }
}