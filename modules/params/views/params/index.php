<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $params app\modules\params\models\Param[] */

$this->title = 'Список параметров';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="params-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить параметр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach ($params as $param): ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($param, "[$param->id]value")->label($param->name) ?>
            </div>
            <div class="col-md-3" style="margin-top: 22px;">
                <?= Html::a('Удалить', ['delete', 'id' => $param->id], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
