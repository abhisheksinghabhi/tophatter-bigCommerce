<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\walmart\components\Data;

$session = Yii::$app->session;

/* @var $this yii\web\View */
/* @var $model frontend\models\WalmartRegistration */
/* @var $form ActiveForm */

$model = new \frontend\modules\walmart\models\WalmartRegistration();


$model->name = isset($session['shop_details']['shop_owner'])?$session['shop_details']['shop_owner']:'';
$model->mobile = isset($session['shop_details']['phone'])?$session['shop_details']['phone']:'';
$model->email = isset($session['shop_details']['email'])?$session['shop_details']['email']:'';

$shop_name=Yii::$app->user->identity->shop_name;

$tmpdata = Data::sqlRecords("SELECT * FROM `walmart_registration` WHERE `merchant_id`='".MERCHANT_ID ."'", 'all', 'select');



$annualRevenueOptions = [
                         '$10,000-$50,000'=>'$10,000-$50,000',
                         '$50,001-$100,000'=>'$50,001-$100,000',
                         '$100,001-$250,000'=>'$100,001-$250,000',
                         '$250,001-$500,000'=>'$250,001-$500,000',
                         '$500,001-$1 million'=>'$500,001-$1 million',
                         '$1 million-$2 million'=>'$1 million-$2 million',
                         'Over $2 million'=>'Over $2 million',
                         'Over $5 million'=>'Over $5 million',
                         'Over $10 million'=>'Over $10 million'
                         ];
