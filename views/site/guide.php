<?php


$this->title = 'How to Sell on Walmart';

?>
<div class="content-section">
<div class="form new-section">
<div class="jet-pages-heading">
	<h1 class="Jet_Products_style">BigCommerce Walmart-Integration Documentation :: <span> How to Sell on Walmart.com </span></h1>
	<div class="clear"></div>
</div>

<!--main-->
<div class="container-fluid">
    <div class="row">
      <!--left-->
      
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 " id="leftCol">
        <ul class="nav nav-stacked" id="sidebar">
          <li><a href="#sec">Overview</a></li>
          <li><a href="#sec0">Installation</a></li>
          <li><a href="#sec1">Walmart Configuration Setup</a></li>
            <ul class="nav nav-stacked child-out">
              <li><a href="#sec1-1">- Registration</a></li>
              <li><a href="#sec1-2">- Activate Walmart API</a></li>
              <li><a href="#sec1-3">- Product Import Section</a></li>
              <li><a href="#sec1-4">- Walmart - Category Mapping</a></li>
              <li><a href="#sec1-5">- Walmart Attribute Mapping</a></li>
            </ul>


          <li><a href="#sec2">Walmart Configuration Setting</a>
              <ul class="nav nav-stacked child-out">
                  <li><a href="#sec2-1">- Walmart Setting</a></li>
                  <li><a href="#sec2-2">- Walmart Return Location</a></li>
                  <li><a href="#sec2-3">- Walmart Order</a></li>
                   <li><a href="#sec2-4">- Auto Product Sync</a></li>
                    <li><a href="#sec2-5">- Product Settings</a></li>
                    <li><a href="#sec2-6">- Email Subscription Setting</li>
                  
              </ul>
          </li>

          <li><a href="#sec4">Configure Products</a>
              <ul class="nav nav-stacked child-out">
                  <li><a href="#sec4-1">- Configure Simple Products</a></li>
                  <li><a href="#sec4-2">- Configure Variant Products</a></li>
              </ul>
          </li>
          
          <li><a href="#sec5">Manage Products</a>
              <ul class="nav nav-stacked child-out">
                  <li><a href="#sec5-1">- Upload Products</a></li>
                  <li><a href="#sec5-2">- Walmart Product Feed</a></li>
                  <li><a href="#sec5-3">- Walmart TaxCode</a></li>
                  <li><a href="#sec5-4">- Retire Products</a></li>
              </ul>
          </li>

          <li><a href="#sec3">Carrier Mapping</a>
              
          </li>

          <li><a href="#sec6">Order Management</a>
              <ul class="nav nav-stacked child-out">
                  <li><a href="#sec6-2">- Manage Orders</a></li>
                  <li><a href="#sec6-3">- Failed Orders</a></li>
              </ul>
          </li>
          
         <li><a href="#sec7">Extended Features</a>
              <ul class="nav nav-stacked child-out">
                  <li><a href="#sec7-2">- FAQ </a></li>
                  <li><a href="#sec7-3">- Call </a></li>

              </ul>
          </li>
      </div><!--/left-->
      
      <!--right-->
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

        <h2 id="sec">Overview</h2>      
        <p><a href="https://www.bigcommerce.com/apps/walmart-marketplace-integration" target="_blank">Walmart Integration</a> app by CedCommerce synchronizes BigCommerce Store with Walmart. With help of APIs provided by Walmart, the app creates a channel facilitating the synchronization of product inventory and orders, updating products information and  helps you manage the products from your BigCommerce store itself.</p>

        <h2 id="sec0">Installation</h2>
        <p>For installing Walmart BigCommerce Integration app, visit <a href="https://www.bigcommerce.com/apps/walmart-marketplace-integration" target="_blank"><b>walmart-marketplace-integration</b></a>  & click GET IT NOW (The app will ask permission for approving the data access of their BigCommerce stores using API).</p>
        
        <hr>
        <p>
          
          <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/install-walmart-app.png" />
        </p>
        <hr>
        
        <h2 id="sec1">Walmart Configuration Setup</h2>
        <p>
            <span class="applicable">To successfully integrate your BigCommerce Store with Walmart.com and start selling, few settings are required to be configured.</span>
        </p>   
        <h2 id="sec1-1">Registration</h2> 
            <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/step-1.png" alt="registration-step"/>
        <p>
       <h3 id="sec1-2">Test Walmart Api</h3>
              <p>To successfully integrate your BigCommerce Store with Walmart and start selling on it, few settings are required to be configured. </p><p>

              <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/step-2.png" alt="registration-step2" />
           	<span>Here, you are required to enter <b>WALMART API DETAILS</b> i.e. <b>Walmart Consumer Id</b>, <b>API Secret Key</b> and <b>Channel Type Id</b>. Thereafter, Click "Next" button.</span>
            <p>
            In order to obtain <b>Walmart Consumer Id, API Secret Key and Channel Type Id </b> the merchant needs to login to his Walmart Seller Panel. Click on the Settings icon > API option.
            </p>
            <p>    
                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-1.png" alt="configuration-settings-new"/>
            </p>
              <p>
                Copy the <b>“Consumer ID” </b>, click on the <b>“Regenerate Key”</b> button to regenerate the secret key and copy the “Consumer Channel Type Id” from your Walmart seller panel one by one and paste these keys in the Configuration settings of the app.
              </p>    
                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-2.png" alt="configuration-settings-new1" />
              <p>    
                  When you click on the <b>“Regenerate Key”</b> button then, a popup appears. Click <b>“Yes, Regenerate Key”</b> button, a new Secret Key is generated.
                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-3.png" alt="live-api"/>
                   After that copy <b>“Consumer ID”, “Secret Key” and “Consumer Channel Type Id” </b> one by one, then paste these in the respective fields of the Walmart BigCommerce Integration app’s configuration settings.
                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-4.png" alt="live-api"/>
                   Now that Bigcommerce store is integrated with Walmart, importing products on Walmart from BigCommerce is the third step to start selling on Walmart.
                  
                
              </p>
        <hr>
          
          <h3 id="sec1-3">Product Import Section</h3>
            <br>
                <p>
                  This step enables you to import products to your Walmart integration app.
            </p>
            <p>
              Here you get two options:
            </p>
            <p><b>All products: </b>It enables you to import all the BigCommerce store products in the app.</p>
            <p><b>Published Products: </b>It enables you to import only those products which are available at your bigcommerce store’s front-end.</p>
            <p>Here you also get the status of</p>
            <ul>
              <li>
                <p><b>1. Total Products</b></p>
              </li>
              <li>
                <p><b>2. Products not having SKU</b></p>
              </li>
              <li>
                <p><b>3. Haven't defined Product types for your store products ?!</b></p> 
                    <p>i). login to your bigcommerce store and visit product section then click the products which you want to define product types for</p>
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
            <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/step-3.png" alt="import-product" />
            <hr>
            <h3 id="sec1-4">Walmart Category Mapping</h3>
            <br>
                <p>
                   On the left side of the screen is <b>Product type (BigCommerce)</b> and on right side <b>Walmart Category Name</b>. Map appropriate <b>BigCommerce product types</b> with <b>Walmart.com categories</b>. Now that mapping is done, HERE, you are not required to map categories time and again.
                </p>  
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/step-4.png" alt="map-category-walmart"/>
            <h3 id="sec1-5">Walmart Attribute Mapping</h3>
            <br>
                <p>
                    Choose Walmart attributes that you want to map with your product variant options. 
                </p>
                <br>
                <p>Take Engagement Ring as a bigcommerce product type for example: </p>
              <p>Now, in order to transfer correct information of your products on walmart, you need to map walmart attributes with your product variant options (attributes) .</p>
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/step-5.png" alt="walmart-attribute-mapping"/>
                
       <h2 id="sec2">Walmart Configuration Setting</h2>
       <h3 id="sec2-1">Walmart Setting</h3>
       <p>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/walmart setting.png" alt="walmart-attribute-mapping"/>
       </p>
      <hr>
      <h3 id="sec2-2">Walmart Return Location</h3>
       <p>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/walmart return location.png" alt="walmart-attribute-mapping"/>
       </p>
       <h3 id="sec2-3">Walmart Order</h3>
       <p>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/walmart order.png" alt="walmart-attribute-mapping"/>
       </p>
        <h3 id="sec2-4">Auto Product Sync</h3>
       <p>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/product sync.png" alt="walmart-attribute-mapping"/>
       </p>
      <h3 id="sec2-5">Walmart Product Settings</h3>
       <p>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/product setting.png" alt="walmart-attribute-mapping"/>
       </p>
        <h3 id="sec2-6">Email Notifications:</h3>
            <p>
               To alert you for all the happenings of your product on walmart.com, you can enable the subscription for each of the desired action i.e. alerts when New order is received or, when the order is rejected, or when the order contains error etc.
            </p>
            <b>To do this</b>
            <p>Go to <b>Admin</b> Settings->Choose the desired alerts by ticking against the events</p>
            <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/email subscription.png" alt="email subscription"/>  
