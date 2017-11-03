<?php
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartAttributeMap;
use frontend\modules\walmart\components\AttributeMap;
use frontend\modules\walmart\components\WalmartCategory;

$this->title = 'BigCommerce-Walmart Attribute Mapping';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="attribute-map-index content-section">	
    <form id="attribute_map" class="form new-section" method="post" action="<?= Data::getUrl('walmart-attributemap/save') ?>">
    	<div class="jet-pages-heading">
	    	<h3 class="Jet_Products_style"><?= Html::encode($this->title) ?></h3>
			<input type="submit" value="Submit"  class="btn btn-primary" />
			<div class="clear"></div>
		</div>
		
		<div class="jet-pages-heading">
			<p class="legend-text">
		    	<span style="border: 1px solid #EFC959; padding: 0 5px; margin-right: 10px; color: #EFC959;" class="">Variant</span>
		    	<b>:</b>
		    	<span style="color: #333">Attribute Can be Used for Creating Variants on Walmart.</span>
		  	</p>
			<p class="legend-text">
			    <span style="border: 1px solid red; padding: 0 5px; margin-right: 10px; color: red;" class="">Required</span>
			  	<b>:</b>
			    <span style="color: #333">Attribute is Required on Walmart.</span>
			</p>
		</div>

		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
		<div class="grid-view table-responsive">
			<table class="table table-striped table-bordered ced-walmart-custome-tbl">
				<thead>
					<tr>
					    <th></th>
						<th>Product Type(BigCommerce)</th>
						<!-- <th>Walmart Attributes</th> -->
						<th>Walmart-Bigcommerce Attributes</th>
						<!-- <th>Walmart Attribute Value</th> -->
					</tr>
				</thead>
				<tbody>
			<?php 
			if(count($attributes)) {
			   
			  $noAttrFlag = false;
			  foreach ($attributes as $key=>$attribute) {

				$options = [];
                  $result = $attribute['walmart_attributes']['variant_attributes'];

                  if(isset($attribute['shopify_attributes']) && count($attribute['shopify_attributes'])){
					foreach ($attribute['shopify_attributes'] as $shopify_attr) {
						$options[] = $shopify_attr;
					}
				}

				if(count($attribute['walmart_attributes']['attributes']))
				{
				    
					$required_attributes = $attribute['walmart_attributes']['required_attrs'];
					//$attribute['walmart_attributes']['attribute_values']['unit'] = AttributeMap::getUnitAttributeValues();
			?>
					<tr>
					    <td><input type="checkbox" name="producttype[]" value=<?php echo $attribute['product_type']?>></td>
						<td><?= $attribute['product_type'] ?></td>
						<!-- <td colspan="2"> -->
						<td>
							<table class="attrmap-inner-table">
								<tr>
									<th>Walmart</th>
									<th>BigCommerce</th>
								</tr>
			<?php
					foreach ($attribute['walmart_attributes']['attributes'] as $wal_attr=>$val) {
						$mapped_value = '';
						$valueType = '';
						if(isset($attribute['mapped_values'][$wal_attr])) {
							$valueType = $attribute['mapped_values'][$wal_attr]['type'];
							$mapped_value = $attribute['mapped_values'][$wal_attr]['value'];
						}
			?>
								<tr>
									<td>
										<?= $wal_attr ?>
										<p>
							<?php
                                if(array_key_exists($wal_attr, $result)) { ?>
											<span style="border: 1px solid #EFC959; padding: 0 5px; margin-right: 10px; color: #EFC959" class="">Variant</span>
							<?php 	}
									if(in_array($wal_attr, $required_attributes)) { ?>
											<!-- <span class="text-validator">This Attribute is Required.</span> -->
											<span style="border: 1px solid red; padding: 0 5px; margin-right: 10px; color: red" class="">Required</span>
							<?php   }  ?>
										</p>
									</td>
									<td>
			<?php
							
							$selectTypeFlag = false;
							if(isset($attribute['walmart_attributes']['attribute_values'][$wal_attr])) {
								$selectTypeFlag = true;
								$walmart_attribute_values = $attribute['walmart_attributes']['attribute_values'][$wal_attr];
							}

							if(!$selectTypeFlag && strpos($wal_attr, AttributeMap::ATTRIBUTE_PATH_SEPERATOR) !== false)
							{
								$wal_attrs = explode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $wal_attr);
								if(is_array($wal_attrs)) {
									foreach ($wal_attrs as $_wal_attr) {
										if(isset($attribute['walmart_attributes']['attribute_values'][$_wal_attr])) {
											$selectTypeFlag = true;
											$walmart_attribute_values = $attribute['walmart_attributes']['attribute_values'][$_wal_attr];
										}
									}
								}
							}


							if($selectTypeFlag) {
			?>
								<select name="walmart[<?= $attribute['product_type']?>][<?= $wal_attr ?>]">
									<option value=""></option>
			<?php
//								$walAttrValue = explode(',', $walmart_attribute_values);
                                $walAttrValue = $walmart_attribute_values;
								foreach ($walAttrValue as $value) {
			?>
									<option value="<?= $value ?>" 
									<?php if(in_array($value,explode(',', $mapped_value)) && $valueType==WalmartAttributeMap::VALUE_TYPE_WALMART)
										  { echo 'selected="selected"'; } ?>
									><?= $value ?></option>
			<?php
								}
			?>
								</select>
								<span class="text-validator">Select Value of '<?= $wal_attr ?>' attribute which will be used for all products under '<?= $attribute['product_type']; ?>' Product type.</span>
			<?php
							} else {
								if(count($options)) {
			?>				

			<!-- Comment Multi Select and Add Checkboxes -->   
							<!-- <p>
								<select multiple name="walmart[<?= $attribute['product_type']?>][<?= $wal_attr ?>][]">
			<?php
								  foreach ($options as $option) {
			?>
									<option value="<?= $option ?>" 
									<?php if(in_array($option,explode(',', $mapped_value)) && $valueType==WalmartAttributeMap::VALUE_TYPE_SHOPIFY)
											{ echo 'selected="selected"'; } ?>
									><?= $option ?></option>
			<?php
									
								  }
			?>
								</select> -->

							<!-- Code for Checkbox Start -->
			<?php
							foreach ($options as $option) {
			?>							
								<div class="checkbox_options">
									<input type="checkbox" value="<?= $option ?>" name="walmart[<?= $attribute['product_type']?>][<?= $wal_attr ?>][]" <?php if(in_array($option,explode(',', $mapped_value)) && $valueType==WalmartAttributeMap::VALUE_TYPE_SHOPIFY)
											{ echo 'checked="checked"'; } ?>>
									<label><?= $option ?></label>
								</div>
			<?php
									
							}
			?>					<div class="clear"></div>
							<!-- End -->

								<span class="text-validator">Select the appropriate BigCommerce options for '<?= $wal_attr ?>' attribute from the above list of Bigcommerce options.</span>
							   <!-- </p> -->
								<div class="signle-line-1"><span>OR</span></div>
			<?php 
								}
			?>
							   <p>
								<input type="text" value="<?php if($valueType==WalmartAttributeMap::VALUE_TYPE_TEXT){echo $mapped_value;} ?>" 
								name="walmart[<?= $attribute['product_type']?>][<?= $wal_attr ?>][text]" />
							   	<span class="text-validator">Enter any value for '<?= $wal_attr ?>' attribute if there is no similar option in Bigcommerce
							   		.</span>
							   </p>
			<?php
							}
			?>
									</td>
								</tr>	
			<?php
					}
			?>
							</table>
						</td>
					</tr>
			<?php
				}
				elseif(!$noAttrFlag)
				{
					$noAttrFlag = true;
			?>
					<tr>
						<td colspan="3">No Mapped Walmart Category has Required Attributes to Map.</td>
					</tr>
			<?php
				}
			  }
			}
			else
			{
			?>
					<tr>
						<td colspan="3">Bigcommerce Product Types are not Mapped With Walmart Categories.</td>
					</tr>
			<?php
			}
			?>
				</tbody>
			</table>
		</div>
	
	</form>
</div>
	<?php
	/*	echo \yii\widgets\LinkPager::widget([
        'pagination' => $pagination,
        ]);*/
    ?>
<style>
	.center,.cat_root{
		text-align: center;
	}
	.cat_root .form-control{
		display: inline-block;
	}

	.attrmap-inner-table .checkbox_options {
	    float: left;
	    margin-right: 8px;
	    min-width: 30%;
	}
	.attrmap-inner-table tr td {
    	width: auto;
	}
	.attrmap-inner-table tr td:first-child {
    	width: auto;
	}
	.signle-line-1 {
	  border-bottom: 1px solid #d4d4d4;
	  margin-bottom: 25px;
	  text-align: center;
	}
	.signle-line-1 span {
	  background: #fff none repeat scroll 0 0;
	  display: inline-block;
	  position: relative;
	  top: 8px;
	  width: 32px;
	  font-weight: bold;
	}
</style>