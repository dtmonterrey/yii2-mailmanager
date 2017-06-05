<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model evandro\mailmanager\models\Email */

$this->title = Yii::t('app', 'Create Email');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Emails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
