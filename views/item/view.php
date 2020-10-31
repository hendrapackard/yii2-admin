<?php

use mdm\admin\AnimateAsset;
use kartik\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Item']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $model->getItems(),
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="auth-item-view">
    <p>
        <?=Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']);?>
        <?=Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]);?>
        <?=Html::a(Yii::t('rbac-admin', 'Create'), ['create'], ['class' => 'btn btn-success']);?>
        <?=Html::a(Yii::t('app', 'Back to List'), ['index'], ['class' => 'btn btn-warning']);?>
    </p>
    <div class="row">
        <div class="col-11">
            <?php $opts = [
                'heading' => Yii::t('app',$labels['Item']." Information"),
                'body' => DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name',
                        'description:ntext',
                        'ruleName',
                        'data:ntext',
                    ],
                ]),
            ];
            echo Html::panel($opts); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-11">
            <div class="card card-default">
                <div class="card-header">
                    <h5><?=$this->title;?></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group">
                                <input class="form-control search" data-target="available"
                                       placeholder="<?=Yii::t('rbac-admin', 'Search for available');?>">
                                <select multiple size="20" class="form-control list" data-target="available"></select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                            <div class="form-group">
                                <br><br>
                                <?=Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->name], [
                                    'class' => 'btn btn-success btn-assign',
                                    'data-target' => 'available',
                                    'title' => Yii::t('rbac-admin', 'Assign'),
                                ]);?><br><br>
                                <?=Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->name], [
                                    'class' => 'btn btn-danger btn-assign',
                                    'data-target' => 'assigned',
                                    'title' => Yii::t('rbac-admin', 'Remove'),
                                ]);?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <div class="form-group">
                                <input class="form-control search" data-target="assigned"
                                       placeholder="<?=Yii::t('rbac-admin', 'Search for assigned');?>">
                                <select multiple size="20" class="form-control list" data-target="assigned"></select>
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
    </div>
</div>