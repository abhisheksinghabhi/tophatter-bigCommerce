<?php
use frontend\integration\models\WalmartConfiguration;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\walmart\components\Data;

$this->title = 'Walmart Configurations';
$this->params['breadcrumbs'][] = $this->title;
$isPrice=false;
$priceType="";
$priceValue="";
$query="SELECT * FROM `email_template`";
$email = Data::sqlRecords($query,"all");

if(isset($clientData['custom_price']) && $clientData['custom_price'])
{
	$pricData=explode('-',$clientData['custom_price']);
	if(is_array($pricData) && count($pricData)>0)
	{
		if($pricData[0]=="fixed")
			$priceType = "fixed";
		else
			$priceType = "percent";
		$priceValue = $pricData[1];
		$isPrice=true;
	}
}
?>
<script>
</script>
<div class="walmart-configuration-index">
    <div class="walmart_configuration">
    
   <?php $form = ActiveForm::begin([
	    'id' => 'walmart_config',
	    'action' => \yii\helpers\Url::toRoute(['walmartconfiguration/index']),
		'method'=>'post',
	    'options' => ['name'=>'walmart_configupdate'],
	])?>

    	<div class="walmart-pages-heading">
    		<h1 class="walmart_Products_style"><?= Html::encode($this->title) ?></h1>
    		<a class="help_walmart" target="_blank"  href="#" title="Need Help"></a>
			<input type="submit" name="submit" value="save" class="btn btn-primary">
	    	 <div class="clear"></div>
    	</div>
    	<div class="entry-edit-head">
			<h4 class="fieldset-legend">Walmart Setting</h4>
		</div>
		<div class="fieldset walmart-configuration-index">	
			<table class="table table-striped table-bordered" cellspacing="0">
				<tbody>						
					<tr>
						<td class="value_label">
							<span>Walmart Consumer Id</span>
						</td>
						<td class="value form-group required">
							<input id="consumer_id" type="text" name="consumer_id" value="<?=$clientData['consumer_id'];?>" class="form-control">
						</td>
					</tr>
					<tr>
						<td class="value_label">
							<span> Walmart Secret Key</span>
						</td>
						<td class="value form-group required">	
							<textarea rows="4" cols="50" id="secret_key" name="secret_key"><?= $clientData['secret_key']; ?></textarea>
						</td>
					</tr>				
					<tr>
						<td class="value_label">
							<span>Walmart Consumer Channel Type ID</span>
						</td>
						<td class="value form-group">							
							<input type="text" id="consumer_channel_type_id" name="consumer_channel_type_id" value="<?= $clientData['consumer_channel_type_id']; ?>" class="form-control">					
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="entry-edit-head">
    	<h4 class="fieldset-legend">Walmart Return Location</h4>
    	</div>
    	<div class="fieldset walmart-configuration-index">
			<table class="table table-striped table-bordered" >
				<tbody>
					<tr>
						<td class="value_label">
							<span>First Address</span>
						</td>
						<td class="value">
							<input type="text" id="first_address" name="first_address" value="<?= $clientData['first_address'];?>" class="form-control">
						</td>
					</tr>
					<tr>
						<td class="value_label">
							<span>Second Address</span>
						</td>
						<td class="value">						
							<input type="text" id="second_address" name="second_address" value="<?= $clientData['second_address'] ?>" class="form-control">
						</td>
					</tr>
					<tr>
						<td class="value_label">
							<span>City</span>
						</td>
						<td class="value">							
								<input type="text" id="city" name="city" value="<?= $clientData['city'] ?>" class="form-control" >
						</td>
					</tr>
   					<tr>
						<td class="value_label">
							<span>State</span>
						</td>
						<td class="value">
								<input type="text" id="state" name="state" value="<?=  $clientData['state'] ?>" class="form-control">
						</td>
					</tr>
					<tr>
						<td class="value_label">
							<span>Zipcode</span>
						</td>
						<td class="value">							
								<input type="text" id="zipcode" name="zipcode" value="<?= $clientData['zipcode'] ?>" class="form-control">
						</td>
					</tr>
					<tr>
						<td class="value_label">
							<span>Skype Id (Optional)</span>
						</td>
						<td class="value">						
							<input type="text" id="skype_id" name="skype_id" value="<?= $clientData['skype_id'] ?>" class="form-control">
						</td>
					</tr>
				</tbody>
    		</table>
    	</div>
    	<div class="ced-entry-heading-wrapper">
			<div class="entry-edit-head">
	    		<h4 class="fieldset-legend">Product Settings</h4>
	    	</div>
	    	<div class="fieldset walmart-configuration-index">
	    		<div class="ced-form-grid-walmart">
		    		<ul>
		    			<div class="ced-form-item odd">
			    			<li class="ced-lg-hlaf ced-xs-full">
			    				<label>
			    					<span>Product tax Code :</span>
			    				</label>
			    			</li>
			    			<li class="ced-lg-hlaf ced-xs-full">
			    				<input type="text" id="tax_code" name="tax_code" value="<?= isset($clientData['tax_code']) ?>" class="form-control">
			    			</li>
			    			<div class="clear"></div>
		    			</div>
		    			<div class="ced-form-item even">
			    			<li class="ced-lg-hlaf ced-xs-full">
			    				<label>
			    					<span>Product Custom Pricing (fixed or %age) :</span>
			    				</label>
			    			</li>
			    			<li class="ced-lg-hlaf ced-xs-full ced-sub-element">
			    				<select onchange="priceChange(this)" name="updateprice" class="form-control">
			    					<option value="no">No</option>
									<option value="yes" <?php if($isPrice){echo "selected=selected";}?>>Yes</option>
								</select>
								<div id="update_price_val" class="update_price" <?php if(!$isPrice){echo "style=display:none";}?>>
									<select name="custom_price" class="form-control" <?php if(!$isPrice){echo "disabled";}?>>
										<option value="fixed" <?php if($priceType=="fixed"){echo "selected=selected";}?>>Fixed</option>
										<option value="percent" <?php if($priceType=="percent"){echo "selected=selected";}?>>Percentage</option>
									</select>
									<input type="text" id ="updateprice_value" name="updateprice_value" value="<?php echo $priceValue; ?>" class="form-control" <?php if(!$isPrice){echo "disabled";}?>>
									<div class="clear"></div>
								</div>
			    			</li>
			    			<div class="clear"></div>
		    			</div>
		    			<div class="ced-form-item odd">
			    			<li class="ced-lg-hlaf ced-xs-full">
			    				<label>
			    					<span>Set fulfillment Lag Time:</span>
			    				</label>
			    			</li>
			    			<li class="ced-lg-hlaf ced-xs-full ced-sub-element">
			    				<input type="text" id="fulfillment" name="fulfillment" value="<?= isset($clientData['fulfillment']) ?>" class="form-control">
			    			</li>
			    			<div class="clear"></div>
		    			</div>
		    			<div class="ced-form-item even">
			    			<li class="ced-lg-hlaf ced-xs-full">
			    				<label>
			    					<span>Remove Free Shipping From all Products :</span>
			    				</label>
			    			</li>
			    			<li class="ced-lg-hlaf ced-xs-full ced-sub-element">
			    				<select name="remove_free_shipping" class="form-control">
			    					<option value="0">No</option>
									<option value="1" <?php if(isset($clientData['remove_free_shipping']) && $clientData['remove_free_shipping']){echo "selected=selected";}?>>Yes</option>
								</select>
			    			</li>
			    			<div class="clear"></div>
		    			</div>
		    		</ul>
	    		</div>
	    	</div>
		</div>
    	<div class="entry-edit-head">
	    		<h4 class="fieldset-legend">Email Subscription Setting</h4>
	    	</div>
	    	<div class="fieldset walmart-configuration-index">
	    		<div class="ced-form-grid-walmart">
		    		<ul>
		    		<?php foreach($email as $key=>$value): ?>
		    			<div class="ced-form-item odd">
			    			<li class="ced-lg-hlaf ced-xs-full">
			    				<label><span><?php echo $value['custom_title']; ?></span></label>
			    			</li>
			    			<?php if(isset($clientData['email/'.$value['template_title']]) && !empty($clientData['email/'.$value['template_title']])):?>
			    			<li class="ced-lg-hlaf ced-xs-full">
			    				<input type="checkbox" id="email/<?php echo $value['template_title'];?>" name="email/<?php echo $value['template_title']; ?>" value="<?= $clientData['email/'.$value['template_title']]; ?>" checked>
			    			
			    			</li>
			    			<? else: ?>
			    			<li class="ced-lg-hlaf ced-xs-full">
  								<input type="checkbox" id="email/<?php echo $value['template_title']; ?>" name="email/<?php echo $value['template_title']; ?>" value="1">
  							</li>
			    			<?php endif; ?>
			    		

			    			<div class="clear"></div>
			    		</div>
			    	<?php endforeach; ?>
					</ul>
	    		</div>
			</div>
     <?php ActiveForm::end(); ?>
</div>

<script>
	function priceChange(node)
	{
		var val=j$(node).val();
		if(val=='yes')
		{
			$('#update_price_val').children('select').prop('disabled', false);
			$('#update_price_val').children('input').prop('disabled', false);
			$('#update_price_val').show();
		}
		else
		{
			$('#update_price_val').children('select').prop('disabled', true);
			$('#update_price_val').children('input').prop('disabled', true);
			$('#update_price_val').hide();
		}
	}
	$('#walmart_config').submit(function( event ) 
	{
		//alert($('#update_price_val').children('input').val());
		if($('#update_price_val').children('select').is(":not(:disabled)") && ($('#update_price_val').children('input').val()=="" || ($('#update_price_val').children('input').val()!="" && !$.isNumeric($('#update_price_val').children('input').val()))))
		{
			event.preventDefault();
			alert("Please fill valid price value, otherwise set 'No' Custom Pricing");
		}
	});
</script>