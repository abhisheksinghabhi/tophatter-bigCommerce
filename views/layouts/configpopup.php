
<body>
	<div class="jet_config_popup" style="display:none">
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
		
		<div id="jet_welcome_message" class="jet_welcome" data-mode="test_msg" style="display: none;">
			<div class="generic-heading-shopify">
				<h3>3 fluid steps to connect your store with Jet</h3>
		 		<strong class="title-line">These are the mandatory steps , you must have to fill <b>Jet Configuration setting</b> to upload products on Jet. Lets take a look of jet api activation</strong>
		 		<input type="button" class="btn btn-primary" style="margin-right: 3%;margin-top: -3%;margin-left: -15%;" onclick="open_api_config();" value="Continue" id="jet_api_config">
			</div>				 				
	  		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-top-riview wow fadeInDown animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">			  	
			  <div class="change col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  	<div class="change-wrap">
			  	<strong class="numbering numbering1"> 
				  	<div class="feature-icon">
				  		<div class="item-icon" id="test_api" data-toggle="modal" data-target=".bs-example-modal-lg" title="Screenshot" onclick="changeImage(this.id)"></div>
				  		<div class="item-border-icon"></div>
				  		<div class="fill-icon"></div>
				  	</div>
				</strong>
				<div class="control">
				  <!-- <a id="test_api" class="screenshot_images" data-toggle="modal" data-target=".bs-example-modal-lg" title="Screenshot" onclick="changeImage(this.id)"><i class="fa fa-camera fa-2x" aria-hidden="true"></i></a>
				  -->
				  <h4>Jet Partner Login</h4>
				  <p>
						Login on Jet Partner Panel
						<a target="_blank" href="https://partner.jet.com/login">here</a>
						. Goto
						<b>API</b>
						section for api-user, secret, merchant id and
						<b>fulfillment</b>
						section for Fulfillment-node.
					</p>
				</div>
				</div>
			  </div>
			  <div class="change col-lg-4 col-md-4 col-sm-6 col-xs-12"> 
			  	<div class="change-wrap">
			  	<strong class="numbering numbering2"> 
				  	<div class="feature-icon">
				  		<div class="item-icon" id="activate_api" data-toggle="modal" data-target=".bs-example-modal-lg" title="Screenshot" onclick="changeImage(this.id)"></div>
				  		<div class="item-border-icon"></div>
				  		<div class="fill-icon"></div></div>
				</strong>
				<div class="control">
				  <h4>Activate Jet Api</h4>
				  <p>Enter test api(s) and fulfillment node received from jet. After that click on "activate api".</p>
				  
				</div>
				</div>
			  </div>
			  <div class="change col-lg-4 col-md-4 col-sm-6 col-xs-12"> 
			  	<div class="change-wrap">
				  	<strong class="numbering numbering3"> 
					  	<div class="feature-icon">
					  		<div class="item-icon" id="live_api" data-toggle="modal" data-target=".bs-example-modal-lg" title="Screenshot" onclick="changeImage(this.id)"></div>
					  		<div class="item-border-icon"></div>
					  		<div class="fill-icon"></div></div>
					</strong>
					<div class="control">
					  <h4>Save Live Api</h4>
					  <p>After successfully activation of jet api(s),switch to <b>dashboard</b> section and get live api credentials on dashboard.</p>
					</div>
				</div>
			  </div>					 				
			</div>						
		  	 <div class="extra-plane">
	        	<a href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/site/needhelp" target="_self">
	        		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			            <img class="sub-feature-images1" src="<?php echo Yii::$app->request->baseUrl?>/images/free_support1.png" width="100" height="auto">
			            <div class="extra-features-text">Free Support</div>
			         </div>
	        	</a>
	            <a href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/how-to-sell-on-jet-com" target="_self">
	            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			            <img class="sub-feature-images1" src="<?php echo Yii::$app->request->baseUrl?>/images/document.png" width="100" height="auto">
			            <div class="extra-features-text">Documention</div>
		          </div>
	            </a>
	           <!-- <a href="https://apps.shopify.com/jet-integration" target="_blank"> -->
		           	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		              <img class="sub-feature-images1" src="<?php echo Yii::$app->request->baseUrl?>/images/free_installation1.png" width="100" height="auto">
		              <div class="extra-features-text">Free Installation</div>
		          	</div>
	           <!-- </a> -->
		      </div> 			      
			      <!-- boostrap model popup for images --> 
			      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg" style="margin-top: 4%;">
					    <div class="modal-content">
					      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							  <!-- Wrapper for slides -->
							  <div class="carousel-inner">
							  	<div class="item active" id='login'>
							     <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/login.png" alt="Login">
							      <div class="carousel-caption">
							        Login on jet partner panel
							      </div>
							    </div>
							    <div class="item" id='test'>
							     <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/test-api.png" alt="test api">
							      <div class="carousel-caption">
							        API Section
							      </div>
							    </div>
							    <div class="item" id='fulfill'>
							      <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/fulfillment.png" alt="fulfillment node">
							      <div class="carousel-caption">
							        Fulfillment Section
							      </div>
							    </div>
							    <div class="item" id='filled-api'>
							      <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/test-api-filled.png" alt="api congiguration">
							      <div class="carousel-caption">
							        Enter test api on app
							      </div>
							    </div>
							     <div class="item" id='live'>
							      <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/live-api.png" alt="live api">
							      <div class="carousel-caption">
							        Live api on dashboard
							      </div>
							    </div>
							  </div>
							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left"></span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right"></span>
							 </a>
						 </div>
					  </div>
				   </div>
				</div>
		</div> <!--   Welcome Message Section end     -->
		
		
		
		<!--   Jet API Configuration Section start     -->
		<div id="jet_config_setting" class="jet_config" data-mode="test" style="display:none">
			<div class="entry-edit-head">
				<h4 class="fieldset-legend" id="change_mode">Test API Keys (Get Test api details from Jet Partner Panel.Click <a href="https://partner.jet.com/testapi" target="_blank">here</a>)</h4>
			</div>
			
				
				
			
			<div class="fieldset enable_api">
				<div class="has-error">
					<div class="help-block help-block-error top_error alert-danger" style="display: none;border-radius: 4px;margin-bottom: 10px;padding: 10px;"></div>
					<div class="alert-success" id="success_api" style="display: none; border-radius: 4px;margin-bottom: 10px;padding: 10px;">Live Api Details are saved successfully</div>
					<div class="alert-success" id="live_api" style="display: none;border-radius: 4px;margin-bottom: 10px;padding: 10px;">Live Api(s) are  enabled successfully.Please reload Jet Partner Panel to get Live Api(s).Click <a href="https://partner.jet.com" target="_blank">here</a></div>
				</div>
				<table class="table table-striped table-bordered" cellspacing="0">
					<tbody>
						<tr>
							<td class="value_label" width="45%">
								<span></span>
							</td>
							<td class="value form-group field-jetconfiguration-api_user required" width="100%">
								<input id="test-jetconfiguration-api_user" class="form-control" type="text" value="" name="test_api_user" maxlength="255">
								<div class="has-error">
									<p class="help-block help-block-error error_category_map" style="display: none;">Consumer ID is Required</p>
								</div>
							</td>
						</tr>
						<tr>
							<td class="value_label" width="45%">
								<span>Walmart Secret Key</span>
							</td>
							<td class="value form-group field-jetconfiguration-api_password required" width="100%">
								<input id="test-jetconfiguration-api_password" class="form-control" type="text" value="" name="test_api_password" maxlength="255">
								<div class="has-error">
									<p class="help-block help-block-error error_category_map" style="display: none;">Secret Key is Required</p>
								</div>
							</td>
						</tr>
						<tr id="skype">
							<td class="value_label" width="45%">
								<span>Skype Id</span>
							</td>
							<td class="value form-group " width="100%">
								<input id="skype_id" class="form-contact_details" type="text" value="" name="skype_id" maxlength="255">
							</td>
						</tr>
						
						
						<tr>
							<td colspan="2">
								<span id="note"><b>Note:</b>Skype Id is optional,it's for communication purpose only. </span>
								<input type="button" class="btn btn-primary" onclick="submitTestApi();" value="activate api" id="test_button">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	<!--   Jet API Configuration Section end     -->
	</div>
	<div class="jet_config_popup_overlay" style="display:none"></div>
