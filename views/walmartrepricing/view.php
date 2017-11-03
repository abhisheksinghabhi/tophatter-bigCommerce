
application/x-httpd-php view.php ( PHP script text )

<?php 
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\WalmartProduct;
use frontend\modules\walmart\components\WalmartRepricing;

$this->title = 'Walmart Repricing Section';
?>

<div class="content-section">
    <div class="form new-section">
    	<form method="post" id= "repricing_form" action="<?= Data::getUrl('walmartrepricing/save') ?>" name="">
		    <div class="jet-pages-heading">
		        <div class="title-need-help">
		            <h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
		            <!-- <a class="help_jet" target="_blank" href="https://shopify.cedcommerce.com/integration/walmart-marketplace/sell-on-walmart" title="Need Help"></a> -->
		        </div>
		        <div class="product-upload-menu">
			        	<!-- <button type="button" id="instant-help" class="btn btn-primary">Help</button> -->
			        	<a href="<?= Data::getUrl('walmartrepricing/index');?>">
	                            <button class="btn btn-primary uptransform" type="button" title="Back"><span>Back</span></button>
	                    </a>
	            		
			            <input type="button" name="submit" value="Save" onclick ="saveData()" class="btn btn-primary"/>
		        </div>
				<div class="clear"></div>
				<div class="v_success_msg alert-success alert" style="display:none;"></div>
				<div class="v_error_msg alert alert-danger" style="display:none;"></div>
			</div>

			<div class="jet-pages-heading">
				<p class="legend-text min-price">
			    	<b>Min Price :</b>
			    	
			    	<span style="color: #333">Minimun price at which you want your product to be Sold.</span>
			  	</p>
				<p class="legend-text max-price">
				    <b>Max Price :</b>
				  	
				    <span style="color: #333">Maximum price at which you want your product to be Sold.</span>
				</p>
				<p class="note legend-text"><b>Note :</b> For deleting reprice make both min price & max price blank. </p>
			</div>
			<section class="cd-faq">
			<div class="mainrow cd-faq-items">

			<ul class="reprice-header">
				<li>Serial No</li>
				<li>SKU</li>
				<li>BuyBox Winner</li>
				<li>Repricing</li>
			</ul>
			<ul id="basics" class="cd-faq-group">
			<?php 	

			$products = WalmartProduct::getProductInfo(implode(',', $productIds));
			
			//print_r($products);die;
			if($products)
			{
				$key = 0;
				foreach ($products as $product) 
				{
					$title = empty($product['product_title'])?$product['title']:$product['product_title'];
					$price = empty($product['product_price'])?$product['price']:$product['product_price'];
					?>
		
					<?php
					if($product['type'] == 'variants')
					{?>


				<!-- <div class="row prod<?=$key?> cd-faq-content"> -->
				<?php
						$variants = WalmartProduct::getVariantsProduct($product['option_id']);
						if($variants)
						{
							$k = 0;
							foreach ($variants as $variant) 
							{
				            $price = empty($variant['option_prices'])?$variant['option_price']:$variant['option_prices'];
				            $your_price_json = json_decode($variant['your_price'],true);
				            if(isset($product['send_price']) && $product['send_price']){
								$send_price = json_decode($product['send_price'],true);
							}
				            $best_price_json = json_decode($variant['best_prices'],true);

				           
								?>
								<li class="acordian_li">
									<ul class="acordian_ul">
										<li><?php echo $key+1;?></li>
										<li><?= $product['sku'] ?></li>
										<li><?php  
								   								if($product['buybox']==0){?>
								   								<span class="no" title="NO"></span>
								   								<?}else{?>
								   									<span class="yes" title='YES'></span>
								   									<?}?></li>
										<?php if(isset($product['repricing_status']) && $product['repricing_status']){?>
								   			<li>Enable</li>
								   			<?php }
								   			else { ?>
								   			<li>Disable</li>
								   			<?php } ?>
										<li>
											<a class="cd-faq-trigger a-repricing" href="#0" id=<?= $key ?>></a>
											<!-- <a class="cd-reprice-trigger" href="#0"></a> -->
									
										</li>
									</ul>
									<div class="row prod<?=$key?>" style="display: none">

										<div class="col-md-6 col-lg-6">
											<div class="error"></div>
											<div class="ced-entry-heading-wrapper">
												<div class="entry-edit-head">
													<h4 class="fieldset-legend">Product Information</h4>
												</div>
												<div class="fieldset enable_api" id="api-section">
													<div class="row">
													<div class="col-md-12">
													<table>
														<tr>
															<td><strong>SKU</strong></td>
															<td><strong><?= $variant['option_sku'] ?></strong></td>
														</tr>
														<tr>
															<td>Product Title</td>
															<td><?= $variant['option_title'] ?></td>
														</tr>
														<tr>
															<td>Barcode</td>
															<td><?php if(isset($product['upc'])){
																echo $product['upc'];
																}?></td>
														</tr>
														<tr>
															<td>Shopify Product Type</td>
															<td><?= $product['product_type'] ?></td>
														</tr>
														<tr>
															<td>Type</td>
															<td><?= $product['type'] ?></td>
														</tr>				
														 <?php 
																    	if(!isset($your_price_json['price'])) 
																    	{
																    ?>
																    		<tr><td>Your Price</td>
																    		<td class='yourprice'><?= $variants['option_price'] ?></td></tr>
																    		
																    <?php
																    	}
																    	else
																    	{
																    ?>
												   					<!-- <td>Your Price :</td> -->
												   					<tr>
												   					<td>Your Price</td>
																	<td class='yourprice'><?= $your_price_json['price'] ?></td>
																	</tr>
												   					<!-- <td>Your Ship Price :</td> -->
												   					<tr>
												   					<td>Your Ship Price</td>
																	<td><?= $your_price_json['ship'] ?></td>
																	</tr>		
																	<?php
																    	}
																	?>
															
														
														<tr>
															
														</tr>
														<tr>
															<td>status</td>
															<td><?= $variant['status'] ?></td>
														</tr>
														<tr>
															<td>Buy Box Winner :</td>
								   						<?php  
						   								if($variant['buybox']==0){?>
						   								<td class="no"><span>NO</span></td>
						   								<?}else{?>
						   									<td class="yes"><span>YES</span></td>
						   									<?}?>
														</tr>

													</table>
													<div class="left_boxinfo">
														    <?php 
														    	if(isset($variant['option_sku'])) {
														    	foreach ($best_price_json as $bestkey => $bestvalue) {?>
														    	<div class="row">
															    	<div class="col-lg-6 col-md-6 col-sm-6">
																    	<div class="grey-bg">
																	    	<table>
																				<tr>
																					<td>BuyBox Price :</td>
																					<td><?= $bestvalue['buybox_item_price'] ?></td>
																				</tr>
																				<tr>
																					<td>BuyBox Ship Price :</td>
																					<td><?= $bestvalue['buybox_ship_price'] ?></td>
																				</tr>
																			</table>	    	
																    	</div>
															    	</div>
															    	<div class="col-lg-6 col-md-6 col-sm-6">
															    		<div class="purple-bg">
															    			<table>
																				<tr>
																					<td>2nd Best Offer Price :</td>
																					<td><?= $best_price_json[1]['offer2_item_price'] ?></td>
																				</tr>
																				<tr>
																					<td>2nd Best Offer Ship Price :</td>
																					<td><?= $best_price_json[1]['offer2_ship_price'] ?></td>
																				</tr>
																			</table>	
															    		</div>
															    	</div>
														    	</div>
														    	<div class="row">
															    	<div class="col-lg-6 col-md-6 col-sm-6">
															    		<div class="purple-bg">
															    			<table>
																				<tr>
																					<td>3rd Best Offer Price :</td>
																					<td><?= $best_price_json[2]['offer3_item_price'] ?></td>
																				</tr>
																				<tr>
																					<td>3rd Best Offer Ship Price :</td>
																					<td><?= $best_price_json[2]['offer3_ship_price'] ?></td>
																				</tr>
																			</table>
															    		</div>
															    	</div>
															    	<div class="col-lg-6 col-md-6 col-sm-6">
															    		<div class="grey-bg">
															    			<table>
																				<tr>
																					<td>4th Best Offer Price :</td>
																					<td><?= $best_price_json[3]['offer4_item_price'] ?></td>
																				</tr>
																				<tr>
																					<td>4th Best Offer Ship Price :</td>
																					<td><?= $best_price_json[3]['offer4_ship_price'] ?></td>
																				</tr>
																			</table>
															    		</div>
															    	</div> 
														    	</div>			
														    <?php
														    	break;} 	}
														    	else {
												   					echo "<b>This Product(Sku) not Found/Uploaded to Walmart.</b>";
												   				} 
												   			?>
														    </div>
													</div>
													</div>
												</div>
											</div>
											<input type="hidden" name="data[<?= $key?>][product_id]" value="<?= $product['product_id'] ?>" />
											<input type="hidden" name="data[<?= $key?>][variant][<?= $k ?>][option_id]" value="<?= $variant['option_id'] ?>" />
										</div>
										<div class="col-md-6">
															
												<div class="grey-bg updated-price-section">
													<div class="entry-edit-head">
														<h4 class="">Last 3 updated price on walmart</h4>
													</div>
													<div class="row">
														<div class="col-md-12 col-lg-12">
															<div class="grey-bg first_price">

															<?php if(isset($send_price) && isset($send_price[0])){?>
																<span class="current_price"><i class="fa fa-check"></i></span>

																<span class="time"><?php 
																$timestamp = 
																	$time = $send_price[0]['time'];
																	echo $time;?></span>
																
																<h3><?php if($variant['buybox']!=0){
																	$price1 = $send_price[0]['price'];
																	echo $price1;
																	}
																	else{
																		$price1=$send_price[0]['price'];
																		echo $price1;
																	}
																		?></h3>
																<span><?=$send_price[0]['date']?></span>
															<?php }
															else{?>
																<span class="current_price"><i class="fa fa-check"></i></span>

																<span class="time"><?php 
																$timestamp = strtotime(date('H:i')) + 3*60*60;
																	$time = date('H:i A', $timestamp);
																	echo $time;?></span>
																
																<h3><?php if($variant['buybox']!=0){
																	$price1 = $bestvalue['buybox_item_price'];
																	echo $price1;
																	}
																	else{
																		$price1=$price;
																		echo $price1;
																	}
																		?></h3>
																<span><?=date("m.d.y")?></span>
																<?php }?>
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="grey-bg second_price">
															<?php if(isset($send_price) && isset($send_price[1])){?>

																<span class="time"><?php 
																	$time = $send_price[1]['time'];
																	echo $time;?></span>
																<h3><?= $send_price[1]['price'];?></h3>
																<span><?=$send_price[1]['date']?></span>
																<?php }
																else{?>
																<span class="time"><?php $timestamp = strtotime(date('H:i')) + 2*60*60;
																	$time = date('H:i A', $timestamp);
																	echo $time;?></span>
																<h3><?= $price1;?></h3>
																<span><?=date("m.d.y")?></span>
																<?php }?>
															</div>
														</div>
														<div class="col-md-6 col-lg-6">
															<div class="grey-bg third_price">
															<?php if(isset($send_price) && isset($send_price[2])){?>
																	<span class="time"><?php 
																	$time = $send_price[2]['time'];
																	echo $time;?></span>
																<h3><?= $send_price[2]['price'];?></h3>
																<span><?=$send_price[2]['date']?></span>
																<?php }
																else{ ?>

																	<span class="time"><?php $timestamp = strtotime(date('H:i')) + 60*60;
																		$time = date('H:i A', $timestamp);
																		echo $time;?></span>
																	<h3><?= $price1;?></h3>
																	<span><?=date("m.d.y")?></span>
																<?php }?>
															</div>
														</div>

													</div>
												</div>
												<div class="grey-bg set_price">
																<div class="first">

																<div class="row">
																	<div class="col-md-12">
																		<ul>
																			<li>
																				Want to Perform Repricing For this Product?
																			</li>
																			<li>
																				<select name="data[<?= $key?>][variant][<?= $k ?>][enable_repricing]" class="form-control">
																				<option value=""></option>
																				<option value="1" <?php if($variant['repricing_status']=='1')
																		echo 'selected="selected"';?>>yes</option>
																				<option value="0" <?php if($variant['repricing_status']=='0')
																		echo 'selected="selected"';?>>no</option>
																			</select>
																			</li>
																		</ul>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
																		<ul>
																			<li>
																				Min Price
																			</li>
																			<li>
																				<input type="text" name="data[<?= $key?>][variant][<?= $k ?>][min_price]" value="<?=$variant['min_price'] ?>" class="form-control min" id="min" />
																			</li>
																		</ul>
																	</div>
																	<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
																		<ul>
																			<li>
																				Max Price
																			</li>
																			<li>
																				<input type="text" name="data[<?= $key?>][variant][<?= $k ?>][max_price]" value="<?=$variant['max_price'] ?>" class="form-control max" />
																			</li>
																		</ul>
																	</div>
																</div>
																</div>


																	<!-- <li>
																		Want to Perform Repricing For this Product?
																	</li>
																	<li>
																		<select name="data[<?= $key?>][variant][<?= $k ?>][enable_repricing]" class="form-control">
																		<option value=""></option>
																		<option value="1" <?php if($variant['repricing_status']=='1')
																echo 'selected="selected"';?>>yes</option>
																		<option value="0" <?php if($variant['repricing_status']=='0')
																echo 'selected="selected"';?>>no</option>
																	</select>
																	</li>
																	<li>
																		Min Price
																	</li>
																	<li>
																		<input type="text" name="data[<?= $key?>][variant][<?= $k ?>][min_price]" value="<?=$variant['min_price'] ?>" class="form-control" />
																	</li>
																	<li>
																		Max Price
																	</li>
																	<li>
																		<input type="text" name="data[<?= $key?>][variant][<?= $k ?>][max_price]" value="<?=$variant['max_price'] ?>" class="form-control" />
																	</li>
																</ul> -->
															</div>
										</div>
									</div>
								</li>
								
				<!-- </div> -->
								<?php $k++?>
					<?php }
						}
					}
					elseif($product['type'] == 'simple')
					{

						$price = empty($product['product_price'])?$product['price']:$product['product_price'];
						if(isset($product['your_price'])){
							$price_json = json_decode($product['your_price'],true);
						}
						if(isset($product['send_price']) && $product['send_price']){
							$send_price = json_decode($product['send_price'],true);
						}
						$best_price_json = json_decode($product['best_prices'],true);
?>
				<li class="acordian_li">
					<ul class="acordian_ul">
						<li><?php echo $key+1;?></li>
						<li><?= $product['sku'] ?></li>
						<li><?php  
				   								if($product['buybox']==0){?>
				   								<span class="no" title='NO'></span>
				   								<?}else{?>
				   									<span class="yes" title='YES'></span>
				   									<?}?></li>
				   		<?php if(isset($product['repricing_status']) && $product['repricing_status']){?>
				   			<li>Enable</li>
				   			<?php }
				   			else { ?>
				   			<li>Disable</li>
				   			<?php } ?>
						
						<li class="anchor">
							<a class="cd-faq-trigger a-repricing" href="#0" id=<?= $key ?>></a>
			
						</li>
					</ul>
					<div class="row prod<?=$key?>" style="display: none">
						<div class="col-md-6 col-lg-6">
						<div class="error"></div>
							<div class="ced-entry-heading-wrapper">
								<div class="entry-edit-head">
									<h4 class="fieldset-legend">Product Information</h4>
								</div>
								<div class="fieldset enable_api" id="api-section">
									<input type="hidden" name="data[<?= $key?>][product_id]" value="<?= $product['product_id'] ?>" />
									<div class="row">
												<div class="col-md-12">
												<table>
													<tr>
														<td><strong>SKU</strong></td>
														<td><strong><?= $product['sku'] ?></strong></td>
													</tr>
													<tr>
														<td>Product Title</td>
														<td><?= $product['title'] ?></td>
													</tr>
													<tr>
														<td>Barcode</td>
														<td><?php if(isset($product['upc'])){
															echo $product['upc'];
															}?></td>
													</tr>
													<tr>
														<td>Shopify Product Type</td>
														<td><?= $product['product_type'] ?></td>
													</tr>
													<tr>
														<td>Type</td>
														<td><?= $product['type'] ?></td>
													</tr>
													 <?php 
															    	if(!isset($price_json['price'])) 
															    	{
															    ?>
															    		<tr><td>YOUR PRICE</td>
															    		<td class='yourprice'><?= $price ?></td></tr>
															    		
															    <?php
															    	}
															    	else
															    	{
															    ?>
											   					<!-- <td>Your Price :</td> -->
											   					<tr>
											   					<td>YOUR PRICE</td>
																<td class='yourprice'><?= $price_json['price'] ?></td>
																</tr>
											   					<!-- <td>Your Ship Price :</td> -->
											   					<tr>
											   					<td>Your Ship Price</td>
																<td><?= $price_json['ship'] ?></td>
																</tr>		
																<?php
															    	}
																?>
														
													
													<tr>
														
													</tr>
													<tr>
														<td>status</td>
														<td><?= $product['status'] ?></td>
													</tr>
													<tr>
													<td>Buy Box Winner :</td>
													<?php  
					   								if($product['buybox']==0){?>
					   								<td class="no"><span>NO</span></td>
					   								<?}else{?>
					   									<td class="yes"><span>YES</span></td>
					   									<?}?>
												</tr>
												</table>
												 	<div class="left_boxinfo">
													<?php 
											   		if(isset($product['sku'])) {
											   			foreach ($best_price_json as $bestkey => $bestvalue) {
											   				
											   	?>
											   				<div class="row">
														    	<div class="col-lg-6 col-md-6 col-sm-6">
														    		<div class="grey-bg">
														    			<table>
																			<tr>
																				<td>BuyBox Price :</td>
																				<td><?= $bestvalue['buybox_item_price'] ?></td>
																			</tr>
																			<tr>
																				<td>BuyBox Ship Price :</td>
																				<td><?= $bestvalue['buybox_ship_price'] ?></td>
																			</tr>
																		</table>
														    		</div>
														    	</div>
														    	<div class="col-lg-6 col-md-6 col-sm-6">
														    		<div class="purple-bg">
														    			<table>
																			<tr>
																				<td>2nd Best Offer Price :</td>
																				<td><?= $best_price_json[1]['offer2_item_price'] ?></td>
																			</tr>
																			<tr>
																				<td>2nd Best Offer Ship Price :</td>
																				<td><?= $best_price_json[1]['offer2_ship_price'] ?></td>
																			</tr>
																		</table>
														    		</div>
														    	</div>
													    	</div>
													    	<div class="row">
														    	<div class="col-lg-6 col-md-6 col-sm-6">
														    		<div class="purple-bg">
														    			<table>
																			<tr>
																				<td>3rd Best Offer Price :</td>
																				<td><?= $best_price_json[2]['offer3_item_price'] ?></td>
																			</tr>
																			<tr>
																				<td>3rd Best Offer Ship Price :</td>
																				<td><?= $best_price_json[2]['offer3_ship_price'] ?></td>
																			</tr>
																		</table>
														    		</div>
														    	</div>
														    	<div class="col-lg-6 col-md-6 col-sm-6">
														    		<div class="grey-bg">
														    			<table>
																			<tr>
																				<td>4th Best Offer Price :</td>
																				<td><?= $best_price_json[3]['offer4_item_price'] ?></td>
																			</tr>
																			<tr>
																				<td>4th Best Offer Ship Price :</td>
																				<td><?= $best_price_json[3]['offer4_ship_price'] ?></td>
																			</tr>
																		</table>
														    		</div>
														    	</div> 
													    	</div>			
													    <?php
													    	break;}}
											   		else {
											   			echo "<b>This Product(Sku) not Found/Uploaded to Walmart.</b>";
											   		} 
											   	?>
											   	</div>
												</div>
												</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">			   
													<div class="updated-price-section">
														<div class="entry-edit-head">
															<h4 class="">Last 3 updated price on walmart</h4>
														</div>
														<div class="row">
															<div class="col-md-12 col-lg-12">
																<div class="grey-bg first_price">
																<?php
																if(isset($send_price) && isset($send_price[0])) {?>
																<span class="current_price"><i class="fa fa-check"></i></span>
																	<span class="time"><?php 
																		$time = $send_price[0]['time'];
																		echo $time;?></span>
																	
																	<h3><?php if($product['buybox']!=0){
																	$price1 = $send_price[0]['price'];
																	echo $price1;
																	}
																	else{
																		$price1 =$send_price[0]['price'];
																		echo $price1;
																	}
																		?></h3>
																	<span><?=$send_price[0]['date']?></span>
																	<?php }
																	else{?>
																	<span class="current_price"><i class="fa fa-check"></i></span>
																	<span class="time"><?php $timestamp = strtotime(date('H:i')) + 3*60*60;
																		$time = date('H:i A', $timestamp);
																		echo $time;?></span>
																	
																	<h3><?php if($product['buybox']!=0){
																	$price1 = $bestvalue['buybox_item_price'];
																	echo $price1;
																	}
																	else{
																		$price1 = $price_json['price'];
																		echo $price1;
																	}
																		?></h3>
																	<span><?=date("m.d.y")?></span>
																	<?php }?>
																</div>
															</div>
															<div class="col-md-6 col-lg-6">
																<div class="grey-bg second_price">
																<?php if(isset($send_price) && isset($send_price[1])){?>
																	<span class="time"><?php 
																		$time = $send_price[1]['time'];
																		echo $time;?></span>
																	<h3><?= $send_price[1]['price'];?></h3>
																	<span><?=$send_price[1]['date']?></span>
																	 <?php }
																	 else{?>

																	<span class="time"><?php $timestamp = strtotime(date('H:i')) + 2*60*60;
																		$time = date('H:i A', $timestamp);
																		echo $time;?></span>
																	<h3><?= $price1;?></h3>
																	<span><?=date("m.d.y")?></span>
																	<?php }?>
																</div>
															</div>
															<div class="col-md-6 col-lg-6">
																<div class="grey-bg third_price">
																<?php if(isset($send_price) && isset($send_price[2])) {?>
																	<span class="time"><?php 
																		$time = $send_price[2]['time'];
																		echo $time;?></span>
																	<h3><?= $send_price[2]['price'];?></h3>
																	<span><?=$send_price[2]['date']?></span>
																	<?php }
																	else{?>
																	<span class="time"><?php $timestamp = strtotime(date('H:i')) + 60*60;
																		$time = date('H:i A', $timestamp);
																		echo $time;?></span>
																	<h3><?= $price1;?></h3>
																	<span><?=date("m.d.y")?></span>
																	<?php }?>
																</div>
															</div>
														</div>
													</div>
													<div class="grey-bg set_price">
																	<div class="first">
																	<div class="row">
																		<div class="col-md-12">
																			<ul>
																				<li>
																					Want to Perform Repricing For this Product?
																				</li>
																				<li>
																					<select name="data[<?= $key?>][enable_repricing]" class="form-control">
																			<option value=""></option>
																			<option value="1" <?php if($product['repricing_status']=='1')
																			echo 'selected="selected"';?>>yes</option>
																			<option value="0" <?php if($product['repricing_status']=='0')
																			echo 'selected="selected"';?>>no</option>
																		</select>
																				</li>
																			</ul>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
																			<ul>
																				<li>
																					Min Price
																				</li>
																				<li>
																					<input type="text" name="data[<?= $key?>][min_price]" class="form-control min" value ="<?=$product['min_price']?>"/>
																				</li>
																			</ul>
																		</div>
																		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 ">
																			<ul>
																				<li>
																					Max Price
																				</li>
																				<li>
																					<input type="text" name="data[<?= $key?>][max_price]" class="form-control max" value ="<?=$product['max_price']?>" />
																				</li>
																			</ul>
																		</div>
																	</div>
																	</div>
														</div>
						</div>

					</div>
				</li>
	<?php 				}
				$key++;
					}
				}
				else
				{
					echo "No Products Found for update.";
				}
	?>

	</ul>
