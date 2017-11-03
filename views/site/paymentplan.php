<div class="payment_preview containers">
  <h2 style="font-family: verdana;" class="payment_preview_thanku">Thank you for choosing Walmart-Marketplace Integration App</h2>
  <div class="generic-heading-shopify">
    <h2 class="section-heading">Payment Plan</h2>
    <span style="font-family: verdana;">No obligations.Change plans anytime.Maximise your Earnings!</span>
    <hr class="primary">
  </div>
</div>
<div class="row clearfix payment-plan-container">
  <div class="col-lg-offset-2 col-lg-4 col-md-offset-2 col-md-4 col-sm-6 col-xs-12">
          <div class="jet-plan-wrapper free-plan">
              <h3 class="plan-heading">FREE</h3>
              <div class="plan-wrapper">
                <p class="push-sign">Free</p>
                  <span class="old-price"></span>
                   <span style="padding: 0px;margin-top:3%;" class="price"><strong> $0</strong><span class="month"></span><br>Free Plan</span>

              </div>
              <?php
              $url = Yii::$app->request->getUrl();

              if($url != '/integration/walmart'){ ?>

                  <a href="<?= Yii::$app->request->getBaseUrl().'/walmart/site/paymentplan?plan=3' ?>">
                      <div class="addtocart yearly-plan">
                          Choose this Plan
                      </div>
                  </a>
              <?php }
              ?>
              <div class="what-can-do">

                <ul>
                  <li>20 products(including variants)</li>
                  <li>Upto 10 orders fulfillment</li>
                  <li>Walmart Category/Attributes Mapping</li>
                  <li>Real-time fulfillment</li>
                  <li>Price Customization</li>
                  <li>Shipwork and Shipstation Integration</li>
                  <li>Return Management</li>
                  <li>Free API Setup</li>
                  <li>Email Support</li>
                </ul>
              </div>
          </div>
  </div>
  <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="jet-plan-wrapper active Premium-plan">
      <h3 class="plan-heading">Premium</h3>
      <!--  <h3 class="plan-heading">Premium</h3> -->
      <div class="plan-wrapper">
        <span class="old-price"></span>
        <span class="price"><strong>$399</strong><span class="month"></span><br> Yearly Plan</span>
        <h3 class="free"><span>FREE 7 Days</span></h3>
        <!-- <a href="http://cedcommerce.com/shopify-extensions/jet-shopify-integration"><div class="addtocart">Add to cart</div></a> -->
        <p class="push-sign">Save $180</p>
      </div>
      <a href="https://cedcommerce.com/bigcommerce-extensions/walmart-bigcommerce-integration" target="_blank">
        <div class="addtocart yearly-plan"> 
          Choose this Plan
        </div>
      </a>
      <div class="what-can-do">

        <ul>
          <li>50,000(including variants)</li>
          <li>Upto 700 orders fulfillment</li>
          <li>Walmart Category/Attributes Mapping</li>
          <li>Real-time fulfillment</li>
          <li>Price Customization</li>
          <li>Shipwork and Shipstation Integration</li>
          <li>Return Management</li>
          <li>Free API Setup</li>
          <li>Email Support and Instant Skype Support</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="jet-plan-wrapper standard-plan">
          <h3 class="plan-heading">Standard</h3>
        <div class="plan-wrapper">
          <span style="padding: 0px;margin-top:3%;" class="price"><strong> $299</strong><span class="month"></span><br>Half Yearly Plan</span>
          <h3 class="free"><span>FREE 7 Days</span></h3>
          <p class="push-sign">Save $120</p>
          <div class="clear"></div>
          <!-- <a href="http://cedcommerce.com/shopify-extensions/jet-shopify-integration"><div class="addtocart">Add to cart</div></a>
          
        </div>
        <a href="https://cedcommerce.com/bigcommerce-extensions/walmart-bigcommerce-halfyearly-integration" target="_blank">
                <div class="addtocart yearly-plan"> 
                  Choose this Plan
        </div>
        </a>
              <div class="what-can-do">

                  <ul>
                      <li>20,000(including variants)</li>
                      <li>Upto 300 orders fulfillment</li>
                      <li>Walmart Category/Attributes Mapping</li>
                      <li>Real-time fulfillment</li>
                      <li>Price Customization</li>
                      <li>Shipwork and Shipstation Integration</li>
                      <li>Return Management</li>
                      <li>Free API Setup</li>
                      <li>Email Support and Instant Skype Support</li>
                  </ul>
              </div>
          </div>
  </div> -->
  
</div>

<style>
.fixed-container-body-class {
  padding-top: 56px;
}
.fixed-container-body-class .row {
  margin: 0px 34px;
}
.jet-plan-wrapper {
  border: 1px solid #aaa;
  box-shadow: 0 4px 12px -5px rgb(0, 0, 0, 0.74);
  margin-bottom: 35px;
}
.jet-plan-wrapper .what-can-do li {
  text-align: left;
  padding-left: 20px;
}
.jet-plan-wrapper .free {
  background: #1a75cf none repeat scroll 0 0;
  bottom: -27px;
  display: inline-block;
  left: 30%;
  padding: 7px 15px;
  position: absolute;
  font-size: 18px;
}
.free-plan .plan-wrapper, .standard-plan .plan-wrapper {
  background: #999999 none repeat scroll 0 0;
}
</style>