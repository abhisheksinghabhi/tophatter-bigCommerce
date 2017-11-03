<body>
	<div class="walmart_config_popup" style="display:none">
		
		<!--   Walmart API Configuration Section start     -->
		<div id="walmart_config_setting" class="Walmart_config" style="display:none">
			<div class="entry-edit-head">
				<h4 class="fieldset-legend" id="change_mode">
					Walmart  Api Keys 
					<span>
						<a href="http://walmart-partner.force.com/knowledgebase/articles/Article/API-Settings-in-the-Seller-Center?c=&q=consumer&l=en_US&kb=" title="Help" target="_blank">
							<i class="fa fa-info-circle" aria-hidden="true"></i>
						</a>
					</span>
					(Get api details from Seller Partner Panel.Click 
					<a href="https://seller.walmart.com" target="_blank">here</a>
					) 
				</h4>
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
								<span>Walmart Consumer ID</span>
							</td>
							<td class="value form-group field-configuration-consumer_id required" width="100%">
								<input id="configuration-consumer_id" class="form-control" type="text" value="" name="consumer_id" maxlength="255">
								<div class="has-error">
									<p class="help-block help-block-error error_category_map" style="display: none;">Walmart Consumer ID is Mandatory</p>
								</div>
							</td>
						</tr>
						<tr>
							<td class="value_label" width="45%">
								<span>Walmart Secret Key</span>
							</td>
							<td class="value form-group field-configuration-secret_key required" width="100%">
								<!-- <input id="configuration-secret_key" class="form-control" type="text" value="" name="secret_key" maxlength="255"> -->
								<textarea id="configuration-secret_key" class="form-control" name="secret_key"></textarea>
								<div class="has-error">
									<p class="help-block help-block-error error_category_map" style="display: none;">Walmart Secret Key is Mandatory</p>
								</div>
							</td>
						</tr>

						<tr>
							<td class="value_label" width="45%">
								<span>Walmart Consumer Channel Type ID</span>
							</td>
							<td class="value form-group field-configuration-channel_type_id required" width="100%">
								<input id="configuration-channel_type_id" class="form-control" type="text" value="" name="channel_type_id" maxlength="255">
								<div class="has-error">
									<p class="help-block help-block-error error_category_map" style="display: none;">Walmart Channel ID is Mandatory</p>
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
								<input type="button" class="btn btn-primary" onclick="submitApi();" value="Validate" id="test_button">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
		<!--   Walmart API Configuration Section end     -->
	</div>
	<div class="walmart_config_popup_overlay" style="display:none"></div>
</body>
<script type="text/javascript">
	j$(document).ready(function() {
		j$(".walmart_config_popup_overlay").show();
		j$('#walmart_config_setting').show();
		setTimeout(function() {
		    	j$('.walmart_config_popup').show();
			}, 3000);
		j$('tr#contact').css('display','none');
	});

	<?php $liveurl= \yii\helpers\Url::toRoute(['apienable/saveliveapi']);?>
	<?php $productUrl= \yii\helpers\Url::toRoute(['walmartproduct/index']);?>

	function submitApi() 
	{	
		console.log("hello");
		var liveurl = '<?php echo $liveurl; ?>';
		var csrfToken = $('meta[name="csrf-token"]').attr("content");

		//check validation
		var flag=false;
		j$('.Walmart_config .form-control').each(function(){
			 if(j$(this).val()==""){
				 console.log("h1");
			  	flag=true;
			  	j$(this).addClass("select_error");
			  	j$(this).next('div').children('.error_category_map').show();
			 }
			 else{
				 console.log("h2");
				 j$(this).removeClass("select_error");
				 j$(this).next('div').children('.error_category_map').hide();
			 }
		});
		if(flag){
			  return false;
		}
		var consumer_id = j$('#configuration-consumer_id').val();
		var secret_key = j$('#configuration-secret_key').val();
		var channel_type_id = j$('#configuration-channel_type_id').val();
		var skype_id = j$('#skype_id').val();

		j$('#LoadingMSG').show();
		
		
		j$.ajax({
			method: "GET",
			url: liveurl,
			data: { 
					consumerId: consumer_id,
					secretKey : secret_key,
					channelTypeId:channel_type_id,
					skypeId: skype_id
				}
		})
		.done(function(msg){
	    	j$('#LoadingMSG').hide();
			if(msg=="enabled"){
				j$("#success_api").show();
				j$(".walmart_config_popup").hide();
				j$(".walmart_config_popup_overlay").hide();
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
</script>