</div>
</section>
		</form>
	</div>
</div>
<script type="text/javascript">
	$('.grey-bg input').each(function () {
           var type = $(this).attr("type");
           if(type == "text"){
           	console.log($(this).val());
            $(this).after('<span class="glyphicon glyphicon glyphicon-pencil"></span>');
            }
        });
	function saveData() {

		var key = <?=$key?>;
		var i=0;
		var save = true;
		for(i=0;i<=key-1;i++){
			var min =parseFloat($(".prod"+i+" .min").val());
			var max =parseFloat($(".prod"+i+" .max").val());
			var your_price =parseFloat($(".prod"+i+" table .yourprice").html());
			if(min!=''){
				if(max==''){
				var save = false;
				$(".prod"+i+" .error").html("<span>Max price not set</span>");
				//$(".prod"+i+"").css("border-color", "red");
				$(".prod"+i+"").closest('li').css("border", "red");
				j$('.v_success_msg').hide();
				continue;
				}
			}
			if(max!=''){
				if(min==''){
					var save = false;
					$(".prod"+i+" .error").html("<span>Min price not set</span>");
					$(".prod"+i+"").closest('li').css("border", "solid red 1px");
					j$('.v_success_msg').hide();
					continue;
				}
			}
			if(min>max){
				var save = false;
				$(".prod"+i+" .error").html("<span>Min price must be less than max price</span>");
				$(".prod"+i+"").closest('li').css("border", "solid red 1px");
				j$('.v_success_msg').hide();
                continue;
            }
            if(min<='0.00'){
            	var save = false;
             	$(".prod"+i+" .error").html("<span>Min price must be greater than 0.00 price</span>");
             	$(".prod"+i+"").closest('li').css("border", "solid red 1px");
             	j$('.v_success_msg').hide();
             	continue;
            }
            if(max<='0.00'){
            	var save = false;
                $(".prod"+i+" .error").html("<span>Max price must be greater than 0.00 price</span>");
                //$(".prod"+i+"").css("border-color", "red");
                $(".prod"+i+"").closest('li').css("border", "solid red 1px");
                $('.v_success_msg').hide();
                continue;
            }  
        	if(your_price<min){
			var save = false;
			$(".prod"+i+" .error").html("<span>Min price must be less than your price</span>");
			$(".prod"+i+"").closest('li').css("border", "solid red 1px");
			j$('.v_success_msg').hide();
            continue;
            }
            if(your_price>max){
			var save = false;
			$(".prod"+i+" .error").html("<span>Max price must be greater than your  price</span>");
			$(".prod"+i+"").closest('li').css("border", "solid red 1px");
			j$('.v_success_msg').hide();
            continue;
            }

		}
		if(save){
            	$(".prod"+i+" .success").html("Saved Successfully");
	            var postData = j$("#repricing_form").serializeArray();
	        	var formURL = j$("#repricing_form").attr("action");
	                j$('#LoadingMSG').show();
	                j$.ajax(
	                    {
	                        url: formURL,
	                        type: "POST",
	                        dataType: 'json',
	                        data: postData,
	                        success: function (data, textStatus, jqXHR) {
	                        	j$('#LoadingMSG').hide();
	                        if (data.success) {
                                j$('.v_success_msg').html('');
                                j$('.v_success_msg').append(data.success);
                                j$('.v_error_msg').hide();
                                j$('.v_success_msg').show();

                            }
								//data: return data from server
	                        },
	                        error: function (jqXHR, textStatus, errorThrown) {
	                            j$('.v_error_msg').html('');
	                            j$('#LoadingMSG').hide();
	                            j$('.v_error_msg').append("something went wrong..");
	                            j$('.v_error_msg').show();
	                            $(".success").html(data.error);
	                        }
	            });
            } 
            else{
            	j$('.v_error_msg').html('');
	            j$('#LoadingMSG').hide();
            	j$('.v_error_msg').append("something went wrong..");
            	j$('.v_success_msg').hide();
                j$('.v_error_msg').show();
            }
    }
</script>
<script type="text/javascript">
$('.cd-faq-trigger').on('click',function(){
var id = $(this).attr('id');
	$('.prod'+id+'').slideToggle('slow', function() {
		 var $this = $(this);
	    if($(this).is(':visible')){
	    	$this.closest('li').addClass('active');
	    }
	    else{
	    	$this.closest('li').removeClass('active');
	    }
	    $('.prod'+id+'').toggleClass('selecionado', $(this).is(':visible'));
	   // var $this = $('#'+id+'');
	  });
    
	
});
		
</script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/frontend/modules/walmart/assets/css/faqstyle.css"> <!-- Resource style -->
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/modernizr.js"></script>
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery-2.1.1.js"></script>
<script type="text/javascript"
        src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/main.js"></script>

