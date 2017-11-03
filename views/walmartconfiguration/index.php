<?php
use frontend\integration\models\WalmartConfiguration;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\walmart\components\Data;

$this->title = 'Walmart Configurations';
$this->params['breadcrumbs'][] = $this->title;
$isPrice=false;
$priceType = "";
$priceValue = "";
$priceValueType = "";
$query = "SELECT * FROM `walmart_email_template` where show_on_admin_setting=1";
$email = Data::sqlRecords($query,"all");
if (isset($clientData['ordersync']) && $clientData['ordersync'] == 'no') {
    $ordersync = true;
}

if(isset($clientData['custom_price']) && $clientData['custom_price'])
{
	$pricData=explode('-',$clientData['custom_price']);
	if(is_array($pricData) && count($pricData)>0)
	{

		if($pricData[0]=="Increase")
			$$priceValueType  = "Increase";
		else
			$$priceValueType  = "Decrease";

		if($pricData[1]=="fixed")
			$priceType = "fixed";
		else
			$priceType = "percent";

		$priceValue = $pricData[2];

		$isPrice=true;
	}
}
?>
<script>
</script>
<div class="jet-configuration-index content-section">
    <div class="jet_configuration form new-section">
    
   <?php $form = ActiveForm::begin([
	    'id' => 'walmart_config',
	    'action' => \yii\helpers\Url::toRoute(['walmartconfiguration/index']),
		'method'=>'post',
	    'options' => ['name'=>'walmart_configupdate'],
	])?>
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>"
               value="<?= Yii::$app->request->csrfToken; ?>"/>
      <div class="jet-pages-heading">
        <div class="title-need-help">
            <h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
            <a class="help_jet" target="_blank" href="https://bigcommerce.cedcommerce.com/integration/walmart-marketplace/sell-on-walmart"
               title="Need Help"></a>
        </div>
        <div class="product-upload-menu">
        	<button type="button" id="instant-help" class="btn btn-primary">Help</button>
            <input type="submit" name="submit" value="save" class="btn btn-primary">
        </div>
            <div class="clear"></div>
        </div>
    	<div class="ced-entry-heading-wrapper">
    		<div class="entry-edit-head">
				<h4 class="fieldset-legend">Walmart Setting</h4>
			</div>
			<div class="fieldset enable_api" id="api-section">
				
				<table class="table table-striped table-bordered" cellspacing="0">
	                <tbody>
		                <tr>
		                    <td class="value_label">
		                        <span>Walmart Consumer Id</span>
		                    </td>
		                    <td>
		                    	<span><input id="consumer_id" type="text" name="consumer_id" value="<?=$clientData['consumer_id'];?>" class="form-control"></span>
		                    </td>
	                    </tr>
	                    <tr>
		                    <td class="value_label">
		                        <span>Walmart Secret Key</span>
		                    </td>
		                    <td>
		                    	<span><textarea rows="4" cols="50" id="secret_key" name="secret_key"><?= $clientData['secret_key']; ?></textarea></span>
		                    </td>
	                    </tr>
	                  
	                </tbody>
                </table>
			</div>
    	</div>
    	<div class="ced-entry-heading-wrapper">
    		<div class="entry-edit-head">
	    		<h4 class="fieldset-legend">Walmart Return Location</h4>
	    	</div>
	    	<div class="fieldset walmart-configuration-index">
	    		<table class="table table-striped table-bordered" id="return-location-section" cellspacing="0">
	                <tbody>
		                <tr>
		                    <td class="value_label">
		                        <span>First Address</span>
		                    </td>
		                    <td>
		                    	<span><input type="text" id="first_address" name="first_address" value="<?= $clientData['first_address'];?>" class="form-control"></span>
		                    </td>
	                    </tr>
	                    <tr>
		                    <td class="value_label">
		                        <span>Second Address</span>
		                    </td>
		                    <td>
		                    	<span><input type="text" id="second_address" name="second_address" value="<?= $clientData['second_address'] ?>" class="form-control"></span>
		                    </td>
	                    </tr>
	                    <tr>
		                    <td class="value_label">
		                        <span>City</span>
		                    </td>
		                    <td>
		                    	<span><input type="text" id="city" name="city" value="<?= $clientData['city'] ?>" class="form-control" ></span>
		                    </td>
	                    </tr>
	                    <tr>
		                    <td class="value_label">
		                        <span>State </span>
		                    </td>
		                    <td>
		                    	<span><input type="text" id="state" name="state" value="<?=  $clientData['state'] ?>" class="form-control"></span>
		                    </td>
	                    </tr>
	                    <tr>
		                    <td class="value_label">
		                        <span>Zip Code</span>
		                    </td>
		                    <td>
		                    	<span><input type="text" id="zipcode" name="zipcode" value="<?= $clientData['zipcode'] ?>" class="form-control"></span>
		                    </td>
	                    </tr>
	                    <tr>
		                    <td class="value_label">
		                        <span>Skype Id (Optional)</span>
		                    </td>
		                    <td>
		                    	<span><input type="text" id="skype_id" name="skype_id" value="<?= $clientData['skype_id'] ?>" class="form-control"></span>
		                    </td>
	                    </tr>
	                </tbody>
                </table>
			</div>
    	</div>
    	        <div class="ced-entry-heading-wrapper">
            <div class="entry-edit-head">
                <h4 class="fieldset-legend">Walmart Order</h4>
            </div>
            <div class="fieldset walmart-configuration-index">
                <table class="table table-striped table-bordered" id="return-location-section" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="value_label">
                            <span>Order Sync</span>
                            <span class="text-validator">Set 'No' if you don't want to sync order(s) in Bigcommerce store.</span>
                        </td>
                        <td>
                            <span>
                                <select name="ordersync" class="form-control">
			    					<option value="yes">Yes</option>
									<option value="no" <?php if (isset($ordersync)) {
                                        echo "selected=selected";
                                    } ?>>No</option>
								</select>
                            </span>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <?php
        $sync_fields = [
            'title' => 'Title',
            'sku' => 'Sku',
            'image' => 'Image',
            'inventory' => 'Inventory',
            'weight' => 'Weight',
            'price' => 'Price',
            'upc' => 'UPC/Barcode/Other',
            'variant_option_values' => 'Variant Option Values',
            'vendor' => 'Vendor',
            'product_type' => 'Product Type',
            'description' => 'Description'
        ];
        ?>
        <div class="ced-entry-heading-wrapper">
            <div class="entry-edit-head">
                <h4 class="fieldset-legend">Auto Product Sync</h4>
            </div>
            <div class="fieldset walmart-configuration-index" id="product-sync-setting">
                <table class="table table-striped table-bordered" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="value_label">
                            <span>Product Sync</span>
                        </td>
                        <td>
                            <span>
                                <select name="sync_product_enable" class="form-control"
                                        onchange="productsync(this)">
                                    <option value="enable" <?php if (isset($clientData['sync_product_enable']) && $clientData['sync_product_enable'] == 'enable') {
                                        echo "selected=selected";
                                    } ?>>Enable</option>
                                    <option value="disable" <?php if (isset($clientData['sync_product_enable']) && $clientData['sync_product_enable'] == 'disable') {
                                        echo "selected=selected";
                                    } ?>>Disable</option>
                                </select>
                            </span>

                            <div id="sync_product_options">
                                <div class="all_checkbox_options">
                                    <input type="checkbox" class="all-sync-fields-checkbox"
                                           id="all-sync-fields-checkbox" name="" value="1" />
                                    <label>Select All</label>
                                </div>
                                <div class="sync-fields">
                                    <?php foreach ($sync_fields as $sync_index => $sync_value) : ?>
                                        <div class="checkbox_options">
                                            <input type="checkbox" class="sync-fields-checkbox"
                                                   name="sync-fields[sync-fields][<?= $sync_index ?>]" id="<?= $sync_index?>" value="1" />
                                            <label><?= $sync_value ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

		<div class="ced-entry-heading-wrapper">
			<div class="entry-edit-head">
	    		<h4 class="fieldset-legend">Product Settings</h4>
            </div>
            <div class="fieldset walmart-configuration-index" id="product-setting">
                <table class="table table-striped table-bordered" cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="value_label">
                            <span>Product tax Code</span>
                            <span class="text-validator">To get product tax code <a
                                        href="<?= Data::getUrl('walmarttaxcodes/index') ?>"
                                        target="_blank">click here</a></span>
                        </td>

                        <td>
                                <span><input type="text" id="tax_code" name="tax_code"
                                             value="<?= isset($clientData['tax_code']) ? $clientData['tax_code'] : '' ?>"
                                             class="form-control"></span>
                        </td>
                    </tr>

                    <tr>
                        <td class="value_label">
                            <span>Product Import Option</span>
                        </td>

                        <td>
                                <span>  <select name="import_product_option" class="form-control">
                                        <option value="any" <?php if (isset($clientData['import_product_option']) && $clientData['import_product_option'] == 'any') {
                                            echo "selected=selected";
                                        } ?>>All Product</option>
                                        <option value="published" <?php if (isset($clientData['import_product_option']) && $clientData['import_product_option'] == 'published') {
                                            echo "selected=selected";
                                        } ?>>Published Product</option>
                                    </select></span>
                        </td>
                    </tr>

                    <!--  -->
                    <tr>
                        <td class="value_label">
                            <span>Product Custom Pricing (fixed or %age)</span>
                        </td>
                        <td>
    		                    	<span>

                                        <select onchange="priceChange(this)" name="updateprice" class="form-control">
    			    					<option value="no">No</option>
    									<option value="yes" <?php if ($isPrice) {
                                            echo "selected=selected";
                                        } ?>>Yes</option>
    								</select>
                                        <div id="dynamicpricing" <?php if (!$isPrice) {
                                            echo "style=display:none";
                                        } ?> >
                                        <select class="form-control" name="custom_price_type">
    			    					    <option value="increase" <?php if ($priceValueType == "increase") {
                                                echo "selected=selected";
                                            } ?> >Increase Price</option>
    									    <option value="decrease" <?php if ($priceValueType == "decrease") {
                                                echo "selected=selected";
                                            } ?> >Decrease Price</option>
    								    </select>
                                            </div>
    								<div id="update_price_val" class="update_price" <?php if (!$isPrice) {
                                        echo "style=display:none";
                                    } ?>>
    									<select name="custom_price" class="form-control" <?php if (!$isPrice) {
                                            echo "disabled";
                                        } ?>>
    										<option value="fixed" <?php if ($priceType == "fixed") {
                                                echo "selected=selected";
                                            } ?>>Fixed</option>
    										<option value="percent" <?php if ($priceType == "percent") {
                                                echo "selected=selected";
                                            } ?>>Percentage</option>
    									</select>
    									<input type="text" id="updateprice_value" name="updateprice_value"
                                               value="<?php echo $priceValue; ?>"
                                               class="form-control" <?php if (!$isPrice) {
                                            echo "disabled";
                                        } ?>>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="value_label">
                            <span>Remove Free Shipping From all Products</span>
                        </td>
                        <td>
    		                    	<span><select name="remove_free_shipping" class="form-control">
    			    					<option value="0">No</option>
    									<option value="1" <?php if (isset($clientData['remove_free_shipping']) && $clientData['remove_free_shipping']) {
                                            echo "selected=selected";
                                        } ?>>Yes</option>
    								</select></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="value_label">
                            <span>Threshold Product Inventory</span>
                            <span class="text-validator">Enter the MINIMUM stock of products (in numeric) below which inventory status is sent as Out-Of-Stock to Walmart.</span>
                        </td>
                        <td>
                                <span>
                                    <input type="text" name="inventory"
                                           value="<?= (isset($clientData['inventory']) && !empty($clientData['inventory'])) ? $clientData['inventory'] : '' ?>"
                                           class="form-control">
                                </span>
                        </td>
                    </tr>
                     <tr>
                        <td class="value_label">
                            <span>Product Sale Price</span>
                            <span class="text-validator">select 'yes' if you want to add sale price!!</span>
                        </td>
                        <td>
                                <span>
                                    <select name="sale_price" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1" <?php if (isset($clientData['sale_price']) && $clientData['sale_price']) {
                                            echo "selected=selected";
                                        } ?>>Yes</option>
                                    </select>
                                </span>
                                
                        </td>
                    </tr>

                    <tr>
                        <td class="value_label">
                            <span>Upload Product Without Quantity</span>
                            <span class="text-validator">select 'yes' if you want to upload product without Quantity</span>
                        </td>
                        <td>
                                <span>
                                    <select name="upload_product_without_quantity" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1" <?php if (isset($clientData['upload_product_without_quantity']) && $clientData['upload_product_without_quantity']) {
                                            echo "selected=selected";
                                        } ?>>Yes</option>
                                    </select>
                                </span>
                                
                        </td>
                    </tr>

                    </tbody>
                </table>
	    	</div>
		</div>
		<div class="ced-entry-heading-wrapper">
    		<div class="entry-edit-head">
	    		<h4 class="fieldset-legend">Email Subscription Setting</h4>
	    	</div>
	    	<div class="fieldset enable_api" id="email-subscription-section">  
	    		<table class="table table-striped table-bordered" cellspacing="0">
	                <tbody>
		                
		                	<?php foreach($email as $key=>$value): ?>
				    			<?php if($value['show_on_admin_setting'] == 1):?>
				    			<tr>
					    			<td class="value_label">
					    				<label><span><?php echo $value['custom_title']; ?></span></label>
					    			</td>
					    			<?php if(isset($clientData['email/'.$value['template_title']]) && !empty($clientData['email/'.$value['template_title']])):?>
					    			<td>
					    				<input type="checkbox" id="email/<?php echo $value['template_title'];?>" name="email/<?php echo $value['template_title']; ?>" value="<?= $clientData['email/'.$value['template_title']]; ?>" checked>
					    			
					    			</td>
					    			<? else: ?>
					    			<td class="value_label">
		  								<input type="checkbox" id="email/<?php echo $value['template_title']; ?>" name="email/<?php echo $value['template_title']; ?>" value="1">
		  							</td>
		  							</tr>
					    			<?php endif; ?>
					    							    			
					    		<?php endif; ?>
			    			<?php endforeach; ?>
		                
		            </tbody>
		        </table>
	    			    		
			</div>
    	</div>
		<?php ActiveForm::end(); ?>
	</div>
