<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use mdm\admin\components\Helper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'pager' => [
            'firstPageLabel' => 'First',
            'lastPageLabel'  => 'Last',
            'maxButtonCount' => 3,
        ],
        'responsiveWrap' => false,
        'hover' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'panel' => [
            'heading' => '<i class="fa fa-list"></i>  '.Yii::t('app','User List'),
            'type' => GridView::TYPE_DEFAULT,
        ],
        'toolbar' =>  [
            [
                'content' =>
                    (Helper::checkRoute('/admin/user/create')) ?
                        Html::a('<i class="fa fa-plus"></i>', ['create'], [
                            'data-pjax' => 0,
                            'class' => 'btn btn-success',
                            'title'=>Yii::t('app', 'Create User'),
                        ]) . ' '.
                        Html::a('<i class="fas fa-redo"></i>', ['index'], [
                            'class' => 'btn btn-outline-secondary',
                            'title'=>Yii::t('app', 'Reset Grid'),
                        ]) : Html::a('<i class="fas fa-redo"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title'=>Yii::t('app', 'Reset Grid'),
                    ]),
                'options' => ['class' => 'btn-group mr-2']
            ],
            '{export}',
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return $model->status == 0 ? 'Inactive' : 'Active';
                },
                'filter' => [
                    0 => 'Inactive',
                    10 => 'Active'
                ]
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'activate', 'delete']),
                'buttons' => [
                    'activate' => function($url, $model) {
                        if ($model->status == 10) {
                            return '';
                        }
                        $options = [
                            'title' => Yii::t('rbac-admin', 'Activate'),
                            'aria-label' => Yii::t('rbac-admin', 'Activate'),
                            'data-confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="fas fa-check"></span>', $url, $options);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
