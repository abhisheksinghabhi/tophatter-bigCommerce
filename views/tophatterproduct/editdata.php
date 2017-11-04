<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\tophatter\components\Data;
use frontend\modules\tophatter\components\TophatterPromoStatus;
use frontend\modules\tophatter\components\Appinstall;

$shopUrl = [];
$tax_code = Data::GetTaxCode($model, MERCHANT_ID);
$query = "SELECT `shop_url` from `tophatter_shop_details` where `merchant_id`=" . MERCHANT_ID;
$shopUrl = Data::sqlRecords($query, 'one');

$query2 = "SELECT * FROM `tophatter_product` WHERE `product_id` = '".$model->product_id."' AND `merchant_id` =" . MERCHANT_ID ;
$tophatterproduct = Data::sqlRecords($query2, 'one');

$shop_url = is_array($shopUrl) && isset($shopUrl['shop_url']) ? trim($shopUrl['shop_url']) : "";
if (!$tax_code) {
    $tax_code = "";
}

if (!is_null($model->long_description))
    $model->jet_product->description = $model->long_description;

if (is_null($model->short_description) || $model->short_description == '')
    $model->short_description = substr($model->jet_product->description, 0, strpos($model->jet_product->description, '.'));
if ($model->short_description == '')
    $model->short_description = substr($model->jet_product->description, 0, 50);

if (is_null($model->self_description) || $model->self_description == '')
    $model->self_description = $model->jet_product->title;

