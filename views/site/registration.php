<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegistrationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
?>
<div class="site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'registration-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<span class='success'>&#10004;</span><span class='fail'>&nbsp;!</span><div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-6\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
        ],
        'enableClientValidation' => true,
        //'enableAjaxValidation' => true,
        'validateOnType' => true,
    ]); ?>

        <?= $form->field($model, 'nickname', ['enableAjaxValidation' => true])->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'first_name')->textInput() ?>

        <?= $form->field($model, 'last_name')->textInput() ?>

        <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <div class="col-lg-offset-5 col-lg-7">
                <?= Html::submitButton('Готово', ['class' => 'btn btn-primary', 'id' => 'register-button', 'disabled' => 'disabled']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
    <script>
        window.onload = function() {
            var form = $('#registration-form');
            //form.yiiActiveForm('validate', true);
            form.validations = [];
            form.on('afterValidateAttribute', function (event, attribute, messages) {
                var valid = false;
                if (messages[0] == undefined) valid = true;
                form.validations[attribute.id] = valid;
                //console.log(messages);
                var hasError = false;
                var fields = $('#registration-form').yiiActiveForm('data').attributes;
                fields.forEach(function(element) {
                    if (form.validations[element.id] != true) hasError = true;
                });
                if (hasError) {
                    $('#register-button').attr("disabled", "disabled");
                } else {
                    $('#register-button').removeAttr("disabled");
                }
            });
        }
    </script>
</div>
