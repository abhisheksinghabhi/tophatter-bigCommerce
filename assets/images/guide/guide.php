<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\JetProduct;
use app\models\JetErrorfileInfo;
use app\models\JetOrderDetail;
use app\models\JetOrderImportError;

use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<div id="masthead">  
  <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1>Jet - Shopify Integration Documentation
            <p class="lead">How to Sell on Jet.com</p>
          </h1>
        </div>
      </div> 
  </div><!--/container-->
</div><!--/masthead-->

<!--main-->
<div class="container">
    <div class="row">
      <!--left-->
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 " id="leftCol">
        <ul class="nav nav-stacked" id="sidebar">
          <li><a href="#sec0">Installation</a></li>
          <li><a href="#sec1">Setup Configuration</a></li>
          <!-- <li><a href="#sec1-1">Activate LIVE API</a></li> -->
          <li><a href="#sec2">Category Mapping</a></li>
          <li><a href="#sec3">Configure Products</a>
              <ul class="nav nav-stacked child-out">
                  <li><a href="#sec4">- Simple Products</a></li>
                  <li><a href="#sec5">- Variant Products</a></li>
              </ul>
          </li>
          <li><a href="#sec6">Upload Products</a></li>
          <li><a href="#sec7">Rejected Products</a></li>
          <li><a href="#sec8">Order Import</a></li>
          <li><a href="#sec9">Order Auto Acknowledgement</a></li>
          <li><a href="#sec10">Manage Orders</a></li>
          <li><a href="#sec11">Ship Products</a></li>
          <li style="padding-bottom: 100px;"><a href="#sec12">Manage Returns</a></li>
        </ul>
      </div><!--/left-->
      
      <!--right-->
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <h2 id="sec0">Installation</h2>
        <p>There are many shopify shop owner needed to sell their products on Jet.com. So we have brought an <a href="https://apps.shopify.com/jet-integration" target="_blank"><b>Jet Integration</b></a> app for shopify users. You can install this app in few easy steps of installation.</p>
        
        <hr>
        <p>
        You can install our app by going to the official shopify app listing page as shown <a href="https://apps.shopify.com/jet-integration" target="_blank"><b>Jet Integration</b></a> OR you can install app by the following <a href="https://shopify.cedcommerce.com/frontend/" target="_blank"><b>CedCommerce Shopify Jet</b></a>. Here you will get the following screen to enter your domain name of your shopify shop.
        <img class="image-edit" src="/frontend/images/guide/installation.png" />
        You need to enter the dimain name of your shopify shop and click on the install button you will be redirected to shopify admin page for login. Enter your shop admin credential and then login to your shop.
        After login there our shopify jet integration app will ask for the approval of the data access of your shopify store using API.
        <img class="image-edit" src="/frontend/images/guide/install-app.png" />
        In above screen click on the <b>Install App</b> Button, It will grant access of your different API levels to our app so that we can integrate easily your shop to the Jet.com.
        <img class="image-edit" src="/frontend/images/guide/installation-app.png" />
        After proper installation you can see the app dashboard on your admin panel of your shopify. You can easily manage listing of your products on jet by using our App tools.
        </p>
        
        <h2 id="sec1">Setup Configuration</h2>
        <p>
            <span class="applicable">* This step is only applicable when you installed our app and configuring first time.</span>
            After Installation of our shopify Jet.com Integration app you can start selling products on jet.com. But before uploading products to jet.com you need to configure few settings.
            <img class="image-edit" src="/frontend/images/guide/configuration-settings-1.png" />
            After installation, A configuration popup will display,you can enter Test Api Details as well as fulfillment Node. We have explained the jet.com fields below-
            <ul>
                <li>To get the <b>Configuration</b> details you first need to login on the <a href="https://partner.jet.com" target="_blank">Partner.jet.com</a></li>
                <li><b>Api user</b> can be get from the partner panel of jet. To get the Api User details first login on partner then go to the <b>API</b> link on the left section as shown below.
                <img class="image-edit" src="/frontend/images/guide/configuration-api-link.png" />
                On the above screen you can click on the <b>Get API Keys</b> to get the real credential of the jet.com.
                <img class="image-edit" src="/frontend/images/guide/configuration-api-details.png" />
                On the above screen you can see the first details is about the <b>API USER</b>.
                </li>
                <li><b>Api Secret</b> details can also be get from the above screen where you can use the <b>Secret</b> details</li>
                <li><b>Merchant Id</b> details can also be get from the above screen where you can use the <b>Merchant Id</b> details</li>
                <li><b>Fulfillment Node Id</b> can be found by going to the <b>Fulfillment</b> menu shoing in the left section. After clicking there if there is no any fulfillment node created then you need to create a node there. After then you can see the details of your <b>Fulfillment Node Id</b> 
                <img class="image-edit" src="/frontend/images/guide/configuration-api-fulfillment.png" />
                </li>
            </ul>
            <span class="note"> After fill Test Api details as well as fulfillment node, click on <b>Activate Live Api</b>. Then after reload <a href="https://partner.jet.com" target="_blank">Partner.jet.com</a> and get Live api credentials and fill the live details on Configuration popup.</span>
        	<img class="image-edit" src="/frontend/images/guide/configuration-liveapi-details.png"/>
        </p>
        
        
        <hr>
        
       <!--  <h2 id="sec1-1">Activate LIVE API</h2>
        <p>
            <span class="applicable">* This step is only applicable when you setup your <b>TEST API</b> configuration details. If you setup your TEST API configuration then you need to <b>AVTIVATE</b> it to get the <b>LIVE API</b> details.</span>
            When you setup your TEST API details then you need to activate them to get the LIVE API DETAILS. Please go to the following <a href="https://shopify.cedcommerce.com/frontend/jetapi/index" target="_blank">https://shopify.cedcommerce.com/frontend/jetapi/index</a> url.
            <img class="image-edit" src="/frontend/images/guide/activate-api.png" />
            On our APP go to the Jet top menu then click on the <b>Activate API</b> link then one by one click on each activation API links to Enable their API.<br />
            To Activate the Order Acknowledge and Ship Api you need to create orders on your Partner Jet panel first then need to acknowledge order and ship order from our API links.
            <img class="image-edit" src="/frontend/images/guide/activate-api-order-generator.png" />
            By using above screen you can visit to the <a href="https://partner.jet.com/testapi" target="_blank">Order Generator</a> page and generate new Order and acknowledge and Ship orders. In the same way you can cancel the order after then the LIVE API keys can be found.
            
            <span class="note">When you activated all the LIVE API keys by this process, Then you will get the LIVE API credential switch the partner panel to the live and get API Details. You need to <a href="https://shopify.cedcommerce.com/frontend/jetapi/index" target="_blank">update the configuration details of app with the LIVE API credentail</a> as you get it. You can get the details of the live api by the following screen.

            <img class="image-edit" src="/frontend/images/guide/configuration-livedetails.png" />
             </span>

        </p>
        <p>
            After activating all the api now you need to map the shopify category with the jet.com categories.
        </p>
        
        <hr> -->
        
        <h2 id="sec2">Category Mapping</h2>
        <p>
        If you properly activated all the API of JET.com now you must map the categories of your shopify store as compatible to the Jet categories. 
        <b>Note: I would recommend you to map all the category once so you do not need to map each products category separately.</b> If you needed to do the category mapping manually then you can edit that particular products and change the jet.com category from product page.
        </p>
        <p>
            To map the category in mass just go to Top menu <b>Jet -> <a href="https://shopify.cedcommerce.com/frontend/categorymap/index" target="_blank">Category Map</a></b>. By clicking there you can find the following screen.
            
        </p>
        <img class="image-edit" src="/frontend/images/guide/map-category-jet.png" />
        <p>
            On above screen on left side you will find all the <b>Shopify</b> category and on right side <b>JET.com</b> categories. On the basis of the shopify category choose the appropriate category from jet.com category. It will set all your shopify category  related to the Jet.com category. If you done this now you do not need to update the category for each product again and again.
        </p>  
        <h2 id="sec3">Configure Products</h2>
        <p>
          We have done lots of setup like configuration settings, category mapping now we are focusing to upload the products to jet.com for the sales. To upload products to JET.com you need to do following.
          <ul>
            <li>First of all go to the Shopify app panel and after login you can see the top menu <b> JET -> Manage Products -> <a href="https://shopify.cedcommerce.com/frontend/jetproduct/index" target="_blank">Upload Products</a> </b>. After going to upload products you can see all the shopify products listed on our app. </li>
            <li>
                Shopify products listing can be found as below screen. Here are the different self explainatory columns are listed. 
                <img class="image-edit" src="/frontend/images/guide/shopify-product-listing.png" />
                <b>
                    NOTE: 
                    <p>1) To upload any products on jet.com product must have its UPC with it. You can add or Update the UPC by the shopify admin panel.</p>
                    <p>2) Each product must be assigned one JET BROWSE NODE ID(Jet Category). These category id is required and must be available with each product if these category node id is not assigned to the products you will not able to upload products to jet.com. If the Jet Browse Node Id is not assigned to any product. then you will get a error (Not Set) error in JET BROWSE NODE ID column.</p>
                    <p>3) Each products must have positive inventory quantity of products. If the product quantity in negative or zero then you will not able to upload the product to jet.com</p>
                    <p>4) Each Product price must assign to each product. You can update product price by the admin panel of shopify.</p>
                </b>                
            </li>
            <li>
                <p>Now if you want to edit any particular information of your product. Just click on the Edit icon of the product. You can see many editable and non editable fields. From Edit products you can see there are 5 tabs are coming.</p>
                <img class="image-edit" src="/frontend/images/guide/product-edit-general-info.png" />
                <p>On the first time when you edit the product when you not uploaded the product on jet.com. Then you will get the first three tabs on your screen.</p>
            </li>
            <li><b>General Information Tab: </b>This tab will show the basic information of the products. You can edit few of the editable field.</li>
            <li><b>Categories Tab: </b>This tab will show all the Jet.com categories. If you had not done the <b>Category Map</b> process then you will find this field non selected. If you don now want to select the category again and again then you must <a href="https://shopify.cedcommerce.com/frontend/categorymap/index" target="_blank">Map Category</a> on your app first tehn edit the product.</li>
            <li><b>Attributes Tab:</b> This tab is required for informing about the product attributes. There are two cases arises with the attributes. First is about the product is a variant type and Non Variant type of products.
            </li>
            <h3 id="sec4">Simple Products</h3>
            <hr />

            <li>
            <p><b>Non Variant Products:</b> These products does not have any other variant information about the product. There is only one simple product exist. All the variant products attribute decided by the Jet <b>category</b> selection in second tab of product edit.
            <img class="image-edit" src="/frontend/images/guide/category-nonvariant.png" /> <img src="/frontend/images/guide/attribute-nonvariant.png" />
            As you can see in the above image the category <b>Mobility Aids & Equipment</b> selected. 
            So on the basis of the Jet category selection the attributes will be updated. So currently non variant category selected that's why it is showing the non variant attribute listing.
            </p>
            </li>

            <li>
            <h3 id="sec5">Variant Products</h3><hr />
            <p><b>Variant Products:</b> These products have different other variant information about the product. There is only one parent product exist. All the variant products attribute decided by the Jet <b>category</b> selection in second tab of product edit.
            <img class="image-edit" src="/frontend/images/guide/category-variant.png" /> <img class="image-edit" src="/frontend/images/guide/attribute-variant.png" />
            As you can see in the above image the category <b>Rings</b> selected. 
            So on the basis of the Jet category selection the attributes will be updated. So currently variant category selected that's why it is showing the variant attribute listing.
            <b>- In the variant products attributes you must enter the UPC as unique value for their variants. <br />   - "Map Option(s) with Jet Attributes" this column will show the map the shopify attribute to jet attributes. Map the "Shopify Option" to the "Jet Attribute(s) List" from the drop down available list.<br />
                -  "Jet Attribute(s) List" dropdown values are totaly dependent on the Jet category selection in tab 2 so if you think that the right attribute is listed over there. Then you can change the category from second tab then desired attribute list will show
            </b>
            </p>
            </li>
            
          </ul>
        </p>
         <hr>
        <h2 id="sec6">Upload Products</h2>
        <p>
        Products can be uploaded by two ways-
        <b>Product Edit & Upload Product</b>
        After editing all the products information properly click on the top button "Save and Upload" for instantly uploading the products to jet.com. Or you can click on "Save" button to save the products information.
            <img class="image-edit" src="/frontend/images/guide/product-save-n-upload.png" />
        </p>

        <b>Mass Upload Product</b>
        <p>After editing all the products properly means. Each products must have their UPC, Quantity, Attribute values, Price information. Then you can upload products at once. Go to the top menu <b>Jet -> Manage Products -> <a href="https://shopify.cedcommerce.com/frontend/jetproduct/index" target="_blank">Upload Products</a></b>. By going to this page you can find all the products now you can upload the products. On the left most column tick all the checkboxes in the product list. After selection Upload / Archive / Unarchive then click on submit.</p>
        <p>Upload: Means it will upload new products to jet.com or update the existing products information on jet.com </p>
        <p>Archive: By choosing the Archive then submit will remove the listing of your live products from the Jet.com.</p>
        <p>UnArchive: These are the non live products and you want to re-enable the products on Jet.com you can unarchive the product.</p>
            <img class="image-edit" src="/frontend/images/guide/product-mass-upload.png" />
        </p>

        <hr>
        <h2 id="sec7">Rejected Products</h2>
        
            <b>Note: This listing only available if any error comes at the time of mass upload products.</b>
            <p>You can get all the rejected products listing by going to top menu <b>Jet -> Manage Products -> <a href="https://shopify.cedcommerce.com/frontend/jetrejectfiles/index" target="_blank">Rejected Products</a></b> all the rejected products listing is shown as below.</p>
            <img class="image-edit" src="/frontend/images/guide/rejected-products-list.png" />
            <p>By mass action we are uploading multiple products at a single upload. So to get the details of the error we can get it by viewing the error information.To view the rejected products information click on view button.</p>
             <img class="image-edit" src="/frontend/images/guide/rejected-product-view.png" />

            <hr>
            <h2 id="sec8">Import Orders</h2>
            <b>Note: Only the READY state orders will be import in Shopify Jet Integration app.</b>
            <p>If any new orders created on Jet.com it instantly fetched by our app. Same order is generated for the shopify store so that any merchant can view the details and fulfill the orders very easily in their native order processing system. If you want to view all the imported orders from our app. Go to the top menu <b>Jet -> Manage Orders -><a href="https://shopify.cedcommerce.com/frontend/jetorderdetail/index" target="_blank">Sales Order</a></b> </p>
            <img  class="image-edit" src="/frontend/images/guide/order-listing.png" />

            <h2 id="sec9">Order Auto Acknowledgement</h2>
            <b>Note: Only the READY state orders will be import in Shopify Jet Integration app. Only the ready state order can be acknowlege.</b>
            <p>Jet have restriction to acknowledge the orders within 15 minutes otherwise that order will slip from your account. So to achieve this we have made a setup where the order will be auto acknowledge within 15 minutes. After the acknowledgement you can ship and fulfill the orders any time.</p>
            


            <h2 id="sec10">Manage Orders</h2>
            <b>Note: Only the READY state orders will be import in Shopify Jet Integration app.</b>
            <p>
                Jet orders can be viewed in sales order area in our app.
                <b>Jet -> Manage Orders -><a href="https://shopify.cedcommerce.com/frontend/jetorderdetail/index" target="_blank">Sales Order</a></b> Here you will find all the orders listing. You can view the information of the order.
                <img class="image-edit" src="/frontend/images/guide/order-listing.png" />
            </p>
            <p>
                Many time there is few issues due to we are not able to create the orders on our panel. So to view the details of the failed imported orders you can find these details by <b>Jet -> Manage Orders -> <a href="https://shopify.cedcommerce.com/frontend/jetorderimporterror/index" target="_blank"></a></b>
                <img class="image-edit" src="/frontend/images/guide/failed-orders-list.png" />
                If you want to view the failed order details just click on the view icon.
                <img class="image-edit" src="/frontend/images/guide/failed-order-view.png" />
            </p>
            
                <h2 id="sec11">Ship Products</h2>
            <b>Note: Only acknowledged orders can be ship.</b>
            <p>
                Jet orders can be viewed in sales order area in our app.
                <b>Jet -> Manage Orders -><a href="https://shopify.cedcommerce.com/frontend/jetorderdetail/index" target="_blank">Sales Order</a></b> Here you will find all the orders listing. You can view the information of the order.
            </p>
            <p>
                Only the acknowledged orders can be shipped. You can ship the orders by the shopify admin panel. As you create the shipment from the shopify panel we automaticlay send the shipping details to the jet.com. Or if you want to manually ship the order then go to our order listing panel and click on the shipment link as shown below.

            </p>
            <img class="image-edit" src="/frontend/images/guide/order-listing.png" />


        <hr>
       

        </div><!--/right-->
    </div><!--/row-->
</div><!--/container-->

<?php $this->registerCssFile(Yii::$app->request->baseUrl."/css/setup-styles.css"); ?>
 <?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/setup-scripts.js'); ?>