?>
<div class="container">
    <!-- Modal -->
    <div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" id='edit-content'>
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;font-family: " Comic Sans MS
                    ";"><?= $model->jet_product->title ?></h4>
                </div>
                <div class="modal-body">
                    <div class="jet-product-form">
                        <?php $form = ActiveForm::begin([
                            'id' => 'jet_edit_form',
                            'action' => frontend\modules\tophatter\components\Data::getUrl('tophatterproduct/updateajax/?id=' . $model->product_id),
                            'method' => 'post',
                        ]); ?>
                        <div class="form-group">
                            <input type="hidden" name="JetProduct[product_id]" value="<?= $model->product_id ?>"
                                   id="productid"/>
                            <?= $form->field($model->jet_product, 'sku')->hiddenInput()->label(false); ?>
                           
                            <div class="field-jetproduct">
                                <?php $brand = "";
                                $brand = $model->jet_product->brand;
                                ?>
                                <table class="table table-striped table-bordered">
                                	<thead>
	                                    <tr>
	                                        <th>Title</th>
	                                        <?php
	                                        if ($model->jet_product->type != "variants" || count($attributes) == 0) { ?>
	                                            <!-- <th>Sku</th>
	                                            <th>Price</th> -->
	                                            <th>Quantity</th>
	                                            <?php
	                                        } ?>
	                                        <th>Brand</th>
	                                        <th>Weight</th>
	                                        <th>Product Type</th>
	                                        <th>Description&nbsp;&nbsp;<a id="desc_edit_tag" onclick='editDescription(event)'>edit</a></th>
	                                    </tr>
									</thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?/*= $model->jet_product->title; */?>
                                            <div class="public">
                                            	<input class="form-control tophatter-title" type="text"
                                                   id="tophatter_product_title" name="tophatter_product_title"
                                                   value="<?php if(isset($tophatterproduct['product_title']) && !empty($tophatterproduct['product_title'])){
                                                       echo $tophatterproduct['product_title'];
                                                        }else{
                                                       echo $model->jet_product->title;
                                                       }  ?>">
                                            </div>
                                        </td>
                                        <?php
                                        if ($model->jet_product->type != "variants" || count($attributes) == 0) { ?>
                                            <!-- <td>
                                        <?= $model->jet_product->sku; ?>
                                        </td>
                                        <td>
                                            <?/*= (float)$model->jet_product->price; */?>
                                        </td> -->
                                            <td>
                                                <?/*= $model->jet_product->qty; */?>
                                                <div>
                                                    <div class="pull-left">
                                                        <!--<input class="form-control tophatter-inventory" type="text"
                                                               id="tophatter_product_inventory" name="tophatter_product_inventory"
                                                               value="<?php /*if(isset($tophatterproduct['product_qty']) && !empty($tophatterproduct['product_qty'])){
                                                            echo $tophatterproduct['product_qty'];
                                                        }else{
                                                            echo $model->jet_product->qty;
                                                        }  */?>">-->
                                                        <div class="public">
                                                        <input class="form-control tophatter-inventory" type="text"
                                                               id="tophatter_product_inventory" name="tophatter_product_inventory"
                                                               value="<?php
                                                                   echo $model->jet_product->qty;
                                                                 ?>">
                                                                 </div>
                                                    </div>
                                                    <div class="pull-left">
                                                        <button class="toggle_editor tophatter-inventory-button" type="button"
                                                                onClick="tophatterInventory(this);" title="Upload On tophatter" product-id="<?= $model->product_id ?>" product-type="<?= 'simple' ?>"
                                                                option-id="<?= '' ?>" sku="<?= $model->jet_product->sku ?>"
                                                                option-inventory="<?= (float)$model->jet_product->qty; ?>" fulfillmentLagTime="<?= $model->fulfillment_lag_time ?>">Update
                                                        </button>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </td>
                                            <?php
                                        } ?>
                                        <td>
                                            <input type="text" maxlength="500"
                                                   value="<?= $model->jet_product->brand; ?>" name="JetProduct[brand]"
                                                   class="form-control" id="jetproduct-brand">
                                            <?= $model->jet_product->brand ?>
                                        </td>
                                        <td>
                                            <?= (float)$model->jet_product->weight; ?>
                                        </td>
                                        <td>
                                            <?= $model->jet_product->product_type; ?>
                                        </td>
                                        <td>
                                            <div class="more">
                                                <?php
                                                //var_dump($model->jet_product->description);die;
                                                $truncated = "";
                                                $var_string = "";
                                                $var_string = strip_tags($model->jet_product->description);
                                                $truncated = (strlen($var_string) > 50) ? substr($var_string, 0, 50) . "...<a  onclick='showDescription(event)' title='More Description' href='#'>more</a>" : $var_string;
                                                ?>
                                                <?= $truncated; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <th>
                                        Short Description
                                        &nbsp;&nbsp;
                                        <button type="button" onClick="toggleEditor1(this);" class="toggle_editor tophatter-inventory-button">
                                            Show/Hide Editor
                                        </button>
                                    </th>
                                    <th>
                                        Self Description
                                        &nbsp;&nbsp;
                                        <button type="button" onClick="toggleEditor2(this);" class="toggle_editor tophatter-inventory-button">
                                            Show/Hide Editor
                                        </button>
                                    </th>
                                    <th>Product Tax Code</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?php //echo $model->self_description;die;?>
                                            <textarea maxlength="500" id="shortDescriptionField"
                                                      name="JetProduct[short_description]" class="form-control"
                                                      id="jetproduct-short_description"><?= $model->short_description ?></textarea>
                                        </td>

                                        <td>
                                            <textarea maxlength="500" id="shelfDescriptionField"
                                                      name="JetProduct[self_description]" class="form-control"
                                                      id="jetproduct-self_description"><?= $model->self_description ?></textarea>
                                        </td>
                                        <td>
                                        <div class="public">
                                            <input type="text" name="JetProduct[product_tax]" value="<?= $tax_code; ?>"
                                                   class="form-control" id="inputSelectCode">
                                            </div>
                                            <span class="text-validator">To get product tax code click <a
                                                        target="_blank"
                                                        href="<?= yii\helpers\Url::toRoute(['tophattertaxcodes/index']); ?>">here</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- new fields start -->
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <th>Sku Override</th>
                                    <th>Product Id Override</th>
                                    <th>Fulfillment Lag Time</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="sku_override">
                                                <option value="0" <?php if (!$model->sku_override) {
                                                    echo "selected";
                                                } ?>>NO
                                                </option>
                                                <option value="1" <?php if ($model->sku_override) {
                                                    echo "selected";
                                                } ?>>YES
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="product_id_override">
                                                <option value="0" <?php if (!$model->product_id_override) {
                                                    echo "selected";
                                                } ?>>NO
                                                </option>
                                                <option value="1" <?php if ($model->product_id_override) {
                                                    echo "selected";
                                                } ?>>YES
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                        <div class="public">
                                            <input type="text" name="fulfillment_lag_time"
                                                   value="<?= $model->fulfillment_lag_time; ?>" class="form-control">
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!-- new fields end -->
                                <?php
                                
                                if ($model->jet_product->type == "variants" && (count($attributes) > 0 || count($optionalAttrValues) > 0)) {
                                    echo $form->field($model->jet_product, 'ASIN')->hiddenInput()->label(false);
                                    echo $form->field($model->jet_product, 'upc')->hiddenInput()->label(false);
                                    echo $form->field($model->jet_product, 'mpn')->hiddenInput()->label(false);
                                } else {
                                    ?>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Barcode(UPC/GTIN/ISBN)</th>
                                            <?php if ($model->jet_product->type != "variants" || count($attributes) == 0) { ?>
                                                <th>Sku</th>
                                                <th>Price</th>
                                            <?php } ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="width: 40%">
                                                <label class="general_product_id"
                                                       style="display:none;"><?= trim($model->product_id); ?></label>
                                            <div class="public">
                                                <input type="text" maxlength="500"
                                                       value="<?= $model->jet_product->upc; ?>" name="JetProduct[upc]"
                                                       class="form-control" id="jetproduct-upc" required>
                                            </div>
                                            </td>
                                            <?php if ($model->jet_product->type != "variants" || count($attributes) == 0) { ?>
                                                <td>
                                                    <?= $model->jet_product->sku; ?>
                                                </td>
                                                <td>
                                                    <!--                                            -->
                                                    <? //= (float)$model->jet_product->price;
                                                    ?><!--&nbsp;&nbsp;-->
                                                    <div>
                                                        <div class="pull-left">
                                                        <div class="public">
                                                            <input class="form-control tophatter-price" type="text"
                                                                   id="tophatter_product_price" name="tophatter_product_price"
                                                                   value="<?php if(isset($tophatterproduct['product_price']) && !empty($Tophatterproduct['product_price'])){
                                                                       echo $tophatterproduct['product_price'];
                                                                   }else{
                                                                       echo $model->jet_product->price;
                                                                   }  ?>">
                                                                   </div>
                                                        </div>
                                                        <div class="pull-left">
                                                            <button class="toggle_editor tophatter-price-button" type="button"
                                                                    onClick="tophatterPrice(this);" title="Upload On Tophatter" product-id="<?= $model->product_id ?>" product-type="<?= 'simple' ?>"
                                                                    option-id="<?= '' ?>" sku="<?= $model->jet_product->sku ?>"
                                                                    option-price="<?= (float)$model->jet_product->price; ?>" >Update
                                                            </button>

                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <a href="javascript:void(0);" onclick="priceEdit(this)"
                                                       class="variant-price" product-id="<?= $model->product_id ?>"
                                                       option-id="<?= '' ?>" sku="<?= $model->jet_product->sku ?>"
                                                       option-price="<?= (float)$model->jet_product->price; ?>">
                                                        <?php if (TophatterPromoStatus::promotionRulesExist($model->jet_product->sku, MERCHANT_ID)) { ?>
                                                            Edit Promotional Price
                                                        <?php } else { ?>
                                                            Add Promotional Price
                                                        <?php } ?>
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                } ?>
                            </div>
                            <div id="category_tab">
                                <p style="text-align:center;">
                                    <img src="<?= $loader_img = yii::$app->request->baseUrl . '/frontend/images/batchupload/rule-ajax-loader.gif'; ?>">
                                </p>
                                <p style="text-align:center;">Loading.......</p>
                            </div>
                            <!-- End -->
                       
                            <?php unset($connection); ?>
                        </div>
                        <div id="shhipping_exceptions"> 
 
                            <div class="form-group field-jetproduct-jet_attributes enable_api">
                         
                                <!--start by shivam-->
                                <div>
