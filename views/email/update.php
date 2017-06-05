<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model evandro\mailmanager\models\Email */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Email',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Emails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="email-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
