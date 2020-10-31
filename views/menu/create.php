<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\Menu */

$this->title = Yii::t('rbac-admin', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?php $opts = [
        'heading' => Html::encode($this->title),
        'body' => $this->render('_form', [
            'model' => $model,
        ]),
    ];
    echo Html::panel($opts); ?>

</div>