<!--                                <div id="common_attributes_Wrapper">-->

                                <!--end by shivam-->
                                    <table class="table table-striped table-bordered ced-tophatter-custome-tbl">
                                        <thead>
                                            <tr>
                                                <th>Shipping Allowed</th>
                                                <th>Shipping Method</th>
                                                <th>Shipping Region</th>
                                                <th>Shipping Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="shipping-exceptions-body">
                                            <?php $exceptions = $model->shipping_exceptions;
                                                $exceptions = $exceptions!=''?json_decode($exceptions,true):[];
                                                //print_r($exceptions['isShippingAllowed']);die;
                                                if(isset($exceptions['isShippingAllowed']))
                                                foreach($exceptions['isShippingAllowed'] as $key=>$isShippingAllowed){
                                              ?>
                                            <tr>
                                                <td>
                                                    <select default-value="<?= $isShippingAllowed ?>" class="form-control exceptions" name="exceptions[isShippingAllowed][]">
                                                        <option value="1" <?php echo ($isShippingAllowed == 1) ? 'selected' : ''; ?> >Yes</option>
                                                        <option value="0" <?php echo ($isShippingAllowed == 0) ? 'selected' : ''; ?> >No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select default-value="<?= $exceptions['shipMethod'][$key] ?>" class="form-control exceptions" name="exceptions[shipMethod][]">
                                                        <option value="Value" <?php echo ($exceptions['shipMethod'][$key] == 'Value') ? 'selected' : ''; ?> >Value</option>
                                                        <option value="Standard" <?php echo ($exceptions['shipMethod'][$key] == 'Standard') ? 'selected' : ''; ?>>Standard</option>
                                                        <option value="Express" <?php echo ($exceptions['shipMethod'][$key] == 'Express') ? 'selected' : ''; ?>>Express</option>
                                                        <option value="OneDay" <?php echo ($exceptions['shipMethod'][$key] == 'OneDay') ? 'selected' : ''; ?>>OneDay</option>
                                                        <option value="Freight" <?php echo ($exceptions['shipMethod'][$key] == 'Freight') ? 'selected' : ''; ?>>Freight</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select default-value="<?= $exceptions['shipRegion'][$key] ?>" class="form-control exceptions" name="exceptions[shipRegion][]">
                                                        <option value="STREET_48_STATES" <?php echo ($exceptions['shipRegion'][$key] == 'STREET_48_STATES') ? 'selected' : ''; ?>>STREET_48_STATES</option>
                                                        <option value="PO_BOX_48_STATES" <?php echo ($exceptions['shipRegion'][$key] == 'PO_BOX_48_STATES') ? 'selected' : ''; ?>>PO_BOX_48_STATES</option>
                                                        <option value="STREET_AK_AND_HI" <?php echo ($exceptions['shipRegion'][$key] == 'STREET_AK_AND_HI') ? 'selected' : ''; ?>>STREET_AK_AND_HI</option>
                                                        <option value="PO_BOX_AK_AND_HI" <?php echo ($exceptions['shipRegion'][$key] == 'PO_BOX_AK_AND_HI') ? 'selected' : ''; ?>>PO_BOX_AK_AND_HI</option>
                                                        <option value="STREET_US_PROTECTORATES" <?php echo ($exceptions['shipRegion'][$key] == 'STREET_US_PROTECTORATES') ? 'selected' : ''; ?>>STREET_US_PROTECTORATES</option>
                                                    </select>
                                                </td>
                                                <td><input default-value="<?= $exceptions['shipPrice'][$key] ?>" class="form-control exceptions" value="<?php echo $exceptions['shipPrice'][$key] ? $exceptions['shipPrice'][$key]  : '0.00'; ?>" type="text" name="exceptions[shipPrice][]"/></td>
                                                <td>
                                                    <button class="btn btn-primary" type="button" onclick="deleteException(this)">Delete</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                
                                                <td colspan="5"><button style="float:right;"  class="btn btn-primary" type="button" id="add-exception-button">Add Shipping Exception</button></td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>

                                <div id="jet_Attrubute_html" class="Attrubute_html">
                                    <table class="table table-striped table-bordered">
                                    </table>
                                 </div>    
                            </div>
        
                         </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    
                    <script>
    
                        $script = '<td>\
                                                <select class="form-control" name="exceptions[isShippingAllowed][]">\
                                                    <option value="1">Yes</option>\
                                                    <option value="0">No</option>\
                                                </select>\
                                            </td>\
                                            <td>\
                                                <select class="form-control" name="exceptions[shipMethod][]">\
                                                    <option value="Value">Value</option>\
                                                    <option value="Standard">Standard</option>\
                                                    <option value="Express">Express</option>\
                                                    <option value="OneDay">OneDay</option>\
                                                    <option value="Freight">Freight</option>\
                                                </select>\
                                            </td>\
                                            <td>\
                                                <select class="form-control"  name="exceptions[shipRegion][]">\
                                                    <option value="STREET_48_STATES">STREET_48_STATES</option>\
                                                    <option value="PO_BOX_48_STATES">PO_BOX_48_STATES</option>\
                                                    <option value="STREET_AK_AND_HI">STREET_AK_AND_HI</option>\
                                                    <option value="PO_BOX_AK_AND_HI">PO_BOX_AK_AND_HI</option>\
                                                    <option value="STREET_US_PROTECTORATES">STREET_US_PROTECTORATES</option>\
                                                </select>\
                                            </td>\
                                            <td><input class="form-control" value="0.00" type="text" name="exceptions[shipPrice][]"/></td>\
                                            <td>\
                                                <button class="btn btn-primary" type="button" onclick="deleteException(this)">Delete</button>\
                                            </td>';
                            document.getElementById('add-exception-button').onclick=function(){
                                var newTr = document.createElement("TR"); 
                                newTr.innerHTML = $script;
                                document.getElementById('shipping-exceptions-body').appendChild(newTr);
                            }
                            function deleteException(element){
                                element.parentNode.parentNode.parentNode.removeChild(element.parentNode.parentNode);
                            }
                    </script>
                    
            </div>
             <div class="modal-footer Attrubute_html">
                    <div class="v_error_msg" style="display:none;"></div>
                    <div class="v_success_msg alert-success alert" style="display:none;"></div>
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'id' => 'saveedit', 'onclick' => 'saveData()']) ?>
                    <?php if ($shop_url != "") {
                        $bigcomClient = new Appinstall();
    	                $checkdetails = $bigcomClient->storedetails(TOPHATTER_APP_KEY,TOKEN,STOREHASH);
                        $secure_url=$checkdetails['secure_url'];
                    
                    ?>
                        <a class="btn btn-primary"
                           href="<?= $secure_url; ?>/manage/products/<?= trim($model->jet_product->bigproduct_id); ?>/edit"
                           target="_blank" class=""  data-toggle="tooltip"
                           title="To edit product information from Store">Edit from Store</a>

                    <?php } ?>
                    <button type="button" class="btn btn-primary" id="sync_with_btn"  title="To Sync product information with Store"  onclick="cnfrmSync()">Sync With
                        Store
                    </button>
                    <button type="button" class="btn btn-primary" onclick="cnfrmDelete()">Delete From App</button>
                    <button type="button" class="btn btn-default" id="edit-modal-close" data-dismiss="modal" onclick="close()">Close
                    </button>
             </div>
             
        </div>
         <div class="modal-content" id="product_description" style="padding:20px; display:none">
                <div id="product_description_content">
                    <?= $model->jet_product->description ?>
                </div>
                <button type="button" style="margin-left: 90%;" class="btn btn-primary" id="descriptionClose"
                        onclick="closedescription()">Close
                </button>
         </div>
    </div>
