<?php

namespace evandro\mailmanager\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{

    /**
     * Redirect do the email controller
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        $modules = $this->getModules();
        $moduleId = end($modules)->id;
        return $this->redirect(["/$moduleId/email"]);
    }
}
