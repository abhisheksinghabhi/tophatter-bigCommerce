<div class="jet_config_popup" style="display:none">
	<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
	<div id="jet_welcome_message" class="jet_welcome" data-mode="test_msg">
		<div class="entry-edit-head">
			<h1 id="welcome" style="text-align: center; color: green; font-family: 'AlgerianRegular'; font-size: 72px;">Congratulation !!! </h1>
			<h4 style="font-family:verdana; text-align:center;"  class="fieldset-legend">You have Successfully Installed Jet-Integration App</h4>
		</div>
		<div class="fieldset welcome_message">
			<h4 style="text-align: justify;">To start selling on jet, you need to activate all api using sandbox api keys.To get <span style="color: blue;"> sandbox api keys ( api user, api password, merchant id) and fulfillment node </span>  you must need to follow the given steps  </h4>
			<ul>
				<li>
					<span>Step 1</span>
					<p>Login on Jet Partner Panel.Please Click <a href="https://partner.jet.com/login" target="_blank" >here.  </a> <?php /* <a href="javascript:void(0)"  onclick="return showScreenShot()">Screen Shot</a> */?>
					<a class="" id="image1"  data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void(0);" title="Screenshot" onclick="changeImage(this)"><i class="fa fa-camera" aria-hidden="true"></i></a></p>
				</li>
				<li>
					<span>Step 2</span>
					<p>For sandbox api Keys,go to  api(Live) section to access sandbox api details.Please click <a href="https://partner.jet.com/testapi" target="_blank">here.  </a>
						<a id="image2" class="" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void(0);" title="Screenshot" onclick="changeImage(this)"><i class="fa fa-camera" aria-hidden="true"></i></a>
					</p>
				</li>
				<li>
					<span>Step 3</span>
					<p>
						For fulfillment node,go to fulfillment section,if not created then create a new fulfillment node, otherwise.Please click <a href="https://partner.jet.com/fulfillmentnode" target="_blank">here.</a>
						<a id="image3" class="" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void(0);" title="Screenshot" onclick="changeImage(this)"><i class="fa fa-camera" aria-hidden="true"></i></a>
					</p>
				</li>
				<input type="button" class="btn btn-primary" onclick="open_api_config();" value="Continue" id="jet_api_config">
			</ul>
		</div>
	</div>
	<div id="jet_config_setting" class="jet_config" data-mode="test" style="display:none">
		<div class="entry-edit-head">
			<h4 class="fieldset-legend" id="change_mode">Sandbox API Keys (Get sandbox api details from Jet Partner Panel.Click <a href="https://partner.jet.com/testapi" target="_blank">here</a>)</h4>
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
							<span>Api user</span>
						</td>
						<td class="value form-group field-jetconfiguration-api_user required" width="100%">
							<input id="test-jetconfiguration-api_user" class="form-control" type="text" value="" name="test_api_user" maxlength="255">
							<div class="has-error">
								<p class="help-block help-block-error error_category_map" style="display: none;">API User is Required</p>
							</div>
						</td>
					</tr>
					<tr>
						<td class="value_label" width="45%">
							<span>Secret</span>
						</td>
						<td class="value form-group field-jetconfiguration-api_password required" width="100%">
							<input id="test-jetconfiguration-api_password" class="form-control" type="text" value="" name="test_api_password" maxlength="255">
							<div class="has-error">
								<p class="help-block help-block-error error_category_map" style="display: none;">API Password is Required</p>
							</div>
						</td>
					</tr>
					<tr>
						<td class="value_label" width="45%">
							<span>Merchant Id</span>
						</td>
						<td class="value form-group field-jetconfiguration-merchant_email required" width="100%">
						
							<input id="test-jetconfiguration-merchant_id" class="form-control" type="text" value="" name="merchant_id">
							<div class="has-error">
								<p class="help-block help-block-error error_category_map" style="display: none;">Merchant Id is Required</p>
							</div>
						</td>
					</tr>
					<tr class="test_mode_details">
						<td class="value_label" width="45%">
							<span>Fulfillment Node Id</span>
							<br><span class="text-validator">Get Fulfillment Node from Jet Partner Panel.Click <a href="https://partner.jet.com/fulfillmentnode" target="_blank">here</a></span>
						</td>
						<td class="value form-group field-jetconfiguration-fullfilment_node_id required" width="100%">
							<input id="test-jetconfiguration-fullfilment_node_id" class="form-control" type="text" value="" name="test_fullfilment_node_id">
							<div class="has-error">
								<p class="help-block help-block-error error_category_map" style="display: none;">Fulfillment Id is Required</p>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="button" class="btn btn-primary" onclick="submitTestApi();" value="Actvate Live Api" id="test_button">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container text-center">
		<!-- Large modal -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		  	 <img src="<?= Yii::$app->request->baseUrl.'/images/close.png'?>" data-dismiss="modal" style="float:right"/>
			<div class="modal-content">
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
					<!-- <div class="item active">
					 <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/Shopify-Jet-Integration-9.png" alt="...">
					  <div class="carousel-caption">
						<p>Every product need ASIN or UPC and Brand
						</p>
					  </div>
					</div> -->
					<div class="item active">
						  <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/Shopify-Jet-Integration7.png" alt="...">
						  <div class="carousel-caption">
							<p>Map Store product type with jet categories</p>
						  </div>
					 </div>
				  </div>
				</div>
			</div>
			</div>
		</div>
	</div>
		<?php /* ////////////////////////////////////////////////////////////////////////////// */ ?>	
</div>
<div class="jet_config_popup_overlay" style="display:none"></div>
	<style>
		 .jet_config_popup_overlay {
		  background: #000 none repeat scroll 0 0;
		  height: 100%;
		  left: 0;
		  opacity: 0.8;
		  position: fixed;
		  top: 0;
		  width: 100%;
		  z-index: 9999;
		}
		.jet_config_popup {
		  background: #fff none repeat scroll 0 0;
		  border-radius: 5px;
		  box-shadow: 0 0 3px 1px #b4b4b4;
		  left: 19%;
		  overflow: hidden;
		  position: fixed;
		  top: 10%;
		  width: 65%;
		  z-index: 99997;
		}
	</style>
<script type="text/javascript">
	j$(document).ready(function() {
		console.log('xcvcvc');
	    j$('.jet_config_popup_overlay').show();
	    j$('.jet_config_popup').show();
	});
	function changeImage(node){
		console.log("hello");
	}
	function open_api_config(){
		j$('#jet_welcome_message').hide();
		j$('#jet_config_setting').show();
	}
	<?php $testurl= \yii\helpers\Url::toRoute(['apienable/enabletestapi']);?>
	<?php $liveurl= \yii\helpers\Url::toRoute(['apienable/saveliveapi']);?>
	function submitTestApi(){
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
		j$('#LoadingMSG').show();
		if(j$("#jet_config_setting").attr('data-mode')=="test")
		{
			j$.ajax({
		        method: "GET",
		        url: testurl,
		        data: { username: username,password : password,merchant:merchant,fulfillment:fulfillment, _csrf : csrfToken }
		   })
		   .done(function(msg){
			    j$('#LoadingMSG').hide();
				if(msg=="enabled"){
					j$("#change_mode").html('Live API Keys');
					j$("#jet_config_setting .test_mode_details").hide();
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
					//close popup
				}else{
					j$("#success_api").hide();
					j$('.top_error').html(msg);
					j$('.top_error').show();
				}
		    }); 
		}  
	}
</script>