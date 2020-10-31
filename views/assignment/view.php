<?php

use mdm\admin\AnimateAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Assignment */
/* @var $fullnameField string */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = Yii::t('rbac-admin', 'Assignment') . ' : ' . $userName;

$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $model->getItems(),
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="assignment-index">

    <div class="card card-default">
        <div class="card-header">
            <h5><?=$this->title;?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="form-group">
                        <input class="form-control search" data-target="available"
                               placeholder="<?=Yii::t('rbac-admin', 'Search for available');?>">
                        <select multiple size="20" class="form-control list" data-target="available">
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1">
                    <div class="form-group">
                        <br><br>
                        <?=Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => (string) $model->id], [
                            'class' => 'btn btn-success btn-assign',
                            'data-target' => 'available',
                            'title' => Yii::t('rbac-admin', 'Assign'),
                        ]);?><br><br>
                        <?=Html::a('&lt;&lt;' . $animateIcon, ['revoke', 'id' => (string) $model->id], [
                            'class' => 'btn btn-danger btn-assign',
                            'data-target' => 'assigned',
                            'title' => Yii::t('rbac-admin', 'Remove'),
                        ]);?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="form-group">
                        <input class="form-control search" data-target="assigned"
                               placeholder="<?=Yii::t('rbac-admin', 'Search for assigned');?>">
                        <select multiple size="20" class="form-control list" data-target="assigned">
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <?= Html::a(Yii::t('app', 'Back to List'), ['index'], ['class' => 'btn btn-warning']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