</div>

<script type="text/javascript">
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $(document).ready(function () {
       // $('#myModal input').attr();
        //var type = $('#myModal input').attr('type');
        //console.log($('#myModal input'));
        var count = 1;
        $('#myModal input').each(function () {
           var type = $(this).attr("type");
           if(type == "text"){
            $(this).after('<span class="glyphicon glyphicon glyphicon-pencil"></span>');
            }
        });
        //console.log("kkj");
      /*  if(type == "hidden"){
            $('#myModal input').after('<span class="glyphicon glyphicon glyphicon-pencil"></span>');
        }*/
        $('[data-toggle="tooltip"]').tooltip({html: true});
// $('[data-toggle="tooltip"]').tooltip();   
        /* $('.danger').popover({
         html : true,
         content: function() {
         return $('#popover_content_wrapper').html();
         }
         });  */
    });

    function close(){
    	 $('#edit_tophatter_product #myModal').modal('hide');
    }
    function saveData() {
        var postData = j$("#jet_edit_form").serializeArray();
        //console.log(postData);
        var formURL = j$("#jet_edit_form").attr("action");
        var type = '<?= $model->jet_product->type ?>';
        var attr_count = '<?= count($attributes) ?>';
        if (type == "variants" && attr_count > 0) {
           // if (checkselectedBeforeSubmit()) {
                j$('#LoadingMSG').show();
                j$.ajax(
                    {
                        url: formURL,
                        type: "POST",
                        dataType: 'json',
                        data: postData,
                        _csrf: csrfToken,
                        success: function (data, textStatus, jqXHR) {
                            j$('#LoadingMSG').hide();
                            if (data.success) {
                                j$('.v_success_msg').html('');
                                j$('.v_success_msg').append(data.success);
                                j$('.v_error_msg').hide();
                                j$('.v_success_msg').show();

                            }
                            else {
                                j$('.v_error_msg').html('');
                                j$('.v_error_msg').append(data.error);
                                j$('.v_success_msg').hide();
                                j$('.v_error_msg').show();


                            }
                            //data: return data from server
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            j$('.v_error_msg').html('');
                            j$('#LoadingMSG').hide();
                            j$('.v_error_msg').append("something went wrong..");
                            j$('.v_error_msg').show();
                        }
                    });
            /*}
            else {
                return false;
            }*/
        }
        else {
            if (checkRequiredAttributes()) {
                j$('#LoadingMSG').show();
                //submit simple form
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
                            else {
                                j$('.v_error_msg').html('');
                                j$('.v_error_msg').append(data.error);
                                j$('.v_success_msg').hide();
                                j$('.v_error_msg').show();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            j$('.v_error_msg').append('');
                            j$('#LoadingMSG').hide();
                            j$('.v_error_msg').append("something went wrong..");
                            j$('.v_error_msg').show();
                            //console.log(textStatus);
                        }
                    });
            }
            else {
                alert("Please fill all required fields.");
            }
        }

    }
    function showDescription(event) {
        event.preventDefault();
        j$('#edit-content').css('display', 'none');
        j$('#product_description').css('display', 'block');
    }
    function closedescription() {
        j$('#edit-content').css('display', 'block');
        j$('#product_description').css('display', 'none');
    }

    function checkRequiredAttributes() {
        var flag = true;
        j$('input.simple-required').each(function () {
            if (j$(this).val() == '')
                flag = false;
        });

        j$('select.simple-required').each(function () {
            if (j$(this).find(":selected").val() == '')
                flag = false;
        });
        return flag;
    }
