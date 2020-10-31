<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this  yii\web\View */
/* @var $model mdm\admin\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\BizRule */

$this->title = Yii::t('app', 'Rule List');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

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
            'heading' => '<i class="fa fa-list"></i>  '.$this->title,
            'type' => GridView::TYPE_DEFAULT,
        ],
        'toolbar' =>  [
            [
                'content' =>
                    Html::a('<i class="fa fa-plus"></i>', ['create'], [
                        'data-pjax' => 0,
                        'class' => 'btn btn-success',
                        'title'=>Yii::t('app', 'Create'),
                    ]).
                    Html::a('<i class="fas fa-redo"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title'=>Yii::t('app', 'Reset Grid'),
                    ]),
                'options' => ['class' => 'btn-group mr-2']
            ],
            '{export}',
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => Yii::t('rbac-admin', 'Name'),
            ],
            ['class' => 'kartik\grid\ActionColumn',
                'noWrap' => true
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
