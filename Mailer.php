<?php

namespace dtmonterrey\mailmanager;

class Mailer extends \yii\swiftmailer\Mailer
{
    public $messageClass = 'evandro\mailmanager\Message';
    
    public function init() {
        parent::init();
    }
}