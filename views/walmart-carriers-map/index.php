<?php
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartAttributeMap;
use frontend\modules\walmart\components\AttributeMap;

$this->title = 'Bigcommerce-Walmart Carrier Mapping';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-map-index content-section">	
  	<div class="form new-section">

	    <form id="attribute_map" method="post" action="<?= Data::getUrl('walmart-carriers-map/save') ?>">
	    	<div class="jet-pages-heading">
	    		<div class="title-need-help">
		    		<h3 class="Jet_Products_style"><?= Html::encode($this->title) ?></h3>
		    		<a class="help_jet" title="Need Help" target="_blank" href="<?= Yii::$app->request->baseUrl; ?>/walmart-marketplace/sell-on-walmart"></a>
		    	</div>
		    	<div class="product-upload-menu">
					<input type="submit" value="Submit"  class="btn btn-primary" />
				</div>
				<div class="clear"></div>
			</div>
			<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
			<div class="grid-view table-responsive">
				<table class="table table-striped table-bordered ced-walmart-custome-tbl">
					<thead>
						<tr>
							<th>Bigcommerce Carrier</th>
							<th>Walmart Carrier</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($mappings as $mapping){ ?>
						<tr>
							<td><input required type="text" class="shopfy-carrier form-control" name="carrier[shopify][]" value="<?= $mapping['shopify'] ?>"  /></td>
							<td>
								<select name="carrier[walmart][]">
								<?php
									foreach($carriers as $carrier){
										?>
										<option <?= $mapping['walmart']==$carrier?'selected="selected"':'' ?> value="<?= $carrier ?>"><?= $carrier ?></option>
										<?php
									} 
								?>
								</select>
							</td>
							<td>
								<button class="btn btn-primary" type="button" onclick="deleteMapping(this)">Delete</button>
							</td>
						</tr>
					<?php } ?>
						<tr id="add-mapping">
							<td></td>
							<td></td>
							<td>
								<button class="btn btn-primary" type="button" id="add-mapping-button">Add Mapping</button>
							</td>
						</tr>

					</tbody>
				</table>
			</div>	
		</form>
	</div>
</div>
<script>
	
	$script = '<td><input class="form-control" type="text" class="shopfy-carrier" name="carrier[shopify][]" /></td>\
						<td>\
							<select name="carrier[walmart][]">\
							<?php
								foreach($carriers as $carrier){
									?>\
									<option value="<?= $carrier ?>"><?= $carrier ?></option>\
									<?php
								} 
							?>\
							</select>\
						</td>\
						<td>\
							<button class="btn btn-primary" type="button" onclick="deleteMapping(this)">Delete</button>\
						</td>';
		document.getElementById('add-mapping-button').onclick=function(){
			var newTr = document.createElement("TR"); 
			newTr.innerHTML = $script;
			document.getElementById('add-mapping').parentNode.insertBefore(newTr,document.getElementById('add-mapping'));
		}
		function deleteMapping(element){
			element.parentNode.parentNode.parentNode.removeChild(element.parentNode.parentNode);
		}
</script>
<style>
	.center,.cat_root{
		text-align: center;
	}
	.cat_root .form-control{
		display: inline-block;
	}
	#add-mapping td {
    	width: 33%;
	}
</style>