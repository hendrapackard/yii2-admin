<?php

use mdm\admin\AnimateAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $routes [] */

$this->title = Yii::t('rbac-admin', 'Route');
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'routes' => $routes,
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="card card-default">
    <div class="card-header">
        <h5><?=$this->title;?></h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11">
                <div class="input-group">
                    <input id="inp-route" type="text" class="form-control"
                           placeholder="<?=Yii::t('rbac-admin', 'New route(s)');?>">
                    <span class="input-group-btn">
                <?=Html::a(Yii::t('rbac-admin', 'Add') . $animateIcon, ['create'], [
                    'class' => 'btn btn-success',
                    'id' => 'btn-new',
                ]);?>
            </span>
                </div>
                <!-- /.form-group -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <div class="input-group">
                    <input class="form-control search" data-target="available"
                           placeholder="<?=Yii::t('rbac-admin', 'Search for available');?>">
                    <span class="input-group-btn">
                <?=Html::a('<i class="fas fa-sync"></i>', ['refresh'], [
                    'class' => 'btn btn-default',
                    'id' => 'btn-refresh',
                ]);?>
            </span>
                </div>
                <select multiple size="20" class="form-control list" data-target="available"></select>
                <!-- /.form-group -->
            </div>
            <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                <div class="form-group">
                    <br><br>
                    <?=Html::a('&gt;&gt;' . $animateIcon, ['assign'], [
                        'class' => 'btn btn-success btn-assign',
                        'data-target' => 'available',
                        'title' => Yii::t('rbac-admin', 'Assign'),
                    ]);?><br><br>
                    <?=Html::a('&lt;&lt;' . $animateIcon, ['remove'], [
                        'class' => 'btn btn-danger btn-assign',
                        'data-target' => 'assigned',
                        'title' => Yii::t('rbac-admin', 'Remove'),
                    ]);?>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <input class="form-control search" data-target="assigned"
                       placeholder="<?=Yii::t('rbac-admin', 'Search for assigned');?>">
                <select multiple size="20" class="form-control list" data-target="assigned"></select>
                <!-- /.form-group -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
</div>