?>
<div class="top_error alert-danger" style="display:none; border-radius: 4px;margin-bottom: 10px;padding: 10px;"></div>
<div class="top_success alert-success" style="display:none; border-radius: 4px;margin-bottom: 10px;padding: 10px;"></div>
<div class="site-register">
    <div class="content-section">
        <div class="">
            <!-- <strong>ADMIN INFO</strong> -->
            <?php $form = ActiveForm::begin(['id'=> 'walmartregistration-form','enableAjaxValidation' => true, 'enableClientValidation' => true]); ?>
               <?= $form->field($model, 'name', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Your Full Name', 'class'=>'form-control','value'=>$tmpdata[0]['name']]]) ?>
               <?= $form->field($model, 'legal_company_name', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Your Legal Company Name', 'class'=>'form-control','value'=>$$tmpdata[0]['legal_company_name']]]) ?>
               <?= $form->field($model, 'store_name', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Your DBA SELLER STORE NAME', 'class'=>'form-control','value'=>$shop_name,'readonly'=>'true']]) ?>
               <?= $form->field($model, 'mobile', ['options'=>['data-tooltipClass'=>'intro-jet-mobile'],'inputOptions'=>['placeholder'=>'Enter Your Mobile No.', 'class'=>'form-control','value'=>$tmpdata[0]['mobile']]]) ?>
               <?= $form->field($model, 'email', ['options'=>[],'inputOptions'=>['placeholder'=>'xyz@example.com', 'class'=>'form-control','value'=>$tmpdata[0]['email']]]) ?>
               <?= $form->field($model, 'annual_revenue', ['options'=>[]])->dropDownList($annualRevenueOptions,['prompt'=>'Choose...','value'=>$tmpdata[0]['annual_revenue']]); ?>
               <?= $form->field($model, 'website', ['options'=>[],'inputOptions'=>['placeholder'=>'http://example.com OR https://example.com', 'class'=>'form-control','value'=>$tmpdata[0]['website']]]) ?>
               <?= $form->field($model, 'amazon_seller_url', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Your Amazon Seller Url', 'class'=>'form-control','value'=>$tmpdata[0]['amazon_seller_url']]]) ?>
               <span class="text-validator control-label">Please Enter 'N/A' OR 'Not Applicable' if you don't have Amazon Seller Url</span>
               <?= $form->field($model, 'position_in_company', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Job Title/Position in Company', 'class'=>'form-control','value'=>$tmpdata[0]['position_in_company']]]) ?>
               <?= $form->field($model, 'shipping_source[]', ['options'=>[]])->checkboxList(['Shipwork' => 'Shipwork', 'shipstation' => 'Shipstation', 'Other' => 'Other']); ?>
               <?= $form->field($model, 'other_shipping_source', ['options'=>['style'=>'display:none;', 'id'=>'other_shipping_source'],'inputOptions'=>['placeholder'=>'Other Shipping Source', 'class'=>'form-control']])->label("Other Shipping Source"); ?>
               <?= $form->field($model, 'product_count', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Estimated No of Sku\'s', 'class'=>'form-control','value'=>$tmpdata[0]['product_count']]]) ?>
               <?= $form->field($model, 'company_address', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Your Company Address', 'class'=>'form-control','value'=>$tmpdata[0]['company_address']]]) ?>

               <?= $form->field($model, 'country', ['options'=>[]])->dropDownList(['US'=>'US','Other'=>'Other than US'],['prompt'=>'Choose...'],['value'=>$tmpdata[0]['country']); ?>
               <?= $form->field($model, 'have_valid_tax', ['options'=>['style'=>'display:none;']])->dropDownList(['yes'=>'Yes','no'=>'No'],['prompt'=>'Choose...','value'=>$tmpdata[0]['have_valid_tax']])->label('Do you have a Valid Tax Id and W9 Form?'); ?>
               <?= $form->field($model, 'usa_warehouse', ['options'=>['style'=>'display:none;']])->dropDownList(['yes'=>'Yes','no'=>'No'],['prompt'=>'Choose...','value'=>$tmpdata[0]['usa_warehouse']])->label('Do you have a warehouse in USA?'); ?> 
               <?= $form->field($model, 'products_type_or_category', ['options'=>[],'inputOptions'=>['placeholder'=>'Enter Your Business Category/Type of Products', 'class'=>'form-control','value'=>$tmpdata[0]['products_type_or_category']]]) ?>


               <?= $form->field($model, 'selling_on_walmart', ['options'=>[]])->dropDownList(['yes'=>'Yes','no'=>'No'],['prompt'=>'Choose...','value'=>$tmpdata[0]['selling_on_walmart']])->label('Are you already selling on WalMart Marketplace?'); ?> 
               <?= $form->field($model, 'selling_on_walmart_source', ['options'=>['style'=>'display:none;']])->dropDownList(['channel_partner'=>'Different Channel Partner','other'=>'Others'],['prompt'=>'Choose...'])->label('How do you integrate with WalMart Marketplace?'); ?>
               <?= $form->field($model, 'other_selling_source', ['options'=>['style'=>'display:none;'],'inputOptions'=>['class'=>'form-control']]); ?>

               <?= $form->field($model, 'contact_to_walmart', ['options'=>['style'=>'display:none;']])->dropDownList(['yes'=>'Yes','no'=>'No'],['prompt'=>'Choose...'])->label('Have you contacted WalMart Marketplace before?'); ?>

               <?= $form->field($model, 'approved_by_walmart', ['options'=>['style'=>'display:none;']])->dropDownList(['yes'=>'Yes','no'=>'No'],['prompt'=>'Choose...'])->label('Have you been approved by WalMart to sell on the Marketplace?'); ?>


               <?= $form->field($model, 'reference', ['options'=>[]])->dropDownList(['App Store'=>'App Store','Facebook'=>'Facebook','Google'=>'Google','Yahoo'=>'Yahoo','LinkedIn'=>'LinkedIn', 'YouTube'=>'YouTube', 'Other'=>'Other'],['prompt'=>'Choose...'])->label('How did you hear about us?'); ?>
               <?= $form->field($model, 'other_reference', ['options'=>['style'=>'display:none;']])->textarea()->label("Description"); ?>
               <div class="required">
                    <label class="control-label">Terms and conditions</label>
                    <div class="terms-n-condition">   
                         <strong>CedCommerce Terms & Conditions and Privacy Policy (WALMART Shopify)</strong><br><br>
                         <p>
                         CedCommerce, LLC currently provides walmart.com integration functionality with integration into other 
                         marketplaces. Our goal is to provide reliable service for a competitive price that helps merchants sell 
                         their products across multiple platforms. We work hard to ensure this service works at its full potential
                         and meet each case with the utmost dedication.<br><br>
                         We understand how important a secure website is to e-commerce. Our investment in infrastructure 
                         and security only highlights this commitment. Unfortunately, our service is reliant on 3rd party 
                         providers that may have other measures in place. Therefore, we cannot guarantee a 100% error free 
                         code or website that is accessible at all times. Our service is not liable for any damages or loss of 
                         income, revenue or data. Additionally, there is no guarantee that the error in code or functionality will 
                         prevent the suspension or deletion of a walmart.com account.<br><br>
                         As a user of CedCommerce.com, products you are responsible for your account as well as any content
                         related to your account. Furthermore, you agree to use CedCommerce.com in compliance with all 
                         applicable laws and will in no way violate the walmart.com Terms of Use, API Terms of Use, or Seller 
                         Agreement. <br><br>
                         Furthermore, CedCommerce do not hold responsibility for any illegal use and reserve the right to 
                         close an account for any reason.<br><br>
                         CedCommerce, LLC (“the Service”) offering use of the Service is expressly conditioned on your 
                         acceptance of these CedCommerce.com Terms and Conditions. By using the Service, you signify that 
                         you unconditionally agree and accept to be legally bound by these Terms and Conditions. No other 
                         terms or conditions of any sort in any document, writing or other communication whatsoever made by
                         you to CedCommerce.com or its employees, representatives or agents in relation to the Service shall 
                         be applicable to or binding on CedCommerce.com.<br><br>
                         CedCommerce.com is not associated in any means with served marketplaces, and the Services 
                         provided are designed to let users to communicate with those marketplaces via available API in a 
                         manner that follows all terms and conditions of those marketplaces. This also means that 
                         CedCommerce will not be responsible for the eventual termination of seller’s account on any 
                         marketplaces, and fees charged by those marketplaces, etc.<br><br>
                         <strong>Updates</strong><br><br>
                         We may change these Terms of Use from time to time, by posting updates to our website. An update 
                         will be effective for any website use after the date of the update. We encourage you to review our 
                         Terms of Use from time to time for possible changes. Your use of our website after an update 
                         constitutes your agreement to the update.<br><br>
                         <strong>Payment Terms</strong><br><br>
                         Cedcommerce reserves right, and would charge you with 15 $/ Hour as a customisation charge for the 
                         additional on demand benefits /requests made from your end for a improving or enhancing the 
                         functionality.<br><br>
                         <strong>Subscriptions</strong><br><br>
                         Some of CedCommerce Services are billed on a subscription basis means that you will be billed in 
                         advance on a recurring, periodic basis (each period is called a “billing cycle”). Billing cycles are 
                         typically two weeks, monthly or annual, depending on what subscription plan you were offered. Your 
                         Subscription will automatically renew at the end of each billing cycle unless you cancel auto-renewal 
                         through your online account management page, or by contacting our customer support team. While 
                         we will be sad to see you go, you may cancel auto-renewal on your Subscription at any time, in which
                         case your Subscription will continue until the end of that billing cycle before terminating. You may 
                         cancel auto-renewal on your Subscription immediately after the Subscription starts if you do not want 
                         it to renew.<br><br>
                         We may change the subscription fee charged for the Services at any time. The change will become 
                         effective only at the end of the then-current billing cycle of your subscription.<br><br>
                         <strong>Refunds</strong><br><br>
                         You are responsible for keeping your billing information up to date and your account current. You will
                         not be liable for any sort of partial or prorated refund of your subscription fee for any time during 
                         which you do not use the Services. The refund would not be applicable to the boundaries beyond the 
                         operational field and the issues/concerns/liabilities not under the CedCommerce service policies and 
                         norms.<br><br>
                         <strong>Usage of the Service</strong><br><br>
                         You are responsible for your account, content, and communications with others while using the 
                         Services. You agree to use the Services in compliance with applicable law. This is your responsibility 
                         and you agree to not use CedCommerce in a way that violates walmart.com Terms of Use 
                         (https://jet.com/terms-of-use) , it’s API Terms of Use (https://developer.jet.com/tos) or agreemenst 
                         with any other marketplace. By using CedCommerce.com, you agree to not violate any of 
                         marketplace terms. In the event of violating any marketplace rules, we have the right to close your 
                         account. We are also not responsible for any illegal use of CedCommerce.com by our users.<br><br>
                         <strong>Account Termination</strong><br><br>
                         CedCommerce.com has the right to terminate its relationship with you, without prior notice, if you 
                         breach or fail to comply with any provision of these Terms and Conditions. This Agreement and your 
                         ability to use the Service shall also automatically terminate upon the expiry of your subscription.
                         CedCommerce.com has no responsibility to maintain your user account or any of your data after 
                         termination. CedCommerce.com is not responsible for any fees, damages, or claims you may suffer in
                         relation to the same or any claims or actions you may have as a result of termination.<br><br>
                         If termination is due to your failure to renew your subscription on a timely basis, you may 
                         reactivate your account and access your data if you renew your subscription with CedCommerce.com.
                         To do so you may have to pay any subscription fees or charges that may be imposed by 
                         CedCommerce.com, including reactivation fees (if any), within any period that may be stated by 
                         CedCommerce.com. Failure to pay reactivation fees may result in your user account being deleted, 
                         and permanent removal from its systems.<br><br>
                         <strong>Your Data</strong><br><br>
                         You or your customers, partners or associates – whichever may be applicable – are the owner of any
                         data you upload into the Service (“Your Data”). By “Your Data,” we mean images of your products, 
                         your personal and company information, products, customers and sales information. You hereby agree
                         that CedCommerce.com is the owner of all data other than Your Data, including any system generated
                         data generated by the Service or any data compiled from data inputted into the Service by all users of 
                         the Service on an aggregate basis (“CedCommerce.com’s Data”). CedCommerce.com may use all of 
                         CedCommerce.com’s Data in any way it chooses (including to improve or adapt its services), or to 
                         create or design new products and services. Data other than "Your Data," would be statistics of 
                         amount of sales per day across accounts of all of our customers, which we can use for example to 
                         determine our needs in server’s capacity and speed, we own these global statistics (which do not 
                         contain any information that can be clarified as "Your Data").<br><br>
                         You acknowledge and agree that the nature of the Internet is international and that 
                         CedCommerce.com has your express consent to store and provide access to your personal or 
                         confidential information, and that of your users(s) and customers, and to transmit and deliver such 
                         information via the Internet (which may involve its transmission across multiple jurisdictions).<br><br>
                         You are responsible for all data on your account and you agree to comply with all applicable legal 
                         requirements for the sale, transfer and transport of an item, including but not limited to statutes, 
                         regulations or requirements of any country, state, locality, province, municipality or other government 
                         authority or regulatory entity regarding sales or auctions, the sale and/or transfer of any Item 
                         (including firearms, ammunition, black powder, or any other item), export or import control, taxation, 
                         duties or tariffs, presence or licensing of brokers (the foregoing, “Legal Requirements”) governing the
                         specific requirements for transfer and shipping of firearms. CedCommerce.com is not responsible for 
                         the seller’s products, nor is liable for any legal actions that may result from the sale of the seller’s 
                         products.<br><br>
                         <strong>Your Account and Password</strong><br><br>
                         It is your responsibility to keep secure and confidential any password(s) and user ID(s) 
                         CedCommerce.com may issue to you to access the Service, rests solely with you and the employees, 
                         representatives and agents of yours that are entrusted with the same. If you become aware of any 
                         unauthorized access to your account(s), or any misuse of your password(s) and user ID(s), you must 
                         follow the CedCommerce process to disable your account(s) and/or re-issue new password(s) or user 
                         ID(s) as soon as possible.<br><br>
                         You agree that you are solely responsible for the actions and omissions of the person(s) you 
                         nominate as user(s) or administrator(s) of your account(s) for the Service. You also agree that 
                         CedCommerce.com may accept instructions and requests from, and communicate with such person(s) 
                         until and unless CedCommerce.com receives notification that such person(s) that this is no longer in 
                         effect. At this point, all requests and communications are valid and legally binding on you. In 
                         addition, you are responsible for any and all use of your account(s) by any persons who are in 
                         possession of your user ID(s) or password(s).<br><br>
                         <strong>No Warranties</strong><br><br>
                         UNLESS EXPRESSLY PROVIDED HEREIN, TO THE FULLEST EXTENT PERMITTED BY 
                         LAW, CedCommerce.com MAKES NO WARRANTY OR REPRESENTATION OF ANY KIND 
                         REGARDING ITS WEBSITE, THE SERVICE, THE PRODUCTS OR SERVICES AVAILABLE ON 
                         THIS WEBSITE AND/OR ANY MATERIALS PROVIDED ON THIS WEBSITE, ALL OF WHICH 
                         ARE PROVIDED ON AN “AS IS WHERE IS” BASIS. CedCommerce.com DOES NOT WARRANT
                         THE ACCURACY, COMPLETENESS, CURRENCY OR RELIABILITY OF ANY OF THE 
                         CONTENT OR DATA FOUND ON THE SERVICE, OR THIS WEBSITE. CedCommerce.com 
                         EXPRESSLY DISCLAIMS ALL WARRANTIES, AND TERMS AND CONDITIONS IN 
                         RELATION TO THE SERVICE, INCLUDING ALL IMPLIED WARRANTIES AS TO 
                         MERCHANTABILITY, SATISFACTORY QUALITY, FITNESS FOR A GENERAL OR 
                         PARTICULAR PURPOSE AND NON-INFRINGEMENT OF PROPRIETARY RIGHTS, AND 
                         THOSE ARISING BY STATUTE OR OTHERWISE IN LAW OR FROM A COURSE OF DEALING
                         OR USAGE OF TRADE TO THE FULLEST EXTENT PERMITTED BY THE LAWS OF NEW 
                         YORK and United States of America.<br><br>
                         CedCommerce.com DOES NOT WARRANT THAT THE SERVICE, THIS WEBSITE, ITS 
                         SERVERS OR ANY E-MAIL SENT FROM CedCommerce.com IS FREE OF VIRUSES OR OTHER
                         HARMFUL COMPONENTS.<br><br>
                         FOR THE AVOIDANCE OF DOUBT, CedCommerce.com DOES NOT GUARANTEE THE 
                         EFFECTIVENESS OF THE SERVICE. We cannot also guarantee that errors in the code or 
                         functionality will not cause your account to be suspended or deleted by JET.com.<br><br>
                         CedCommerce.com TAKES NO RESPONSIBILITY FOR THE SECURITY, CONFIDENTIALITY 
                         OR PRIVACY OF THE COMMUNICATIONS AND/OR DATA TRANSMITTED OVER THE 
                         INTERNET AND DOES NOT WARRANT (AND EXPRESSLY EXCLUDES ANY AND ALL 
                         EXPRESS OR IMPLIED WARRANTIES) THAT THE SERVICE WILL BE WITHOUT FAILURE, 
                         DELAY, INTERRUPTION, ERROR OR LOSS OF CONTENT, DATA OR INFORMATION. IN 
                         ADDITION, CedCommerce.com SHALL NOT BE LIABLE FOR ANY COMPATIBILITY ISSUES 
                         PERTAINING TO CUSTOMERS’ COMPUTERS, APPLICATIONS OR OTHER SOFTWARE ON 
                         ANY COMPUTERS USING THE SERVICE.<br><br>
                         <strong>Limitation of Liability</strong><br><br>
                         TO THE FULLEST EXTENT PERMITTED BY LAW IN NO EVENT SHALL CedCommerce.com 
                         BE LIABLE FOR ANY INJURY, LOSS, CLAIM, DAMAGE, OR ANY SPECIAL, EXEMPLARY, 
                         PUNITIVE, INDIRECT, INCIDENTAL OR CONSEQUENTIAL DAMAGES OF ANY KIND OR 
                         FOR ANY LOST PROFITS OR LOST SAVINGS, WHETHER BASED IN CONTRACT, TORT 
                         (INCLUDING NEGLIGENCE),<br><br>
                         EQUITY, STRICT LIABILITY, STATUTE OR OTHERWISE, WHICH ARISES OUT OF OR IS IN 
                         ANY WAY CONN CONTENT FOUND HEREIN, (II) ANY FAILURE OR DELAY (INCLUDING, 
                         BUT NOT LIMITED TO THE USE OF OR INABILITY TO USE ANY COMPONENT OF THE 
                         SERVICE OR THIS SITE), OR (III) THE PERFORMANCE OR NON PERFORMANCE BY 
                         CedCommerce.com EVEN IF THE CedCommerce.com HAS BEEN ADVISED OF THE 
                         POSSIBILITY OF DAMAGES TO SUCH PARTIES OR ANY OTHER PARTY.<br><br>
                         <strong>Force Majeure</strong><br><br>
                         CedCommerce.com has no responsibility for and is released from all contractual obligations and 
                         liability (e.g. for damages) if its performance of these Terms and Conditions is affected by an event of 
                         force majeure. For the purpose of this clause, the term “force majeure” means and includes any event 
                         which was not under the control of CedCommerce.com, or was not reasonably foreseeable, including, 
                         but not limited to any natural disaster such as thunderstorm, flood or storm, fire, national emergency, 
                         strike or equivalent labor action, or the unavailability of the Internet for reasons beyond the control of 
                         CedCommerce.com.<br><br>
                         <strong>Jurisdiction</strong><br><br>
                         This Agreement shall be construed and governed in accordance with the laws of the India, and the 
                         parties hereto submit to the exclusive jurisdiction of the courts of the India.
                         Thank you for taking the time to understand our Terms & Conditions.
                         Any questions regarding the Terms and Condition should be addressed to : 
                         shopify@cedcommerce.com </p>
                    </div>
               </div>

                <?= Html::a('View & Download', Yii::$app->request->baseUrl.'/walmart-policy/walmart-bigcommerce.pdf', ['class'=>'btn btn-primary', 'target'=>'_blank']) ?>               
               <?= $form->field($model, 'agreement', ['options'=>['data-error'=>'This is Required.']])->checkbox();?>
               
                <div class="form-group clearfix">
                <?= Html::Button('Next', ['class' => 'next btn btn-primary pull-right']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>

<script type="text/javascript">
     var url = "<?= Data::getUrl('walmart-register/save') ?>";
     var saveFlag = false;
     $('#walmartregistration-form').on('submit', function(event) {
          event.preventDefault();
          $('.top_error').hide();
          $('.top_success').hide();
          $('#LoadingMSG').show();
          if(!saveFlag)
          {
               saveFlag = true;
               $.ajax({
                    method: "POST",
                    url: url,
                    data: $("form").serialize(),
                    dataType : "json"
               })
               .done(function(response) {
                    $('#LoadingMSG').hide();
                    if(response.success) {
                         $('.top_success').html(response.message);
                         $('.top_success').show();
                         nextStep();
                    } else {
                         saveFlag = false;
                         $('.top_error').html(response.message);
                         $('.top_error').show();
                    }
               });
          }
     });

     $(".next").on('click', function(){
          $('#walmartregistration-form').data('yiiActiveForm').submitting = true;
          var resp = $('#walmartregistration-form').yiiActiveForm('validate');
     });
</script>

<script>
$(document).ready(function(){
     //introJs().start();

     //hide or show other "hear about us" field.
     $('#walmartregistration-reference').change(function(){
        if($(this).val()=='Other') {
            $('.field-walmartregistration-other_reference').css('display', 'block');
        } else {
            $('#walmartregistration-other_reference').val("");
            $('.field-walmartregistration-other_reference').css('display', 'none');
        }
     });

     $('input[name="WalmartRegistration[shipping_source][]"]').on('click', function(){
          var OtherFlag = false;
          $('input[name="WalmartRegistration[shipping_source][]"]').each(function(){
               if($(this).is(":checked") && $(this).val()=='Other') {
                    OtherFlag = true;
               }
          });

          if(OtherFlag) {
               $("#other_shipping_source").show();
          } else {
               $("#other_shipping_source").hide();
          }
     });

     $('#walmartregistration-country').change(function(){
        if($(this).val()=='Other') {
            $('.field-walmartregistration-have_valid_tax').show();
            $('.field-walmartregistration-usa_warehouse').show();
        } else {
            $('#walmartregistration-have_valid_tax').val("");
            $('#walmartregistration-usa_warehouse').val("");

            $('.field-walmartregistration-have_valid_tax').hide();
            $('.field-walmartregistration-usa_warehouse').hide();
        }
     });

     $('#walmartregistration-selling_on_walmart').change(function(){
          if($(this).val()=='yes') {
               $('.field-walmartregistration-selling_on_walmart_source').show();

               $('.field-walmartregistration-contact_to_walmart').hide();
               $('.field-walmartregistration-approved_by_walmart').hide();

               $('#walmartregistration-contact_to_walmart').val("");
               $('#walmartregistration-approved_by_walmart').val("");
          } 
          else if($(this).val()=='no') {
               $('.field-walmartregistration-contact_to_walmart').show();
               $('.field-walmartregistration-approved_by_walmart').show();

               $('.field-walmartregistration-selling_on_walmart_source').hide();
               $('#walmartregistration-selling_on_walmart_source').val("");
          } 
          else {
               $('.field-walmartregistration-contact_to_walmart').hide();
               $('#walmartregistration-contact_to_walmart').val("");

               $('.field-walmartregistration-approved_by_walmart').hide();
               $('#walmartregistration-approved_by_walmart').val("");

               $('.field-walmartregistration-selling_on_walmart_source').hide();
               $('#walmartregistration-selling_on_walmart_source').val("");
          }
     });

     $('#walmartregistration-selling_on_walmart_source').change(function(){
        if($(this).val()=='other') {
            $('.field-walmartregistration-other_selling_source').show();
        } else {
            $('#walmartregistration-other_selling_source').val("");

            $('.field-walmartregistration-other_selling_source').hide();
        }
     });
 });
</script>