</body>
<script type="text/javascript">
	j$(document).ready(function() {
		j$('div.jet_config_popup').addClass('popup-message');
		j$('#jet_welcome_message').show();
		j$('#jet_config_setting').hide();
		setTimeout(function() {
			j$('.jet_config_popup_overlay').show();
		    j$('.jet_config_popup').show();
			  //j$('#jet_config_setting').show();
			}, 3000);
		console.log('xcvcvc');
		//j$('tr#skype').css('display','none');
		j$('tr#contact').css('display','none');
		//j$('span#note').css('display','none');
	});
	function open_api_config(){
		j$('#jet_welcome_message').hide();
		j$('#jet_config_setting').show();
	}
	<?php $testurl= \yii\helpers\Url::toRoute(['apienable/enabletestapi']);?>
	<?php $liveurl= \yii\helpers\Url::toRoute(['apienable/saveliveapi']);?>
	<?php /* $saveQuery= \yii\helpers\Url::toRoute(['apienable/needhelp']); */?>
	<?php $productUrl= \yii\helpers\Url::toRoute(['jetproduct/index']);?>
	function submitTestApi(){
		alert("come");
		console.log("hello");
		var testurl = '<?php echo $testurl; ?>';
		var liveurl = '<?php echo $liveurl; ?>';
		var csrfToken = $('meta[name="csrf-token"]').attr("content");
		//check validation
		var flag=false;
		j$('.jet_config .form-control').each(function(){
			 if(j$(this).val()==""){
				console.log("mapping");
			  	flag=true;
			  	j$(this).addClass("select_error");
			  	j$(this).next('div').children('.error_category_map').show();
			 }
			 else{
				 j$(this).removeClass("select_error");
				 j$(this).next('div').children('.error_category_map').hide();
			 }
		});
		if(flag){
			  return false;
		}
		var username = j$('#test-jetconfiguration-api_user').val();
		var password = j$('#test-jetconfiguration-api_password').val();
		var merchant = j$('#test-jetconfiguration-merchant_id').val();
		var fulfillment = j$('#test-jetconfiguration-fullfilment_node_id').val();

		var contact_number = j$('#contact_number').val();
		var skype_id = j$('#skype_id').val();

		j$('#LoadingMSG').show();
		if(j$("#jet_config_setting").attr('data-mode')=="test")
		{
			j$.ajax({
		        method: "GET",
		        url: testurl,
		        data: { username: username,password : password,merchant:merchant,fulfillment:fulfillment,contact_number:contact_number,skype_id:skype_id, _csrf : csrfToken }
		   })
		   .done(function(msg){
			    j$('#LoadingMSG').hide();
				if(msg=="enabled"){
					j$("#change_mode").html('Live API Keys');
					j$("#jet_config_setting .test_mode_details").hide();
					j$("#jet_config_setting #contact").hide();
					j$("#jet_config_setting #skype").hide();
					j$("#jet_config_setting span#note").css("display","none");
					j$("#test-jetconfiguration-api_user").val("");
					j$('#test-jetconfiguration-api_password').val("");
					j$('#test-jetconfiguration-merchant_id').val("");
					j$("#jet_config_setting").attr('data-mode','live');
					j$("#test_button").val('Save');
					j$("#live_api").show();
					j$('.top_error').hide();
				}else{
					j$('.top_error').html(msg);
					j$('.top_error').show();
				}
		    }); 
		}
		else
		{
			console.log(fulfillment);
			j$.ajax({
		        method: "GET",
		        url: liveurl,
		        data: { username: username,password : password,merchant:merchant,fulfillment:fulfillment, _csrf : csrfToken }
		   })
		   .done(function(msg){
			    j$('#LoadingMSG').hide();
				if(msg=="enabled"){
					j$("#success_api").show();
					j$(".jet_config_popup").hide();
					j$(".jet_config_popup_overlay").hide();
					j$('body').removeClass('popup-message');
					setTimeout(function(){
			    		window.location.href = '<?php echo $productUrl; ?>';
					}, 700);
					//close popup
				}else{
					j$("#success_api").hide();
					j$('.top_error').html(msg);
					j$('.top_error').show();
				}
		    }); 
		}  
	}

	function changeImage(id){
		j$('div.carousel-inner div').removeClass('active');
		if(id=='test_api'){
			j$('div.carousel-inner div#login').addClass('active');
		}else if(id=='activate_api'){
			j$('div.carousel-inner div#filled-api').addClass('active');
		}else if(id=='live_api'){
			j$('div.carousel-inner div#live').addClass('active');
		}
	}
	
</script>