</script>

<!-- Code By Himanshu Start -->
<?php
$categoryTabUrl = Data::getUrl('tophatterproduct/render-category-tab');
?>
<script type="text/javascript">
    j$(document).ready(function () {
        //setTimeout(function(){ renderCategoryTab(); }, 5000);
        renderCategoryTab();
    });

    function renderCategoryTab() {
        var csrf_token = $('meta[name="csrf-token"]').attr("content");
        /*j$.ajax(
         {
         url : ,
         type: "POST",
         dataType: 'json',
         data : {id : ,_csrf : csrf_token},
         success:function(data)
         {
         j$('#category_tab').html(data.html);
         }
         });*/
        j$.ajax({
            showLoader: true,
            url: '<?= $categoryTabUrl ?>',
            type: "POST",
            dataType: 'json',
            data: {id: <?= $id ?>, _csrf: csrf_token}
        }).done(function (data) {
            j$('#category_tab').html(data.html);
        });
    }
</script>
<!-- Code By Himanshu End -->

<div id="price-edit"></div>

<div id="description-edit">
    <div class="container">
        <div id="description-edit-modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id='edit-content'>
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align: center;font-family: " Comic Sans MS";">
                        Edit Description
                        </h4>
                    </div>
                    <div class="modal-body">
                        <textarea cols="50" id="textarea-description"><?= $model->jet_product->description ?></textarea>
                    </div>
                    <div class="modal-footer Attrubute_html" style="padding-right:24px;">
                        <div style="display:none;" class="alert-error alert"></div>
                        <div style="display:none;" class="alert-success alert"></div>

                        <button class="btn btn-primary" onclick="saveDescription(event)" id="save-description"
                                type="submit">Save
                        </button>
                        <button data-dismiss="modal" id="close_desc_modal" class="btn btn-default" type="button">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirm box html  -->
