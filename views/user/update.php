<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Projects */

$this->title = Yii::t('app', 'Update User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php $opts = [
        'heading' => Html::encode($this->title),
        'body' => $this->render('_form_user', [
            'model' => $model,
        ]),
    ];
    echo Html::panel($opts); ?>

</div>
