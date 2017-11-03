<?php
use yii\helpers\Html;
use yii\base\view;
?>
<style>
.fixed-container-body-class {
    padding-top: 0;
}
	.image-edit {
  box-shadow: 0 2px 15px 0 rgba(78, 68, 137, 0.3)
  height: auto;
  margin-bottom: 20px;
  margin-top: 20px;
  padding: 15px;
  width: 100%;
}
</style>
<div class="page-content jet-install">
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="content-section">
					<div class="form new-section">
					<h3 id="sec1">Live Api Details</h3>
					  <br>
					  <ul>
						<li>
		                  <p>In this Step, you are required to get the <b>LIVE API DETAILS</b>, and PASTE them onto Live Api Setup Panel.</p>
		                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/live-filled.png" alt="live-filled"/>
		                </li>
		                <br>
		                <li>
		                	<p><b>To do this:</b></p>
		                	<p>Click at DASHBOARD (on Jet partner panel). Here you get API User, Secret, and Merchant ID.</p>
		                	<p>Copy (them) > Paste them on Cedcommerce Live Api Setup Panel > And, Click Next</p>
		                	<img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/live-api.png" alt="live-api"/>
		                </li>
		              </ul>
		              <p><b>Note:</b> Now that you’ve integrated your Shopify store with Jet.com, you need to import product from your store to the Cedcommerce Jet Integration app.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
