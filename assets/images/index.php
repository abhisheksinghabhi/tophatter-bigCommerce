<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<div class="site-index">

	<?php if(!\Yii::$app->user->isGuest){?>
	<h3 class="breadcrumb">Hi, <?php echo Yii::$app->user->identity->username ;?></h3>
	<?php /*deepak@cedcoss-start*/ 
		if(Yii::$app->user->identity->id==14){
	?>
		<div class="start breadcrumb">
			<h3>Hi, <?php echo Yii::$app->user->identity->username ;?></h3>
			<div class="how_start">
				<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">How To Start?</button>
			</div>
		</div>
		<div class="container text-center">
			<!-- Large modal -->
			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<div class="modal-content">
				  <div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					  <li data-target="#myCarousel" data-slide-to="1"></li>
					  <li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
						<div class="item active">
						 <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/first.png" alt="...">
						  <div class="carousel-caption">
							<p>Enter Jet Details to establish connection between shopify store and jet.com</p>
							<p>To reach to the configuration panel click <a target="_blank" href="https://cedcommerce.com/shopify/frontend/jetconfiguration/index">here</a>.
							<!-- <p>To get the api details please go to the  <a target="_blank" href="https://partner.jet.com">here</a>. -->
							</p>
						  </div>
						</div>
						<div class="item">
						  <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/Jet-Partner-Portal2.png" alt="...">
						  <div class="carousel-caption">
							<p>Login your jet partner panel to get api details</p>
							<p>To get the api details click <a target="_blank" href="https://partner.jet.com">here</a>.
							</p>
						  </div>
						</div>
						 <div class="item">
						  <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/Fulfilment-node3.2.png" alt="...">
						  <div class="carousel-caption">
							<p>Please enter one Fulfillment Node.</p>
							<p>To get Fulfillment Node click <a target="_blank" href="https://partner.jet.com/fulfillmentnode">here</a>.
							</p>
						  </div>
						  <div class="item">
						  <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/Live_mode_new3.3.png" alt="...">
						  <div class="carousel-caption">
							<p>Once all api's are enabled successfully.Use live api's credentials to upload product on jet.com</p>
							</p>
						  </div>
						</div>
					  </div>
					  <!-- Controls -->
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					  </a>
					</div>
				</div>
				</div>
			</div>
		</div>
			
	<?php } /*deepak@cedcoss-end*/ ?>
	<div class="lead"><center>
		<b>Welcome to CedCommerce Jet-Shopify Integration Module</b><br>
			
			Click on Jet Menu to get Started.
		</center>	
	</div>
	<?php }?>
    <div class="jumbotron">
    
    	<p class="lead">Jet Shopify Interface</p>
    	<img class="jet-logo-big" src="<?php echo Yii::$app->request->baseUrl?>/images/jet_word_logo.jpg" width="300" height="200">
    	
        

        <p class="lead">Jet is a new kind of marketplace — a smart shopping platform that finds ways to turn built-in costs into opportunities to save you money. Welcome to the ultimate shopping hack.</p>

       
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
            	<?php if(Yii::$app->user->identity->id==14){?>
				<!--  <div id="thumbnails" style="display:none">
			        <ul class="clearfix">
						  <li>
							<a href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/config1.png" title="Jet Configuration"></a>
						 </li>
						 <li>
							<a href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/Jet Partner Portal-2.png" title="Jet Test Api Credentials"></a>
						 </li>
						 <li>
							<a href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/new_config-part-3.1.png" title="Fulfillment Node Id"></a>
						 </li>
						 <li>
							<a href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/partner3.2.png" title="Jet Live Api Credentials"></a>
						 </li>
						  <li>
							<a href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/Return-4.png" title="Jet Return Address"></a>
						 </li>
			        </ul>
			      </div> -->
			    <?php }?>  
       		 </div>
       </div>
    </div>
</div> 
<script type="text/javascript">
<?php if(Yii::$app->user->identity->id==14){?>
/* j$(function(){
    j$('#thumbnails a').lightBox();
    j$('#thumbnails a').eq(0).click();
}); */
<?php }?>
</script>