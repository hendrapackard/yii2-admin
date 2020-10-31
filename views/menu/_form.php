<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use mdm\admin\models\Menu;
use yii\helpers\Json;
use mdm\admin\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
        'menus' => Menu::getMenuSource(),
        'routes' => Menu::getSavedRoutes(),
    ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>

    <div class="row m-3">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <?= $form->field($model, 'order')->input('number') ?>
        </div>
    </div>
    <div class="row m-3">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <?= $form->field($model, 'data')->textInput(['maxlength' => 255]) ?>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Back to List'), ['index'], ['class' => 'btn btn-warning']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
