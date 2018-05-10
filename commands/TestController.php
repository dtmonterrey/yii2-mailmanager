<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use evandro\mailmanager\Mailer;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TestController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        $mailer = new Mailer();
        $messageClass = $mailer->compose()->className();
        print "sending email via $messageClass... ";
        $result = $mailer->compose()
            ->setFrom(['cti@ipb.pt' => 'Centro de Tecnologias de Informação'])
            ->setTo(['evandro@ipb.pt' => 'Evandro Pires Alves', 'evandro.pa@gmail.com' => 'Evandro Pires Alves'])
            ->setSubject('Teste custom mailer')
            ->setTextBody('Email send using custom mailer implementation')
            ->send();
        if ($result) {
            print "sendt!\n";
        } else {
            print "NOT SENDT!!!\n";
        }
    }
}