<div id="confirm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="cnfrm-yes">Yes</button>
                <button type="button" class="btn" id="cnfrm-no" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<?php
$sync_fields = [
    'title' => 'Title',
    'sku' => 'Sku',
    'image' => 'Image',
    'inventory' => 'Inventory',
    'parent_inventory'=>'Parent Inventory',
    'calculated_price'=>'Calculated price',
    'weight' => 'Weight',
    'price' => 'Price',
    'upc' => 'UPC/Barcode/Other',
    'variant_option_values' => 'Variant Option Values',
    'brand' => 'Brand',
    'product_type' => 'Product Type',
    'description' => 'Description'
];
?>
<!-- Modal Sync Form html  -->
<div id="sync" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="sync-fields-form">
                    <h4>Select Fields to Sync with Store :</h4>
                    <div class="sync-fields">
                        <?php foreach ($sync_fields as $sync_index => $sync_value) : ?>
                            <div class="checkbox_options">
                                <input type="checkbox" class="sync-fields-checkbox"
                                       name="sync-fields[<?= $sync_index ?>]" value="1"/>
                                <label><?= $sync_value ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="sync-yes">Sync</button>
                <button type="button" class="btn" id="sync-cancel" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Confirm box html for delete product  -->
<div id="confirm-delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                
                <div>
                    
                    <?php if ($model->status != "Not Uploaded") {?>
                        <h4>Are you sure?</h4>
                    <input type="checkbox" name="retire" value="1" id="retire-from-tophatter"/>
                    <label style="font-weight:normal; font-size:14px;" for="retire-from-walmar">Delete(Retire) this
                        Product from app and Tophatter?</label>
                    <?php } else {?>
                        <label style="font-weight:bold; font-size:16px;" for="retire-from-walmar"> Are you sure want to delete this product from app?</label>
                    <?php } ?>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="deleteFromBigcommerce()" id="delete">Delete</button>
                <button type="button" id="close-cnfrm-modal" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php
$merchant_id = MERCHANT_ID;
$urlTophatterPromotions = \yii\helpers\Url::toRoute(['tophatterproduct/promotions']);
$urlTophatterPrice = \yii\helpers\Url::toRoute(['tophatterproduct/updatetophatterprice']);
$urlTophatterInventory = \yii\helpers\Url::toRoute(['tophatterproduct/updatetophatterinventory']);

?>
<script type="text/javascript">

    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    function priceEdit(element) {
        var url = '<?= $urlTophatterPromotions; ?>';
        var merchant_id = '<?= $merchant_id;?>';
        //j$('#LoadingMSG').show();
        $.ajax({
            method: "post",
            url: url,
            data: {
                sku: element.getAttribute('sku'),
                product_id: element.getAttribute('product-id'),
                merchant_id: merchant_id,
                option_id: element.getAttribute('option-id'),
                price: element.getAttribute('option-price'),
                _csrf: csrfToken
            }
        })
            .done(function (msg) {
                //console.log(msg);
                $('#LoadingMSG').hide();
                $('#price-edit').html(msg);
                //j$('#edit_tophatter_product').css("display","block");
                /*$('#price-edit #price-edit-modal').modal({
                 // keyboard: false,
                 //backdrop: 'static'
                 });*/

                $('body').attr('data-promo', 'show');
                $('#edit-modal-close').click();
                $("#edit_tophatter_product #myModal").on('hidden.bs.modal', function () {
                    if ($('body').attr('data-promo') == 'show') {
                        $('#price-edit #price-edit-modal').modal('show');
                        $('body').removeAttr('data-promo');
                    }
                });

                reloadEditModal();//file index.php

            });

    }
    function goToEditBigcommerce() {
        $('#myModal').modal('hide');
    }

    function tophatterPrice(element) {

        var price= $('#tophatter_product_price'+element.getAttribute('option-id')).val();

        var url = '<?= $urlTophatterPrice; ?>';
        var merchant_id = '<?= $merchant_id;?>';
        $.ajax({
            method: "post",
            url: url,
            dataType: 'json',
            data: {
                sku: element.getAttribute('sku'),
                id: element.getAttribute('product-id'),
                type: element.getAttribute('product-type'),
                merchant_id: merchant_id,
                option_id: element.getAttribute('option-id'),
                price: price,
//                price: element.getAttribute('option-price'),
//                data:data,
                _csrf: csrfToken
            }
        })
            .done(function (msg) {
                if (msg.success) {
                    j$('.v_success_msg').html('');
                    j$('.v_success_msg').append("Price Updated On Tophatter Successfully.");
                    j$('.v_error_msg').hide();
                    j$('.v_success_msg').show();
                }
                else if (msg.error) {
                    j$('.v_error_msg').html('');
                    j$('.v_error_msg').append(msg.message);
                    j$('.v_success_msg').hide();
                    j$('.v_error_msg').show();
                }
                else {
                    j$('.v_error_msg').html('');
                    j$('.v_error_msg').append("something went wrong.");
                    j$('.v_success_msg').hide();
                    j$('.v_error_msg').show();
                }

            });

    }

    function tophatterInventory(element) {

        var inventory= $('#tophatter_product_inventory'+element.getAttribute('option-id')).val();

        var url = '<?= $urlTophatterInventory; ?>';
        var merchant_id = '<?= $merchant_id;?>';
        $.ajax({
            method: "post",
            url: url,
            dataType: 'json',
            data: {
                sku: element.getAttribute('sku'),
                id: element.getAttribute('product-id'),
                type: element.getAttribute('product-type'),
                merchant_id: merchant_id,
                option_id: element.getAttribute('option-id'),
                fulfillmentLagTime:element.getAttribute('fulfillmentLagTime'),
                variant_id:element.getAttribute('variant_id'),
                qty: inventory,
                _csrf: csrfToken
            }
        })
            .done(function (msg) {
                if (msg.success) {
                    j$('.v_success_msg').html('');
                    j$('.v_success_msg').append("Inventory Updated On Tophatter Successfully.");
                    j$('.v_error_msg').hide();
                    j$('.v_success_msg').show();
                }
                else if (msg.error) {
                    j$('.v_error_msg').html('');
                    j$('.v_error_msg').append(msg.message);
                    j$('.v_success_msg').hide();
                    j$('.v_error_msg').show();
                }
                else {
                    j$('.v_error_msg').html('');
                    j$('.v_error_msg').append("something went wrong.");
                    j$('.v_success_msg').hide();
                    j$('.v_error_msg').show();
                }

            });

    }
