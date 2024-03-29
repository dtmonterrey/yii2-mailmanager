<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model dtmonterrey\mailmanager\models\EmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'from') ?>

    <?= $form->field($model, 'to') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'body') ?>
    
    <?= $form->field($model, 'status') ?>
    
    <?= $form->field($model, 'when') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
