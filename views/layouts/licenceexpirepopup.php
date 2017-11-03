<?php 

use common\models\JetExtensionDetail;
use common\models\User;

//use common\models\AdminShopifyinfo;

$session = Yii::$app->session;
?>


<style>
	.plan {
    	width: 100%;
	}
	.fa.fa-plane {
	  color: #917c7c;
	  font-size: 10em;
	}
	.fieldset.welcome_message > h3 {
	  font-size: 19px;
	  text-align: center;
	  font-family:verdana;
	}
</style>
<body >
	<div class="jet_config_popup jet_config_popup_error" style="display:none">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
		<div id="jet_welcome_message" class="jet_welcome" data-mode="test_msg">
			<div class="entry-edit-head">
				<button type="button" class="close" onclick="closeExpirePopup()" data-dismiss="modal">&times;</button>
				<h1 classs="warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1>
				<h4 class="fieldset-legend">Your app subscription plan <?php if (isset($session['expire_popup_model'])){if ($session['expire_popup_model']=='licence_popup'){echo 'was expired ';}else {echo 'is going to expire';}}
				?>  on <b><?= date("d-m-Y",strtotime($session['expire_date']));?></b></h4>
			</div>
			<div class="fieldset welcome_message">
				<h3 style="">To continue our app services ,please renew Jet-Integration app <?php if (isset($session['expire_popup_model'])){if ($session['expire_popup_model']=='licence_popup'){echo 'subscription plan.';}else {?>  before <span style="color: #337ab7;"><b><?= date("d-m-Y",strtotime($session['expire_date']));?></b></span></h3> <?php  }} ?>
				<ul>
					<li class="col-lg-3 plan col-md-3">
						<div class="jet-wrap-popup">
							<!-- <span>Monthly Plan</span> -->
							<?php /*<img src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/jet_shopify_plan.png"/>*/?>
							<p>
								Your App Services <?php if (isset($session['expire_popup_model'])){if ($session['expire_popup_model']=='licence_popup'){echo 'were debarred';}else {?>   will be debared after <?= date("d-m-Y",strtotime($session['expire_date']));?> <?php  }} ?>.You must have $30 in your paypal recurring account for next payment to continue with your subscription plan.
							</p>
							<p>If you have any issue related to recurring payment,Please communicate with us via.	</p>
							<div class="chat">
								<ul>
								  	<li class="col-lg-4 col-md-4 zopim-chat">
								  		<div class="chat-wrapper">
								  			Zopim chat
								  		</div>
								  	</li>
								  	<li class="col-lg-4 col-md-4 ticket-chat">
								  		<div class="chat-wrapper">
								  			Ticket (<a href="http://support.cedcommerce.com/" target="_blank">support.cedcommerce.com</a>)
								  		</div>
								  	</li>
								  	<li class="col-lg-4 col-md-4 skype-chat">
								  		<div class="chat-wrapper">
								  			Skype (Skype Id : cedcommerce)
								  		</div>
								  	</li>
								 </ul>
							</div>
						</div>
					</li>
					<input style="clear: both;" type="button" class="btn btn-primary" onclick="closeExpirePopup();" value="Close" id="jet_api_config">
				</ul>
			</div>
		</div>
	</div>
	<div class="jet_config_popup_overlay" style="display:none"></div>
</body>	
<script type="text/javascript">
	function closeExpirePopup(){
		j$('.jet_config_popup_overlay').hide();
	    j$('.jet_config_popup').hide();
	    j$('body').removeClass('popup-message');
	}

	j$(document).ready(function() {
		console.log('xcvcvc');
		j$('body').addClass('popup-message');
	    j$('.jet_config_popup_overlay').show();
	    j$('.jet_config_popup').show();
	});
	
	
	
</script>