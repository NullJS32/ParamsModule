<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $param app\modules\params\models\Param */

$this->title = 'Добавить параметр';
$this->params['breadcrumbs'][] = ['label' => 'Список параметров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="params-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($param, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($param, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
