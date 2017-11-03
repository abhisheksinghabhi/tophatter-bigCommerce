<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\Installation;

$url = Data::getUrl('walmart-api/save');

$showApiForm = Installation::showApiStep();

?>

<?php if($showApiForm) : ?>
<div class="api_enable jet_config content-section test-api-step">
	<div class="api_field fieldset enable_api">
    	<div class="help-block help-block-error top_error alert-danger" style="display: none;border-radius: 4px;margin-bottom: 10px;padding: 10px;"></div>
		<?php
		  
		$form = ActiveForm::begin([
        'id' => 'jet_config_api',
        'action' => $url,
        'method' => 'post',
        'options' => ['name' => 'jet_config'],
    	]) ?>
		<ul class="table table-sliiped" cellspacing="0">
			<li>
				<div>
					<div class="value_label">
						<span class="control-label">Walmart Consumer Id</span>
					</div>
					<div class="form-group required">
						<input placeholder="Please enter Consumer Id" autofocus="autofocus" id="api-consumer_id" class="form-control" type="text" value="" name="consumer_id" maxlength="255">
						<div class="has-error">
							<p class="help-block help-block-error error_category_map" style="display: none;">'Walmart Consumer Id' is Required</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</li>
			<li>
				<div>
					<div class="value_label">
						<span class="control-label">Walmart Secret Key</span>
					</div>
					<div class="form-group required">
						<textarea placeholder="Please enter Walmart Secret Key" autofocus="autofocus" id="api-secret_key" class="form-control" name="secret_key"></textarea>
						<div class="has-error">
							<p class="help-block help-block-error error_category_map" style="display: none;">'Walmart Secret Key' is Required</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</li>
			<!-- <li>
				<div>
					<div class="value_label">
						<span class="control-label">Walmart Consumer Channel Type ID</span>
					</div>
					<div class="form-group required">
					
						<input placeholder="Please enter Consumer Channel Type ID" autofocus="autofocus" id="api-consumer_channel_type_id" class="form-control" type="text" value="" name="consumer_channel_type_id">
						<div class="has-error">
							<p class="help-block help-block-error error_category_map" style="display: none;">'Walmart Consumer Channel Type ID' is Required</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</li> -->
			<li>
				<div>
					<div class="value_label">
						<span class="">Skype Id</span>
					</div>
					<div class="form-group">
					
						<input placeholder="Please enter Your Skype Id" autofocus="autofocus" id="api-skype_id" class="form-control" type="text" value="" name="skype_id">
					</div>
					<div class="clear"></div>
				</div>
			</li>
			<li>
				<div>
					<div class="clearfix">
						<input type="button" class="btn btn-primary next" value="Next" id="test_button">
					</div>
				</div>
			</li>

		</ul>
		<?php 
			ActiveForm::end();
		?>
	</div>	
</div>

<script type="text/javascript">
$(document).ready(function(){
  var url = '<?php echo $url;?>';
  UnbindNextClick()
	$('.next').on('click', function(event){	
		//check validation
    	event.preventDefault();
		var flag=false;
		$('form .required .form-control').each(function(){
			var value = $(this).val().trim();
			if(value == "")
			{
				flag=true;
				$(this).addClass("select_error");
				$(this).next('div').children('.error_category_map').show();
			}
			else
			{
				$(this).removeClass("select_error");
				$(this).next('div').children('.error_category_map').hide();
			}
		});
	    if(!flag){
			$('#LoadingMSG').show(); 
			$.ajax({
			    method: "POST",
			    url: url,
			    dataType : "json",
			    data: $("form").serialize(),
			})
			.done(function(response){
				$('#LoadingMSG').hide();
				if(response.success)
				{
					$('.top_error').hide();
					nextStep();
				} else {
					$('.top_error').html(response.message);
					$('.top_error').show();
				}
			});
	    } 
	});
});
</script>
<?php else : ?>
<div class="api_enable jet_config content-section test-api-step">
	<div>
		<h3>Congratulations!!</h3>
		<p>Thank you for sharing your details with us. We have got your request. Cedcommerce team will get back to you very soon.</p>
		<p>Thank you.</p>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.next').hide();
		$('.next').attr('disabled',true);

		$('.next').on('click', function(event){
    		event.preventDefault();
    		alert("Can't Proceed.");
    	});
	});
</script>
<?php endif; ?>