</script>

<script type="text/javascript">

    function editDescription(event) {
        $('body').attr('data-desc', 'show');
        $('#edit-modal-close').click();
        $("#edit_tophatter_product #myModal").on('hidden.bs.modal', function () {
            if ($('body').attr('data-desc') == 'show') {
                $('#description-edit #description-edit-modal').modal('show');
                $('body').removeAttr('data-desc');
            }
        });

        $("#description-edit #description-edit-modal").on('shown.bs.modal', function () {
            var editor = new nicEditor({buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'subscript', 'superscript', 'strikethrough', 'removeformat', 'indent', 'outdent', 'hr', 'image', 'forecolor', 'bgcolor', 'link', 'unlink', 'fontSize', 'fontFamily', 'fontFormat', 'xhtml']/*fullPanel : true*/}).panelInstance('textarea-description');
        });

        $("#description-edit #description-edit-modal").on('hidden.bs.modal', function () {
            $('#edit_tophatter_product #myModal').modal('show');
        });
    }

    function saveDescription(event) {
        j$('#LoadingMSG').show();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        var nicInstance = nicEditors.findEditor('textarea-description');
        var description = nicInstance.getContent();

        var url = "<?= Data::getUrl('tophatterproduct/save-description') ?>";
        var productId = $("#productid").val();

        $.ajax({
            method: "post",
            url: url,
            dataType: "json",
            data: {product_id: productId, description: description, _csrf: csrfToken}
        })
            .done(function (response) {
                j$('#LoadingMSG').hide();
                if (response.success) {
                    $('#product_description_content').html(description);
                    $('#textarea-description').html(description);

                    var newDesc = description.replace(/(<([^>]+)>)/ig, "");

                    if (newDesc.length > 50) {
                        var moreDesc = newDesc.substr(0, 50);

                        moreDesc = moreDesc + "...<a  onclick='showDescription(event)' title='More Description' href='#'>more</a>";
                        //moreDesc = moreDesc + '<a onclick="editDescription(event)">edit</a>';

                        $('.more').html(moreDesc);
                    }
                    else {
                        newDesc = newDesc + '<a onclick="editDescription(event)">edit</a>';
                        $('.more').html(newDesc);
                    }

                    j$('#close_desc_modal').click();
                    
                }
                else if (response.error) {
                    alert(response.message);
                }
                else {
                    alert("something went wrong.");
                }
            });
    }

</script>

