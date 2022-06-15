<?php

namespace dtmonterrey\mailmanager;

class Mailer extends \yii\swiftmailer\Mailer
{
    public $messageClass = 'dtmonterrey\mailmanager\Message';
    
    public function init() {
        parent::init();
    }
}