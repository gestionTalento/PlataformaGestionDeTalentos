<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<style>

    body {
    /* height: 100%; */
}

    body{
        background-color: rgba(255, 255, 255, 0)!important;
    }
    .btn-primary{
        background-color:#012776;
        border-color:#ffffff;
    }

    .btn-primary:hover,
    .btn-default:hover{
        background-color:#ce3050;
        color:#ffffff;
        border-color:#ffffff;
    }
    form#login-form {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    button.btn.btn-lg.btn-primary.btn-block {
        height: 40px;
    }
    
    html {
        background: url(flesan.jpg) no-repeat bottom right;
        background-size: cover;
    }
    .col-sm-4.col-md-4 {
        height: 100vh;
        background-color: rgb(255, 255, 255);
        display: flex;
        justify-content: center;

    }
    .center{
        margin-top: 30%;
    }
    h4 {
        line-height: 0.35em;
    }
    img {
    max-width: 76%;
    margin-left: 15%;
    
}
     }
     label.control-label {
    color: #000000;
}
</style>



<div  class="col-sm-4 col-md-4">
    <div class="center">
        <!-- <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>-->            
        <div class="account-wall">


            <?=
            Html::img('logo.png', $options = [
                'class' => 'jp',
            ]);
            ?></div>
        <h4 style="    margin-left: 60px;">Recuperar contraseña</h4>
              <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'correo')->textInput() ?>
                    </div>
                                    <?= Yii::$app->session->getFlash('error'); ?>

                    
                </div>
                <p>Su contraseña sera enviada a su correo</p>
                <div class="form-group">
                    <?= Html::submitButton('Recuperar', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button', 'required' => true]) ?>
                    <br>
                              <?= Html::a('Volver', ['login'], ['class' => '']) ?>   

                </div>

            <?php ActiveForm::end(); ?>     












        </b>
    </div>
</div>