<h3 id="sec2-3">Dashboard</h3>
       <p>
       On the dashboard you will be able to many things like:<br>
       1. View Product status.<br>
       2. View order related information. <br>
       3. Schedule a call.<br>
       4. FAQ. <br>
       5. Settings.<br>
       and many more.
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/dashboard.png" alt="walmart-attribute-mapping"/>
       </p>

       <h2 id="sec4">Configure Products</h2>
        <p>
          Now that categories are mapped, products are required to be uploaded on Walmart.com for sales. 
          <ul>
            <li>In Walmart-Integration app,<br><i>Go to the top menu and Click <b>PRODUCTS -> <a href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartproduct/index" target="_self">MANAGE PRODUCTS</a></b>.</i></li>
            <li>
                You can see all the BigCommerce store products are listed on our app.<br>Here all the different columns listed are self explanatory. See below. 
            </li>    
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/manage product.png" alt="shopify-product-listing"/>
             <li style="font-family:verdana">
                <b>
                    NOTE: 
                    <p>1) All the products that have valid SKU(s) will be retrieved from BigCommerce store. If there is any product with no SKU, it will be not listed on walmart BigCommerce app.</p>
                    <p>2) Each variant must have unique SKU for every product. If any product have duplicate SKU, then it might be conflicting SKU at the product upload time.<p>
                    <p>3) Each product must have positive inventory quantity of products. If the product quantity is negative or zero then products will not be uploaded on walmart.com</p>
                    <p>4) Product price must be assigned to each product. You can update product price by admin panel of BigCommerce.</p>
                </b>                
            </li>
            <li>
                <p>Now to update any information of products,<br><i>Click <b>EDIT</b> icon of the product</i>. You can see many editable and non editable fields.</p>
            </li>
            <h3 id="sec4-1">Configure Simple Products (Non Variant)</h3>
            <hr />

            <li>
	            <p> These products which are SOLO and do not have any other variations (Size, Color etc.) are called Simple Products (Non Variant).  
	             <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/simple edit.png" alt="attribute-nonvariant"/>
	            As visible in the image above, since <b>GAME ACCESSORIES</b> is child category and the product uploaded under this has NO variations, all the products can be uploaded directly.<br>
              For Example, Baseball bat under games accessories doesn’t have any variation thus it is Simple Product.
	            </p>
            </li>

            <li>
	            <h3 id="sec4-2">Configure Variant Products</h3><hr />
	            <p> These products have different variations. There exist ONE parent product category and rest of the products are children.
		            <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/variation edit.png" alt="attribute-variant-new"/>
		            	The attributes of the products are updated, again, as per walmart.com’s category. As Variant Product is selected, it shows variable attribute listings.
		            <br/>
	            </p>           
            </li>
             
	       </li>
         </ul>
        
        <hr>
       
         
        <h2 id="sec5">Manage Products</h2>
        	<p>After all the products are properly edited. Means products have their Barcode (UPC, ISBN-10,ISBN-13,GTIN-14) or ASIN, Quantity and Attribute values, Price information, products can be uploaded at once.<br>Go to top menu, Click <b>Manage Products -><a href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartproduct/index" target="_self"> Upload Products</a></b><br>All the products that uploaded till now are listed here.<br>Tick all the check boxes on the leftmost column, thereafter Select <b>Upload </b> and Click <b>SUBMIT</b>.</p>
	        <p><b>Upload:</b> It <b>uploads</b> the new products to walmart.com or <b>update</b> the existing products information.</p>
	        	            
	        </p>
        
        <h3 id="sec5-1">Upload Products</h3>
         <p>
          <b>Select the product, choose upload and Click Submit.</b> 
         	<img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/product upload.png" alt="product-mass-upload-new" />
			Upon selecting and uploading the products, the next page appears with display STATUS BAR. STATUS BAR shows Number of products successfully uploaded and Number of Products having ERRORS.Furthermore, Errors can occur due to <b>DUPLICATE</b> SKU(s) or Barcode or ASIN, <b>MISSING</b> Image,<b>INVALID</b> Quantity and <b>IMPROPER</b>  mapping of BigCommerce variant options with walmart.com’s attributes. For <b>batch</b> upload, errors are displayed for each product if any product has incomplete information. To describe the error for each products in brief, see the image below.
		 </p>
			<img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/upload.png" alt="status_bar"/>
        	<p>
        		If product has all the information valid, it gets uploaded on walmart.com and STATUS changes from <b>"Not uploaded"</b> to <b>"Uploaded"</b> or <b>ERROR ICON</b> gets displayed in action column.
        	</p>
        	<!-- <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/after_upload.png" alt="after_upload" /> -->

        <hr>
        <h3 id="sec5-2">Walmart Product Feed</h3>
        <p>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/manageproductfeed.png" alt="status_bar"/>
        </p>
        <hr>
               
        <h3 id="sec5-3">Walmart Taxcode</h3>
        <p>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/taxcode.png" alt="status_bar"/>
        </p>
        <hr>
        <hr>
        <h3 id="sec5-4">Retire Products</h3>
        <p>
        You can retire your product in 2 ways: <br>
        1. By selecting product in the manage product and then selcting the option to retire and click on Submit button.<br>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/retireproduct.png" alt="status_bar"/><br>
        2. By going to<b> Import/Export</b> section and then to <b>Retire Product</b>
        <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/retire.png" alt="status_bar"/>

        </p>
        <hr>


        <h2 id="sec3">Carrier Mapping</h2>
        <p>
          <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/carriermapping.png" alt="status_bar"/></p>            
        </p>
         
         <h2 id="sec6">Order Management</h2>
         	<p>
         		Under order management section, all the details of Walmart orders, whether it's Acknowledged, shipped,returned or refunded are stored.
         	</p>
         	
            <b>Note: Only the READY orders will be imported onto Walmart BigCommerce Integration app.</b>
            <p>If any new orders are created on walmart.com, they are instantly fetched by our app. Same order is generated for the BigCommerce store, for merchants to view view details and fulfill them easily in their native order processing system.<br>To view all the imported orders from our app.<br>        
            
            <h3 id="sec6-2">Manage Orders</h3>
            <p>
                Walmart orders can be viewed under sales order area in the app. To check order details, 
                <i>Go to top menu <b>Orders -><a href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartorderdetail/index" target="_self">Sales Order</a>.</b></i>
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/sales order.png" alt="order-listing"/>
            </p>
            
            <h3 id="sec6-3">Failed Orders</h3>
            <p>
                In the case quantity is not available in BigCommerce store or product SKU doesn’t exist) app does not fetch order from walmart.com. For checking details of failed orders<br> Open <b>Orders -> <a href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartorderimporterror/index" target="_self">Failed Order</a></b> section.
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/failed order.png" alt="failed-orders-list" />
                
            </p>

        <hr>
    <h2 id="sec7">Carrier Mapping</h2>
        <h3 id="sec7-2">FAQ</h3>
            <p>
            FAQ section is to help the user of the app, it answer each and every question of user, which help the user to use the app easily.
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/faq.png" alt="order-listing"/>
            </p>   
            <h3 id="sec7-2">Call </h3>
            <p>
            Call section helps you to schedule a call at your favourable time so that you can directly communicate your quries to the responsible person which will resolve all your issues and help in every aspect.  
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/call.png" alt="order-listing"/>
                <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/schedule call.png" alt="order-listing"/>
            </p>       
        </div><!--/right-->
    </div><!--/row-->
</div><!--/container-->
</div>
</div>

 <?php $this->registerCssFile(Yii::$app->request->baseUrl."/css/setup-styles.css"); ?>
 <?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/setup-scripts.js'); ?>
