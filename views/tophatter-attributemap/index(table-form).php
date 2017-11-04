<?php
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartAttributeMap;

$this->title = 'Shopify-Walmart Attribute Mapping';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-map-index">	
    <form id="attribute_map" method="post" action="<?= Data::getUrl('walmart-attributemap/save') ?>">
    	<div class="jet-pages-heading">
	    	<h3 class="Jet_Products_style"><?= Html::encode($this->title) ?></h3>
			<input type="submit" value="Submit"  class="btn btn-primary" />
			<div class="clear"></div>
		</div>
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
		<div class="grid-view">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Product Type(shopify)</th>
						<th>Walmart Attributes</th>
						<th>Walmart Attribute Value</th>
					</tr>
				</thead>
				<tbody>
			<?php 
			if(count($attributes)) {
			  foreach ($attributes as $key=>$attribute) {

				$options = [];
				if(isset($attribute['shopify_attributes']) && count($attribute['shopify_attributes'])){
					foreach ($attribute['shopify_attributes'] as $shopify_attr) {
						$options[] = $shopify_attr;
					}
				}

				$rowSpanFlag = true;
				if(count($attribute['walmart_attributes']['attributes']))
				{
					foreach ($attribute['walmart_attributes']['attributes'] as $wal_attr => $value) {
						$mapped_value = '';
						if(isset($attribute['mapped_values'][$wal_attr])) {
							$valueType = $attribute['mapped_values'][$wal_attr]['type'];
							$mapped_value = $attribute['mapped_values'][$wal_attr]['value'];
						}
			?>
						<tr>
			<?php 		if($rowSpanFlag) {
							$rowSpanFlag = false;
			?>
							<td rowspan="<?= count($attribute['walmart_attributes']['attributes']) ?>"><?= $attribute['product_type'] ?></td>
			<?php 		}	?>
							<td><?= $wal_attr ?></td>
							<td>
			<?php
							if(isset($attribute['walmart_attributes']['attribute_values'][$wal_attr])) {
			?>
								<select name="walmart[<?= $attribute['product_type']?>][<?= $wal_attr ?>]">
									<option value=""></option>
			<?php
								$walAttrValue = explode(',', $attribute['walmart_attributes']['attribute_values'][$wal_attr]);
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
								<span class="text-validator">Select Value of '<?= $wal_attr ?>' attribute which will be used for all products '<?= $attribute['product_type']; ?>' Product type.</span>
			<?php
							} else {
			?>				   <p>
								<select multiple name="walmart[<?= $attribute['product_type']?>][<?= $wal_attr ?>][]">
			<?php
								foreach ($options as $value) {
			?>
									<option value="<?= $value ?>" 
									<?php if(in_array($value,explode(',', $mapped_value)) && $valueType==WalmartAttributeMap::VALUE_TYPE_SHOPIFY)
											{ echo 'selected="selected"'; } ?>
									><?= $value ?></option>
			<?php
									
								}
			?>
								</select>
								<span class="text-validator">Select the appropriate shopify options for '<?= $wal_attr ?>' attribute from the above list of shopify options.</span>
							   </p>
							   <span>OR</span>
							   <p>
								<input type="text" value="<?php if($valueType==WalmartAttributeMap::VALUE_TYPE_TEXT){echo $mapped_value;} ?>" 
								name="walmart[<?= $attribute['product_type']?>][<?= $wal_attr ?>][text]" />
							   	<span class="text-validator">Enter any value for '<?= $wal_attr ?>' attribute if there is no similar option in shopify.</span>
							   </p>
			<?php
							}
			?>
							</td>
						</tr>
			<?php
					}
				}
			  }
			}
			?>
				</tbody>
			</table>
		</div>	
	</form>
</div>
<style>
	.center,.cat_root{
		text-align: center;
	}
	.cat_root .form-control{
		display: inline-block;
	}
	
</style>