<script type="text/javascript">
    var area1, area2;

    function toggleEditor1() {
        if (!area1) {
            area1 = new nicEditor({buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'subscript', 'superscript', 'strikethrough', 'removeformat', 'indent', 'outdent', 'hr', 'image', 'forecolor', 'bgcolor', 'link', 'unlink', 'fontSize', 'fontFamily', 'fontFormat', 'xhtml']/*fullPanel : true*/}).panelInstance('shortDescriptionField', {hasPanel: true});

            area1.addEvent('blur', function () {
                if (area1) {
                    area1.removeInstance('shortDescriptionField');
                    area1 = null;
                }
            });
        } else {
            area1.removeInstance('shortDescriptionField');
            area1 = null;
        }
    }

    function toggleEditor2() {
        if (!area2) {
            area2 = new nicEditor({buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'subscript', 'superscript', 'strikethrough', 'removeformat', 'indent', 'outdent', 'hr', 'image', 'forecolor', 'bgcolor', 'link', 'unlink', 'fontSize', 'fontFamily', 'fontFormat', 'xhtml']/*fullPanel : true*/}).panelInstance('shelfDescriptionField', {hasPanel: true});

            area2.addEvent('blur', function () {
                if (area2) {
                    area2.removeInstance('shelfDescriptionField');
                    area2 = null;
                }
            });
        } else {
            area2.removeInstance('shelfDescriptionField');
            area2 = null;
        }
    }

    function cnfrmSync() {
        $('body').attr('data-sync', 'show');
        $('#edit-modal-close').click();
        $("#edit_tophatter_product #myModal").on('hidden.bs.modal', function () {
            if ($('body').attr('data-sync') == 'show') {
                $('#sync').modal('show');
                $('body').removeAttr('data-sync');
            }
        });

        $("#sync").on('shown.bs.modal', function () {
            $('#sync-yes').unbind('click');
            $('#sync-yes').on('click', function () {
                syncWithBigCommerce();
            });
        });

        $("#sync").on('hidden.bs.modal', function () {
            $('#edit_tophatter_product #myModal').modal('show');
        });
    }

    function syncWithBigCommerce() {
        var selectCount = 0;
        $.each($(".sync-fields-checkbox"), function () {
            if ($(this).is(':checked') === true) {
                selectCount++;
            }
        });

        if (selectCount) {
            $('#sync-cancel').click();
            $('#LoadingMSG').show();
            var url = "<?= Data::getUrl('tophatterscript/bigcomproductsync') ?>";
            var productId = $("#productid").val();

            var fields = $("#sync-fields-form").serialize();

            $.ajax({
                method: "post",
                url: url,
                dataType: "json",
                data: {product_id: productId, _csrf: csrfToken, sync_fields: fields}
            })
                .done(function (response) {
                    $('#LoadingMSG').hide();
                    if (response.success) {
                        alert(response.message);
                        window.location.reload();
                    }
                    else if (response.error) {
                        alert(response.message);
                    }
                    else {
                        alert("something went wrong.");
                    }
                });
        }
        else {
            alert("Please select fields to sync.");
        }
        $("#sync-fields-form")[0].reset();
    }

    function cnfrmDelete() {
        $('body').attr('data-cnfrmdel', 'show');
        $('#edit-modal-close').click();
        $("#edit_tophatter_product #myModal").on('hidden.bs.modal', function () {
            if ($('body').attr('data-cnfrmdel') == 'show') {
                $('#confirm-delete').modal('show');
                $('body').removeAttr('data-cnfrmdel');
            }
        });

        $("#confirm-delete").on('hidden.bs.modal', function () {
            $('#edit_tophatter_product #myModal').modal('show');
        });
    }

    function deleteFromBigcommerce() {
        j$('#close-cnfrm-modal').click();
        j$('#LoadingMSG').show();
        //alert('Click OK for confirmation for deletion');
        var url = "<?= Data::getUrl('tophatterscript/deleteproduct') ?>";
        var productId = $("#productid").val();
        var Retire = 0;
        if ($("#retire-from-tophatter").is(":checked")) {
            Retire = 1;
        }

        $.ajax({
            method: "post",
            url: url,
            dataType: "json",
            data: {product_id: productId, _csrf: csrfToken, retire: Retire}
        })
            .done(function (response) {
                j$('#LoadingMSG').hide();
                if (response.success) {
                    //alert("Product Deleted Successfully.");
                    window.location.reload();
                }
                else if (response.error) {
                    alert(response.message);
                }
                else {
                    alert("something went wrong.");
                }
            });
    }
    

</script>

<style>
    .tophatter-price {
        width: 50px;
    }
    .tophatter-inventory {
        width: 50px;
    }
    .tophatter-price-button
    {
        background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #73efed 0%, #3b67dd 100%) repeat scroll 0 0;
        border: 1px solid #f2f2f2;
        color: #fff;
        font-size: 13px;
        margin: 0;
        padding: 5px 5px;
        text-transform: capitalize;
        transition: all 0.2s ease 0s;
    }
    .tophatter-inventory-button
    {
        background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #73efed 0%, #3b67dd 100%) repeat scroll 0 0;
        border: 1px solid #f2f2f2;
        color: #fff;
        font-size: 13px;
        margin: 0;
        padding: 5px 5px;
        text-transform: capitalize;
        transition: all 0.2s ease 0s;
    }

    .modal-lg{
        width: 1024px !important;
    }
    .tophatter_price{
        width: 151px;
    }
    .tophatter_inventory{
        width: 151px;
    }
	.field-jetproduct .public input {
	  display: inline-block;
	  margin-right: 12px !important;
	  width: 74%;
	}
	.field-jetproduct .public span {
	  display: inline-block;
	}
</style>
