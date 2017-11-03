<?php
//use Yii;
//use yii\web\Session;
$session = Yii::$app->session;
?>
<style>
	
	.fieldset.welcome_message > h3 {
	  font-size: 19px;
	  text-align: center;
	  font-family:verdana;
	}
	.checkout_trial1,.checkout_trial1:hover{
		 background: #009688 none repeat scroll 0 0;
	    border-radius: 8px;
	    color: rgb(255, 255, 255);
	    display: inline-block;
	    margin-top: 7px;
	    padding: 10px 25px;
	    transition: all 0.5s ease 0s;
	    text-decoration:none;
	}
</style>
<body >
	<div class="jet_config_popup jet_config_popup_error" style="display:none">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
		<div id="jet_welcome_message" class="jet_welcome" data-mode="test_msg">
			<div class="entry-edit-head">
				<button type="button" class="close" onclick="closeExpirePopup()" data-dismiss="modal">&times;</button>
				<h1 classs="warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h1>
				<h4 class="fieldset-legend">Your app subscription plan is going to expire on <b><?= date("d-m-Y",strtotime($session['expire_date']));?></b>.</h4>
			</div>
			<div class="fieldset welcome_message">
				<h3>To continue our app services ,We'd recommend you to purchase Jet-Integration app before <span style="color: #337ab7;"><b><?= date("d-m-Y",strtotime($session['expire_date']));?></b>.</span></h3>
				<a href="<?= Yii::$app->request->getBaseUrl().'/site/paymentplan';?>" class="checkout_trial checkout_trial1" >Proceed To Payment</a>
				<ul>
					<li class="col-lg-12 plan col-md-12">
						<div class="jet-wrap-popup">
							<p>We would be grateful if you would get in touch with us. You can reach us on...</p>
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
	j$(document).ready(function() {
		j$('body').addClass('popup-message');
	    j$('.jet_config_popup_overlay').show();
	    j$('.jet_config_popup').show();
	});
	
	function closeExpirePopup(){
		j$('.jet_config_popup_overlay').hide();
	    j$('.jet_config_popup').hide();
	    j$('body').removeClass('popup-message');
	}
	
</script>