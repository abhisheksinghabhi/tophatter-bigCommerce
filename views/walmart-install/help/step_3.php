<?php
use yii\helpers\Html;
use yii\base\view;
?>
<style>
.fixed-container-body-class {
    padding-top: 0;
}
	.image-edit {
  box-shadow: 0 2px 15px 0 rgba(78, 68, 137, 0.3);
  height: auto;
  margin-bottom: 20px;
  margin-top: 20px;
  padding: 15px;
  width: 100%;
}
</style>
<div class="page-content jet-install">
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="content-section">
					<div class="form new-section">
						<h3 id="sec1-1">Product Import Section</h3>
						<br>
				        <p>
				          This step enables you to import products to your Walmart integration app.
						</p>
						<p>
							Here you get two options:
						</p>
						<p><b>All products: </b>It enables you to import all the Shopify store products in the app.</p>
						<p><b>Published Products: </b>It enables you to import only those products which are available at your shopify store’s front-end.</p>
						<p>Here you also get the status of</p>
						<ul>
							<li>
								<p><b>1. Total Products</b></p>
							</li>
							<li>
								<br>
								<p><b>2. Products not having SKU</b></p>
							</li>
							<li>
								<br>
								<p><b>3. Haven't defined Product types for your store products ?!</b></p>	
						        <p>i). login to your shopify store and visit product section then click the products which you want to define product types for</p>
						        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/product-type.png" alt="shopify-product-type"/>
						        <br>
						        <p>
						        	ii). Too long, Right?! No problem,<br>You can define all product types at once with bulk product edit.
						        </p>
						        <p><b>Visit product section > Select All Products > Click Edit Products > Click Add Fields > Select Product type</b></p> 
						        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/bulk-edit-products.png" alt="bulk-edit-products"/>
						        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/bulk-edit-product-type.png" alt="bulk-edit-product-type"/>  
						    </li>    
							<li>
								<br>
								<p><b>4. Products Ready To import = Total Products - Products not having SKU</b></p>
							</li>
						</ul>
						<p>After choosing your option ALL PRODUCTS/PUBLISHED PRODUCTS</p>
						<p>Click <b>Start Import</b></p>
						<img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/step3.png" alt="import-product" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
