<?php
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\WalmartDataValidation;

$this->title = 'Validate Product(s)';
$this->params['breadcrumbs'][] = $this->title;
$merchant_id=Yii::$app->user->identity->id;
$urlManageProduct = \yii\helpers\Url::toRoute(['walmartproduct/index']);
$validation = new WalmartDataValidation;
?>
<?php //echo "<pre>"; print_r($data);echo "</pre>";die('hh');?>
  
<div class="jet-product-index content-section">
  <div class="form new-section">
    <div class="jet-pages-heading ">
  		<div class="title-need-help">
    		<h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
    		<!--<a class="help_jet" href="<?php //echo Yii::$app->request->baseUrl ?>/how-to-sell-on-jet-com#sec3" target="_blank" title="Need Help"></a>-->
  		</div>		
  		<div class="product-upload-menu">
    		<div class="jet-upload-submit"></div>
        <a class="btn btn-primary" data-toggle="tooltip" title="Back To Manage Product(s)" href="<?= $urlManageProduct;?>" data-step="9" data-position="left" data-intro="Back To Manage Product(s)">Back To Manage Product(s)</a>
      </div>
  		<div class="clear"></div>
  	</div>
    <div class="row-count">Showing <?=is_array($data)?count($data):0;?> Product(s)</div>
    <div class="cards-wrapper">
      <?php foreach($data as $productId => $product):?>
          <div class="cards">
            <div class="pro-info">
              <span class="label">Product Name: </span>
              <span class="info"><a target="_blank" href="<?=$urlManageProduct?>?WalmartProductSearch[product_id]=<?=$productId;?>&_edt=<?=$productId;?>"><?=$product ['display_name'];?></a></span>
              <?php unset($product ['display_name']); ?>
              <?php ksort($product);?>
            </div>
             <?php foreach($product as $propertyName => $propertyValue):?>
                  <?php if(in_array($propertyName, ['sku', 'description', 'title'])):?>
                      <div class="pro-info">
                        <span class="label"><?=strtoupper($propertyName)?> : </span>
                        <a href="#" data-toggle="tooltip" title="<?= preg_replace_callback("/{\\w+}/",
                                                                             function ($matches) use (&$validation) {
                                                                                  return call_user_func( array( $validation, 'getWords' ), $matches);
                                                                            }, 
                                                                            $product[$propertyName."Issue"]);?>"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a>  
                        <span class="info incorrect-info"><?= ($propertyName != 'description')?(!empty($propertyValue)?$propertyValue:"Blank"):$propertyValue;?></span>
                         
                      </div>
                  <?php endif?>
                  <?php if($propertyName=='barcode'):?>
                      <div class="pro-info">
                        <div class="label1">
                            <a href="#" data-toggle="tooltip" title="<?= preg_replace_callback("/{\\w+}/",
                                                                             function ($matches) use (&$validation) {
                                                                                    return call_user_func( array( $validation, 'getWords' ), $matches);
                                                                              }, 
                                                                              $product[$propertyName."Issue"]);?>"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a> 
                        
                            <p><?=strtoupper($propertyName)?></p>
                        </div>
                        <div class="m-variants">
                            <div class="vcards">
                              <?php foreach ($propertyValue as $key=>$val):?>
                                <div class="pro-info">
                                    <span class="label"><?=strtoupper($key)?> : </span>
                                    <span class="info incorrect-info"><?= !empty($val)?$val:"Blank";?></span>
                                </div>
                              <?php endforeach?>
                            </div>
                        </div>
                        
                      </div>
                  <?php endif?> 
                  <?php if($propertyName=='variants'):?>
                      <div class="pro-info variant-label">
                        <div class="label"><p><?=strtoupper($propertyName)?></p></div>
                      </div>  
                      <div class="m-variants variants-list">
                            <?php foreach($propertyValue as $variant):?>
                                <div class="vcards">
                                    <div class="pro-info">
                                      <span class="label">Variant : </span>
                                      <span class="info"><?= $variant ['display_name']?></span>
                                      <?php unset($variant ['display_name']); ?>
                                    </div>
                                     <?php foreach($variant as $propName => $propValue):?>
                                        <?php if(in_array($propName, ['sku', 'title'])):?>
                                            <div class="pro-info">
                                              <span class="label"><?=strtoupper($propName)?> : </span>
                                              <a href="#" data-toggle="tooltip" title="<?= preg_replace_callback("/{\\w+}/",
                                                                                       function ($matches) use (&$validation) {
                                                                                              return call_user_func( array( $validation, 'getWords' ), $matches);
                                                                                        }, 
                                                                                        $variant[$propName."Issue"]);?>"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a>
                                              <span class="info incorrect-info"><?= !empty($propValue)?$propValue:"Blank";?></span>
                                               
                                            </div> 
                                        <?php endif?> 
                                        <?php if($propName == 'barcode'):?>
                                            <div class="pro-info">
                                              <div class="label1">
                                                  <a href="#" data-toggle="tooltip" title="<?= preg_replace_callback("/{\\w+}/",
                                                                                        function ($matches) use (&$validation) {
                                                                                                return call_user_func( array( $validation, 'getWords' ), $matches);
                                                                                        }, 
                                                                                        $variant[$propName."Issue"]);?>"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a> 
                                                  <p><?=strtoupper($propName)?></p>
                                              </div>
                                              <div class="m-variants">
                                                  <div class="vcards">
                                                       <?php foreach ($propValue as $keys=>$vals):?>
                                                            <div class="pro-info">
                                                                <span class="label"><?=strtoupper($keys)?> : </span>
                                                                <span class="info incorrect-info"><?= !empty($vals)?$vals:"Blank";?></span>
                                                            </div>
                                                       <?php endforeach?> 
                                                  </div>
                                              </div>
                                              
                                              
                                            </div>
                                        <?php endif?>  
                                     <?php endforeach?>    
                                </div>
                            <?php endforeach?>
                          </div>
                  <?php endif?> 
              <?php endforeach?> 
          </div>
      <?php endforeach?>  
      </div>

  </div>