</div>
<style>
    .jet-configuration-index .value_label {
        width: 50%;
    }
.jet-configuration-index .table-striped select,.jet-configuration-index .form-control{
    width: 100%;
    display: inline-block;
    padding-left: 10px;
}
    .jet-configuration-index .value {
    border: medium none !important;
    display: inline-block;
    width: 100%;
}
#custom_price_csv span, #custom_title_csv span{
    width: 85%;
    display: inline-block;
}
   .jet-configuration-index .help_jet{
        display: inline-block;
   }
   .help_jet {
    width: 50px!important;
}
.jet-configuration-index .value_label {
    width: 50%;
}

</style>
<script>
	function priceChange(node)
	{
		var val=j$(node).val();
		if(val=='yes')
		{
			$('#update_price_val').children('select').prop('disabled', false);
			$('#update_price_val').children('input').prop('disabled', false);
			$('#update_price_val').show();
            $('#dynamicpricing').show();
		}
		else
		{
			$('#update_price_val').children('select').prop('disabled', true);
			$('#update_price_val').children('input').prop('disabled', true);
			$('#update_price_val').hide();
            $('#dynamicpricing').hide();
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


     function productsync(node) {
        var val = j$(node).val();
        if (val == 'enable') {
            $('#sync_product_options').show();
            $('#all-sync-fields-checkbox').prop('checked', true);
            $('.sync-fields-checkbox').prop('checked', true);

            /*$('#all-sync-fields-checkbox').prop('checked', true);
                if (!$('#all-sync-fields-checkbox').is(':checked')) {
                    $('.sync-fields-checkbox').prop('checked', false);
                }
                else{
                    $('.sync-fields-checkbox').prop('checked', true);
                }*/
        }
        else {
            $('#sync_product_options').hide();
        }
    }

</script>

<script type="text/javascript">
       $(document).ready(function () {
        var prod_sync = "<?php if(isset($clientData['sync_product_enable']) && $clientData['sync_product_enable'] == 'enable'){
            echo 'enable';
        } elseif(isset($clientData['sync_product_enable']) && $clientData['sync_product_enable']=='disable'){
            echo 'disable';
        }else{
            echo '';
        }?>";
        var flag = true;
        if(prod_sync=='')
        {
            $('#all-sync-fields-checkbox').prop('checked', true);
            $('.sync-fields-checkbox').prop('checked', true);
            flag=false;
        }

        if(flag){
            if(prod_sync=='enable')
            {
                var sync_field = '<?= isset($clientData['sync-fields']) ? $clientData['sync-fields'] : ''?>';
                if(sync_field != ''){
                    var fields = JSON.parse(sync_field);
                    var counter = 0 ;
                    $.each(fields['sync-fields'], function (index,value){
                        counter++;
                        $('#'+index+'').prop('checked', true);
                    });
                    if(counter=='11'){
                        $('#all-sync-fields-checkbox').prop('checked', true);
                    }
                }
            }else{
                $('#sync_product_options').hide();
            }
        }

        $('#all-sync-fields-checkbox').click(function() {
            if (!$(this).is(':checked')) {
                $('.sync-fields-checkbox').prop('checked', false);
            }
            else{
                $('.sync-fields-checkbox').prop('checked', true);
            }
        });
        
        $('.checkbox_options').click(function() {
            $("input:checkbox[class=sync-fields-checkbox]").each(function () {
                if (!$(this).is(':checked')) {
                    $('#all-sync-fields-checkbox').prop('checked', false);
                    return false;
                }
                else{
                    $('#all-sync-fields-checkbox').prop('checked', true);
                }
            });

        });
    });

</script>

  <script type="text/javascript">
    $('#instant-help').click(function(){
        var configQuicktour = introJs().setOptions({
                doneLabel: 'Finish',
                showStepNumbers: false,
                exitOnOverlayClick: false,
                steps: [
                  {
                    element: '#api-section',
                    intro: 'Edit the Walmart API details.',
                    position: 'bottom'
                  },
                 /* {
                    element: '#fba-integration-section',
                    intro: 'Check FBA Fulfillment settings.',
                    position: 'bottom'
                  },*/
                  {
                    element: '#return-location-section',
                    intro: 'Update Walmart Return Location Address.',
                    position: 'bottom'
                  },
                  {
                    element: '#product-setting',
                    intro: 'Globally apply product tax code,set custom product price and remove free shipping from all product',
                    position: 'bottom'
                  },
              /*    {
                    element: '#cancel-order-section',
                    intro: 'Manage Cancel Order Setting.',
                    position: 'bottom'
                  },*/
             /*     {
                    element: '#custom-pricing-section',
                    intro: 'Manage Product custom/dynamic pricing.',
                    position: 'bottom'
                  },*/
             /*     {
                    element: '#custom_price_csv_field',
                    intro: 'Select "Yes" to update price of each product.',
                    position: 'left'
                  },
                  {
                    element: '#custom_price_csv_label',
                    intro: "Get CSV file by clicking 'CLICK HERE'.",
                    position: 'bottom'
                  },
                  {
                    element: '#custom-title-section',
                    intro: 'Manage Product custom/dynamic Title Setting.',
                    position: 'bottom'
                  },
                  {
                    element: '#custom_title_csv_field',
                    intro: 'Select "Yes" to update title.',
                    position: 'left'
                  },
                  {
                    element: '#custom_title_csv_label',
                    intro: "Get CSV file by clicking 'CLICK HERE'.",
                    position: 'bottom'
                  },*/
                  {
                    element: '#email-subscription-section',
                    intro: 'Update Email Subscription Setting from here. Check the corresponding Checkbox to receive Mails and Uncheck to Not Receive Mails.',
                    position: 'bottom'
                  }
                ]
            });

            configQuicktour.start().oncomplete(function() {
              window.location.href = '<?= Data::getUrl("site/index") ?>';
          });
      });
  </script>

  <?php $get = Yii::$app->request->get();
  if(isset($get['tour'])) : 
?>
  <script type="text/javascript">
    $(document).ready(function(){
        var configQuicktour = introJs().setOptions({
                doneLabel: 'Finish',
                showStepNumbers: false,
                exitOnOverlayClick: false,
                    steps: [
                  {
                    element: '#api-section',
                    intro: 'Edit the Walmart API details.',
                    position: 'bottom'
                  },
                 /* {
                    element: '#fba-integration-section',
                    intro: 'Check FBA Fulfillment settings.',
                    position: 'bottom'
                  },*/
                  {
                    element: '#return-location-section',
                    intro: 'Update Walmart Return Location Address.',
                    position: 'bottom'
                  },
                  {
                    element: '#product-setting',
                    intro: 'Globally apply product tax code,set custom product price and remove free shipping from all product',
                    position: 'bottom'
                  },
              /*    {
                    element: '#cancel-order-section',
                    intro: 'Manage Cancel Order Setting.',
                    position: 'bottom'
                  },*/
             /*     {
                    element: '#custom-pricing-section',
                    intro: 'Manage Product custom/dynamic pricing.',
                    position: 'bottom'
                  },*/
             /*     {
                    element: '#custom_price_csv_field',
                    intro: 'Select "Yes" to update price of each product.',
                    position: 'left'
                  },
                  {
                    element: '#custom_price_csv_label',
                    intro: "Get CSV file by clicking 'CLICK HERE'.",
                    position: 'bottom'
                  },
                  {
                    element: '#custom-title-section',
                    intro: 'Manage Product custom/dynamic Title Setting.',
                    position: 'bottom'
                  },
                  {
                    element: '#custom_title_csv_field',
                    intro: 'Select "Yes" to update title.',
                    position: 'left'
                  },
                  {
                    element: '#custom_title_csv_label',
                    intro: "Get CSV file by clicking 'CLICK HERE'.",
                    position: 'bottom'
                  },*/
                  {
                    element: '#email-subscription-section',
                    intro: 'Update Email Subscription Setting from here. Check the corresponding Checkbox to receive Mails and Uncheck to Not Receive Mails.',
                    position: 'bottom'
                  }
                ]
            });

            configQuicktour.start().oncomplete(function() {
              window.location.href = '<?= Data::getUrl("site/index") ?>';
          });
      });
  </script>
<?php endif; ?>

