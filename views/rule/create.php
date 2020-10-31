<?php

use kartik\helpers\Html;

/* @var $this  yii\web\View */
/* @var $model mdm\admin\models\BizRule */

$this->title = Yii::t('rbac-admin', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <?php $opts = [
        'heading' => Html::encode($this->title),
        'body' => $this->render('_form', [
            'model' => $model,
        ]),
    ];
    echo Html::panel($opts); ?>

</div>
