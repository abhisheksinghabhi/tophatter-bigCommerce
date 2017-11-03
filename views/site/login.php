<style>
.text-align-left-class{
	text-align:left !important;
}
.text-validator{
	margin-top:0px !important;
}
</style>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    
    <p>Install this app in a shop to get access to its private admin data.</p> 
	<p style="padding-bottom: 1em;">
        <span class="hint">Please install your shop url to integrate your shop with jet.com</span><br>
        <span class="hint">If you haven't purchased the plan Purchase it from <a href="http://cedcommerce.com/shopify-extensions/jet-shopify-integration" target=_blank> here </a></span>
        
    </p> 
   
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label text-align-left-class'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder'=>'example.myshopify.com'])->label('Shop Url') ?>
        <span class="text-validator">Shop url must be similar as "example.myshopify.com"</span>
         <?= Html::submitButton('Install', ['class' => 'btn btn-primary button-inline', 'name' => 'login-button']) ?>
        
		
		
		
        

    <?php ActiveForm::end(); ?>
</div>
