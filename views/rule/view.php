<?php

use kartik\helpers\Html;
use kartik\detail\DetailView;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rule Information'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <p>
        <?= \kartik\helpers\Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]).' '.Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']).' '.Html::a(Yii::t('app', 'Back to List'), ['index'], ['class' => 'btn btn-warning']);

        ?>
    </p>

    <?php $opts = [
        'heading' => Yii::t('app','Rule Information'),
        'body' => DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'className',
            ],
        ]),
    ];
    echo \kartik\helpers\Html::panel($opts); ?>
</div>
