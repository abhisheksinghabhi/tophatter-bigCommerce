<?php
use yii\helpers\Html;
$this->title = 'Shopify-Jet Category Mapping';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-map-index">
	<div style="margin-bottom: 10px">
    	<h3 class="Jet_Products_style"><?= Html::encode($this->title) ?></h3>
    	<a class="help_jet" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void(0);" title="Need Help"></a>
    </div>
    <div class="clear"></div>
	<form id="category_map" method="post" action="<?php echo \yii\helpers\Url::toRoute(['categorymap/save']) ?>">
		<input type="submit" value="Submit"  class="btn btn-primary"/>
		<div class="clear"></div>
		<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />	
		<table id="map_producttype" class="table table-striped table-bordered">
			<tr>
				<th>Id</th>
				<th>Product Type(shopify)</th>
				<th>Jet Category Name</th>
			</tr>
			<?php 
			$i=0;
			foreach($model as $value){
				$i++;?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $value->product_type; ?></td>
		  			<td>
						<select name="type[<?php echo $value->product_type ?>]" style="width:auto" class="form-control">
							<option value="">Please Select Category</option>
							<?php 
							foreach($data as $val){
								if($value->category_id==$val->category_id){?>							
									<option value="<?php echo $val->category_id;?>" selected="selected"><?php echo $val->title; ?></option>
							<?php }else{?>	
									<option value="<?php echo $val->category_id;?>"><?php echo $val->title; ?></option>
							<?php }
							}
							?>
						</select>
					</td>				
				</tr>
				<?php 
			}
			?>
		</table>
	
	</form>
	<div class="container text-center">
		<!-- Large modal -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
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
				  <!-- Indicators -->
					<!-- <ol class="carousel-indicators">
					  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					   <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
					   <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
					</ol> -->
				  <!-- Controls -->
				  <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				  </a> -->
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