</div>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

</script>
<style type="text/css">
    .cards-wrapper .cards {
    background-color: #fff;
    box-shadow: 0 1px 16px #ccc;
    margin: 20px auto;
    padding: 15px;
	min-height: 200px;
    width: 70%;
}
.row-count {
    background: #242424 none repeat scroll 0 0;
    border-radius: 2px;
    color: #fff;
    display: block;
    margin: 0 auto;
    padding: 5px 0;
    text-align: center;
    width: 200px;
}
    .cards-wrapper .cards .label {
    color: #000;
    display: inline-block;
    font-size: 13px;
    font-weight: normal;
    min-width: 140px;
    text-align: left;
    text-transform: uppercase;
}
    .cards .pro-info{
    margin-top: 10px;
}
   .pro-info .incorrect-info {
    background-color: #d22525;
    border-radius: 2px;
    color: #fff !important;
    padding: 2px 15px;
	margin-left: 10px;
}
.label1 {
    width: 115px;
}
    .cards .pro-info i {
        color: #D22525;
		font-size: 16px;
}
.pro-info.variant-label .label1 p {
    background: #292836 none repeat scroll 0 0 !important;
    border-radius: 1px;
    color: #fff;
    font-size: 15px;
    margin: 15px 0;
    padding: 5px;
}
.pro-info.variant-label .label p {
    background: #292836 none repeat scroll 0 0 !important;
    border-radius: 1px;
    color: #fff;
    font-size: 15px;
    margin: 15px 0;
    padding: 5px;
}
.pro-info .label1 > a {
    float: left;
}
.variant-label .label {
    width: 100%;
}
.pro-info .label1 p {
    background: #e5eaed none repeat scroll 0 0;
    border-radius: 25px;
    padding: 4px 0;
}
  </style>
