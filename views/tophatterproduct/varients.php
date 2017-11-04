<?php
use frontend\modules\tophatter\components\Data;
use frontend\modules\tophatter\components\AttributeMap;
use frontend\modules\tophatter\components\TophatterPromoStatus;

$dropdown_option_arr = array();
$id = $model->category;
$product_type = $model->jet_product->type;
$product_id = $model->product_id;
$sku = $model->jet_product->sku;
$merchant_id = $model->merchant_id;
$viewVariants = \yii\helpers\Url::toRoute(['tophatterproduct/gettophatterdata']);
$option_status = ['PUBLISHED', 'UNPUBLISHED', 'STAGE'];

?>
<?php
$v = 0;
if (is_array($attributes) && count($attributes) > 0) {
    foreach ($attributes as $value) {
        $attr_id = "";
        if (is_array($value)) {
            foreach ($value as $key => $val) {
                $attr_id = $key;
                if (is_array($val)) {
                    /*foreach ($val as $wal_attr_code) {
                        if($wal_attr_code != $key){
                            $attr_id .= AttributeMap::ATTRIBUTE_PATH_SEPERATOR.$wal_attr_code;
                        }
                    }*/
                    $attr_id = implode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $val);
                }
                break;
            }
        } else {
            $attr_id = $value;
        }


        if (is_array($unit_attributes) && count($unit_attributes) > 0) {
            $explode = explode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $attr_id);

            if (array_key_exists($explode[0], $unit_attributes)) {

                /*$opt_arr = array();
                $opt_arr['name'] = $attr_id;
                $opt_arr['value'] = $attr_id;
//                $indexTmp = $unit_attributes[$explode];
                $indexTmp = implode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $unit_attributes[$explode[0]]);
                $opt_arr['select'] = explode(',', $requiredAttrValues[$indexTmp]);
//                $opt_arr['select'] = $requiredAttrValues[$indexTmp];
                $opt_arr['select_name'] = $indexTmp;
                $opt_arr['select_value'] = isset($common_attr_values[$indexTmp]) ? $common_attr_values[$indexTmp] : '';
                $dropdown_option_arr[] = $opt_arr;
                $v++;*/
                $opt_arr = array();
                $opt_arr['name'] = $attr_id;
                $opt_arr['value'] = $attr_id;
//                $indexTmp = implode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $unit_attributes[$explode[0]]);
                $indexTmp = $unit_attributes[$explode[0]];
//                $opt_arr['select'] = explode(',', $requiredAttrValues[$indexTmp]);
                //$opt_arr['select'] = $requiredAttrValues[$indexTmp];
                $opt_arr['select_name'] = $indexTmp;
               // $opt_arr['select_value'] = isset($common_attr_values[$indexTmp]) ? $common_attr_values[$indexTmp] : '';
                $dropdown_option_arr[] = $opt_arr;
                $v++;
            } else {
                $opt_arr = array();
                $opt_arr['name'] = $attr_id;
                $opt_arr['value'] = $attr_id;
                $dropdown_option_arr[] = $opt_arr;
                $v++;
            }
        } else {

            $opt_arr = array();
            $opt_arr['name'] = $attr_id;
            $opt_arr['value'] = $attr_id;
            $dropdown_option_arr[] = $opt_arr;
            $v++;

        }
    }
    unset($attributes);
    unset($result);
    ?>
    <!--</ul>-->
    <?php
    if ($product_type == 'variants') {
        $shopifyattribues = array();
        //$shopifyattribues = json_decode($model->jet_product->attr_ids, true) ?: [];
        $shopifyattribues = json_decode(stripslashes($model->jet_product->bigcom_attr), true) ?: [];
        $tophatter_attributes_arr = array();
        if ($model->tophatter_attributes != "") {
            $tophatter_attributes_arr = json_decode($model->tophatter_attributes, true);
        }
        ?>
        <script type="text/javascript">
            function disablealltextsnselects(ele, value) {
                j$(ele).parent().find('.unit_dropdown_div_class').hide();
                //j$(ele).parent().find('.unit_dropdown_div_class .unit_dropdown').hide();
                j$(ele).parent().find('.unit_dropdown_div_class .unit_dropdown').prop("disabled", true);
            }

            function checksame() {
                var karr = [];
                var a = "";
                var z = "";
                <?php foreach($shopifyattribues as $key=>$val){?>
                karr.push("#sel_<?=$key?> option:selected");
                <?php }?>

                for (k = 0; k < karr.length; k++) {
                    for (b = k + 1; b < karr.length; b++) {
                        a = "";
                        z = "";
                        a = j$(karr[k]).val();
                        z = j$(karr[b]).val();
                        if (a == z && a != "") {
                            return false;
                        }
                    }
                }
                return true;
            }

            function checkBlankInputsBeforeSubmit() {
                var parr = [];
                <?php foreach($shopifyattribues as $key=>$val){?>
                parr.push(".input_<?=$key?>");
                <?php }?>
                var isDisabled_new = "";
                var old_val = "";
                var new_val = "";
                var isDisabled_old = "";
                var retflag = false;
                for (k = 0; k < parr.length; k++) {
                    j$(parr[k]).each(function (e) {
                        isDisabled_new = "";
                        new_val = "";
                        isDisabled_old = "";
                        old_val = "";
                        isDisabled_new = j$(parr[k]).is(':disabled');
                        new_val = j$(parr[k]).val();
                        isDisabled_old = j$(parr[k]).parent().find('input[type=text]').eq(0).is(':disabled');
                        old_val = j$(parr[k]).parent().find('input[type=text]').eq(0).val();
                        if (isDisabled_new && isDisabled_old) {
                            retflag = true;
                            return false;
                        } else {
                            if (isDisabled_new && old_val == "") {
                                retflag = true;
                                return false;
                            }
                            if (isDisabled_old && new_val == "") {
                                retflag = true;
                                return false;
                            }
                        }
                    });
                    if (retflag) {
                        return false;
                    }
                }
                if (retflag) {
                    return false;
                }
                return true;
            }

            function checkselectedBeforeSubmit() {
                var sarr = [];
                var g = "";
                var addhtml = "";
                <?php foreach($shopifyattribues as $key=>$val){?>
                sarr.push("#sel_<?=$key?> option:selected");
                <?php }?>

                j$('.v_success_msg').hide();
                if (!checkBlankInputsBeforeSubmit()) {
                    addhtml = "Please fill all BigCommerce Option(s).";
                    alert(addhtml);
                    j$('.v_error_msg').html(addhtml);
                    j$('.v_error_msg').show();
                    return false;
                }

                if (!checkCommonAttributes()) {
                    addhtml = "Please fill Common Attributes.";
                    alert(addhtml);
                    j$('.v_error_msg').html(addhtml);
                    j$('.v_error_msg').show();
                    return false;
                }

                if (!checkOverrideFields()) {
                    addhtml = "Either 'Sku Override' OR 'Product Id Override' can be set to 'YES' at a time.";
                    alert(addhtml);
                    j$('.v_error_msg').html(addhtml);
                    j$('.v_error_msg').show();
                    return false;
                }

                for (m = 0; m < sarr.length; m++) {
                    g = "";
                    g = j$(sarr[m]).val();
                    if (g != "") {
                        return true;
                    }
                }
                var errorMsg = "Please map atleast one variant option with Tophatter Attribute.";
                j$('.v_error_msg').html(errorMsg);
                alert(errorMsg);
                j$('.v_error_msg').show();
                return false;
            }

            function checkCommonAttributes() {
                var flag = true;
                j$('input.common_required').each(function () {
                    if (j$(this).val() == '')
                        flag = false;
                });

                j$('select.common_required').each(function () {
                    if (j$(this).find(":selected").val() == '')
                        flag = false;
                });
                return flag;
            }

            function checkOverrideFields() {
                var flag = true;

                var id_override_val = j$("select[name='product_id_override'] option:selected").val();
                var sku_override_val = j$("select[name='sku_override'] option:selected").val();

                if (id_override_val == sku_override_val && id_override_val == '1')
                    flag = false;

                return flag;
            }

            function addRemoveRequiredAttributes() {
                //array of required attributes on tophatter
                var requiredAttr = [];
                <?php foreach ($required as $req_attr) { ?>
                requiredAttr.push("<?= $req_attr?>");
                <?php } ?>

                //array of selected or mapped tophatter attributes with shopify option
                var selectedVariantAttr = [];
                j$('.variant_attributes_selector').each(function () {
                    selectedVariantAttr.push(j$(this).find(":selected").val());
                });

                //array of unit type attributes
                var unitAttr = [];

                //array of unit type attribute values
                var unitAttrValues = [];

                //array of variant tophatter attributes
                var variantAttr = [];
                <?php foreach ($dropdown_option_arr as $option_arr) {
                if(isset($option_arr['select']) && count($option_arr['select'])):
                $name = str_replace(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, '_', $option_arr['value']);
                ?>
                unitAttr.push({
                    "<?= $name?>": {
                        "main_attr_name": "<?= $option_arr['name']?>",
                        "unit_attr_name": "<?= $option_arr['select_name']?>",
                        "unit_options": "<?= implode(',', $option_arr['select'])?>",
                        "unit_attr_value": "<?= $option_arr['select_value']?>"
                    }
                });
                <?php endif; ?>
                variantAttr.push("<?= $option_arr['value']?>");
                <?php } ?>


                variantAttr.forEach(function (attr) {
                    /*console.log(attr);
                     console.log(requiredAttr);*/
                    if (j$.inArray(attr, requiredAttr) !== -1) {
                        var attr_code = attr.replace("<?=AttributeMap::ATTRIBUTE_PATH_SEPERATOR?>", "_");
                        var req_element_id = 'req_attr_' + attr_code;
                        if (j$.inArray(attr, selectedVariantAttr) !== -1) {
                            j$("#" + req_element_id).remove();

                            //hide common attributes section if there is no common attributes.
                            if ($('#common_attributes_Wrapper tbody tr').length == 0) {
                                $('#common_attributes_Wrapper').hide();
                            }
                        }
                        else {
                            if (!$("#" + req_element_id).length) {
                                var main_attr_val = getCommonAttributeValue(attr_code);
                                if (inArrayExist(unitAttr, attr_code)) {
                                    var data = getValueFromArray(unitAttr, attr_code);
                                    createVariantFieldWithUnitField(req_element_id, attr, data, main_attr_val);
                                }
                                else {
                                    createVariantField(req_element_id, attr, main_attr_val);
                                }
                            }
                        }
                    }
                });
            }

            function createVariantField(req_element_id, attr, main_attr_val) {
                var reqAttrHtml = '<tr id="' + req_element_id + '">';
                reqAttrHtml += '<td style="width:50%">' + attr + '</td>';
                reqAttrHtml += '<td style="width:50%">';
                reqAttrHtml += '<input type="text" class="common_required form-control" name="common_attributes[' + attr + ']" value="' + main_attr_val + '">';
                reqAttrHtml += '<span class="text-validator">' + attr + ' attribute is required</span>';
                reqAttrHtml += '</td>';
                reqAttrHtml += '</tr>';

                j$("#common_attributes_Wrapper").show();
                j$("#common_attributes_Wrapper tbody").append(reqAttrHtml);
            }

            function createVariantFieldWithUnitField(req_element_id, attr, data, main_attr_val) {
                var unitOptions = data.unit_options;
                unitOptions = unitOptions.split(',');

                var main_attr = data.main_attr_name;
                var unit_attr = data.unit_attr_name;
                var unit_attr_val = data.unit_attr_value;

                var reqAttrHtml = '<tr id="' + req_element_id + '">';
                reqAttrHtml += '<td style="width:50%">' + attr + '</td>';
                reqAttrHtml += '<td style="width:50%">';
                reqAttrHtml += '<div>';
                reqAttrHtml += '<input type="text" class="common_required form-control" name="common_attributes[' + attr + ']" value="' + main_attr_val + '">';
                reqAttrHtml += '<span class="text-validator">' + attr + ' attribute is required</span>';
                reqAttrHtml += '</div>';
                reqAttrHtml += '<div>';
                reqAttrHtml += '<select class="common_required form-control" name="common_attributes[' + unit_attr + ']">';

                unitOptions.forEach(function (option) {
                    if (unit_attr_val == option)
                        reqAttrHtml += '<option selected="selected" value="' + option + '">' + option + '</option>';
                    else
                        reqAttrHtml += '<option value="' + option + '">' + option + '</option>';
                });

                reqAttrHtml += '</select>';
                reqAttrHtml += '<span class="text-validator">select unit for ' + main_attr + '</span>';
                reqAttrHtml += '</div>';
                reqAttrHtml += '</td>';
                reqAttrHtml += '</tr>';

                j$("#common_attributes_Wrapper").show();
                j$("#common_attributes_Wrapper tbody").append(reqAttrHtml);
            }

            function getCommonAttributeValue(attr) {
                var commonAttrValues = [];

                <?php
                $flag = false;
                foreach ($common_attr_values as $common_key => $common_value):
                $flag = true;
                $name = str_replace(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, '_', $common_key);    ?>
                commonAttrValues.push({"<?= $name?>": "<?= $common_value?>"});
                <?php endforeach;

                // by shivam

                $shopify_product_type = $model->jet_product->product_type;

                if (!$flag && isset($required) && !empty($required)) {
                foreach ($required as $common_key){

                $mapped_tophatter_attr = Data::sqlRecords("SELECT * FROM `tophatter_attribute_map` WHERE `merchant_id` = '" . $merchant_id . "' AND `tophatter_attribute_code`='" . $common_key . "' AND `shopify_product_type` ='" . addslashes($shopify_product_type) . "'", 'one');
                $name = str_replace(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, '_', $common_key);

                ?>
                commonAttrValues.push({"<?= $name?>": "<?= $mapped_tophatter_attr['attribute_value']?>"});
                <?php }
                }
                // end by shivam
                ?>
                return getValueFromArray(commonAttrValues, attr);
            }

            function inArrayExist(arr, index) {
                var flag = false;
                arr.forEach(function (value) {
                    if (value.hasOwnProperty(index)) {
                        flag = true;
                    }
                });
                return flag;
            }

            function getValueFromArray(arr, index) {
                var data = '';
                arr.forEach(function (value) {
                    if (value.hasOwnProperty(index)) {
                        data = value[index];
                    }
                });
                return data;
            }

            j$("#jetproduct-upc").prop("readonly", true);
            j$("#jetproduct-asin").prop("readonly", true);
        </script>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>
                    <center>Option Id</center>
                </th>
                <th>
                    <center>SKU</center>
                </th>
                <th>
                    <center>Images</center>
                </th>
                <th class="tophatter_price">
                    <center>Price</center>
                </th>
                <th class="tophatter_inventory">
                    <center>Inventory</center>
                </th>
                <th colspan="2">
                    <center>Barcode</center>
                </th>
                <th colspan="3">
                    <center>Map Tophatter Attributes</center>
                </th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td rowspan="2" colspan="1">
                    <input type="hidden" name="product-type" value="variants"/>
                </td>
                <td rowspan="2" colspan="3">
                </td>
                <td rowspan="2" colspan="3">
                </td>
                <?php
                $shopifyArr = array();
                $attrArr = array();
                foreach ($shopifyattribues as $key => $val) {
                    ?>
                    <td>
                        <div><b>
                                <center>BigCommerce Option</center>
                            </b></div>
                        <div>
                            <center><?= $val ?></center>
                        </div>
                    </td>
                    <?php $shopifyArr[] = $key;
                }
                ?>
            </tr>
            <tr>
                <?php
                $shop_ind = 0;

                foreach ($shopifyattribues as $key => $val) {
                    $bool = false;
                    if ($tophatter_attributes_arr && count($tophatter_attributes_arr) > 0) {
                        $bool = array_key_exists($val, $tophatter_attributes_arr);
                    }
                    $attr_value = "";
                    if ($bool) {
                        $attr_value = $tophatter_attributes_arr[$val][0];
                    } else {
                        $tophatter_attribute_code = Data::getWamartattributecode($merchant_id, $val, $shopify_product_type);

                        $attr_value = $tophatter_attribute_code['tophatter_attribute_code'];
                    }
                    if (Yii::$app->getRequest()->getQueryParam('clearattr') == 1) {
                        $attr_value = "";
                    }
                    $attrArr[$shop_ind] = trim($attr_value);

                    //print_r($dropdown_option_arr);die;
                    ?>
                    <td>
                        <div>
                            <b>
                                <center>Tophatter attribute(s)</center>
                            </b>
                        </div>
                        <select class="variant_attributes_selector jet_attributes_selector form-control"
                                id="sel_<?= $key ?>" name="jet_attributes[<?= $key ?>][jet_attr_id]">
                            <option value="">Select a Tophatter Attribute...</option>
                            <?php if (is_array($dropdown_option_arr) && count($dropdown_option_arr) > 0) {
                                foreach ($dropdown_option_arr as $p_ar) {
                                    
                                    if(strpos($p_ar['value'],"->") && !strpos($attr_value,"->")){
                                       $p_ar1=explode('->', $p_ar['value']);
                                       ?>
                                        <option value="<?= trim($p_ar['value']) ?>" <?php if (trim($p_ar1[0]) == trim($attr_value)) {
                                        echo "selected='selected'";
                                    } ?>>
                                        <?= $p_ar['name'] ?>
                                    </option>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <option value="<?= trim($p_ar['value']) ?>" <?php if (trim($p_ar['value']) == trim($attr_value)) {
                                        echo "selected='selected'";
                                    } ?>>
                                        <?= $p_ar['name'] ?>
                                    </option>
                                    <?php
                                    }
                                    
                                    //print_r($p_ar1);die("dsf");
                                    ?>
                                   
                                <?php }
                            }
                            ?>
                        </select>

                        <input type="hidden" name="jet_attributes[<?= $key ?>][jet_attr_name]" value="<?= $val ?>"/>

                        <?php if (is_array($dropdown_option_arr) && count($dropdown_option_arr) > 0) {
                            foreach ($dropdown_option_arr as $p_ar) {
                                if (array_key_exists('select', $p_ar) && is_array($p_ar['select']) && count($p_ar['select']) > 0) {
                                    $p_ar_value = str_replace(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, '_', $p_ar['value']);
                                    ?>
                                    <div <?php if (trim($p_ar['name']) == $attr_value) {
                                        echo "style='display:block;'";
                                    } else {
                                        echo "style='display:none;'";
                                    } ?> class="unit_dropdown_div_class unit_dropdown_div_<?= $key ?>_<?= $p_ar_value ?>">
                                        <label class="unit_label" style="width:30%;float:left;">Unit </label>
                                        <select <?php if (trim($p_ar['name']) != $attr_value) {
                                            echo "disabled='disabled'";
                                        } ?> style="width:50%;" class="unit_dropdown form-control"
                                             id="opt_<?= $key ?>_<?= $p_ar_value ?>"
                                             name="common_attributes[<?= $p_ar['select_name'] ?>]">
                                            <?php foreach ($p_ar['select'] as $ky => $sel_op) {
                                                ?>
                                                <option value="<?= trim($sel_op) ?>" <?php if (trim($p_ar['select_value']) == trim($sel_op) && trim($p_ar['name']) == $attr_value) {
                                                    echo "selected='selected'";
                                                } ?>>
                                                    <?= trim($sel_op) ?>
                                                </option>
                                            <?php }
                                            ?>
                                        </select>
                                        <div class="clear" style="clear:both;"></div>
                                    </div>
                                <?php }
                            }
                        }
                        ?>

                        <script type="text/javascript">
                            j$("#sel_<?=$key?>").change(function () {
                                if (!checksame()) {
                                    j$('.v_success_msg').hide();
                                    var errorMsg = "Please don't choose same Tophatter Attibute for multiple option(s).";
                                    j$('.v_error_msg').html(errorMsg);
                                    alert(errorMsg);
                                    j$('.v_error_msg').show();
                                    j$("#sel_<?=$key?>").val("");
                                    disablealltextsnselects(this, "");
                                    return false;
                                }
                                else {
                                    j$('.v_error_msg').html("");
                                    j$('.v_error_msg').hide();
                                }

                                var val = j$("#sel_<?=$key?> option:selected").val();

                                <?php            if(is_array($dropdown_option_arr) && count($dropdown_option_arr) > 0)
                                {
                                foreach($dropdown_option_arr as $p_ar)
                                {
                                if(array_key_exists('select', $p_ar) && is_array($p_ar['select']) && count($p_ar['select']) > 0)
                                {
                                $p_ar_value = str_replace(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, '_', $p_ar['value']);
                                ?>
                                j$("#opt_<?=$key?>_<?=$p_ar_value?>").prop('disabled', true);
                                j$(".unit_dropdown_div_<?=$key?>_<?=$p_ar_value?>").css('display', 'none');
                                if (val == "<?=trim($p_ar['value'])?>") {
                                    j$("#opt_<?=$key?>_<?=$p_ar_value?>").removeAttr('disabled');
                                    j$(".unit_dropdown_div_<?=$key?>_<?=$p_ar_value?>").css('display', 'block');
                                }
                                <?php                    }

                                }
                                }
                                ?>
                                addRemoveRequiredAttributes();

                                if (val == "") {
                                    disablealltextsnselects(this, val);
                                }
                            });

                            j$("#sel_<?=$key?>").trigger("change");
                        </script>
                    </td>
                    <?php
                    $shop_ind++;
                }
                ?>
            </tr>
            <?php
            $query = "SELECT option_sku,option_image,barcode_type,jetvar.option_id,option_qty,option_price,option_unique_id,variant_option1,variant_option2,variant_option3,walvar.new_variant_option_1,walvar.new_variant_option_2,walvar.new_variant_option_3,`walvar`.`status`,`walvar`.`option_prices`,jetvar.product_id as product_id FROM `tophatter_product_variants` AS walvar INNER JOIN `jet_product_variants` AS jetvar ON walvar.option_id = jetvar.option_id WHERE jetvar.product_id='" . $product_id . "' and jetvar.merchant_id='".$merchant_id."' order by jetvar.option_sku='" . $sku . "' desc, jetvar.option_id asc";

            $productOptions = Data::sqlRecords($query, "all", "select");

            $vairent_count = 0;

            $value = "";
            $variant_opt_skus = [];
            if (is_array($productOptions) && count($productOptions) > 0) {
                $value = "";
                foreach ($productOptions as $value) {
                    if (trim($value['option_sku']) == "" || in_array(trim($value['option_sku']), $variant_opt_skus)) {
                        continue;
                    }
                    $variant_opt_skus[] = trim($value['option_sku']);
                    ?>
                    <tr>
                        <td>
                            <p>
                                <?= $value['option_id'] ?>
                            </p>
                        </td>
                        <td>
                            <?php if (in_array($value['status'], $option_status)) { ?>
                                <a href="javascript:void(0);" onclick="viewVariants(this)"
                                   option-sku="<?= $value['option_sku'] ?>"><?= $value['option_sku'] ?></a>
                            <?php } else { ?>
                                <?= $value['option_sku'] ?>
                            <?php } ?>
                            <p>
                                <span style="border: 1px solid #333; padding: 0 5px; color: #555"><?= is_null($value['status']) ? 'No Status' : $value['status'] ?></span>
                            </p>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            if (!empty($value['option_image'])) { ?>

                                <img src="<?= $value['option_image'] ?>" width='60px' height='60px' alt="Option Image">

                            <?php } ?>

                        </td>
                        <td>
                            <?/*= $value['option_price'] */
                            ?>&nbsp;&nbsp;

                            <div>
                                <div class="pull-left">
                                    <!--<input class="form-control tophatter-price" type="text"
                                           id="tophatter_product_price<?/*= $value['option_id']; */ ?>"
                                           name="jet_varients_opt[<?/*= $value['option_id'] */ ?>][tophatter_product_price]"
                                           value="<?/*= (float)$value['option_price']; */ ?>">-->
                                    <input class="form-control tophatter-price" type="text"
                                           id="tophatter_product_price<?= $value['option_id']; ?>"
                                           name="jet_varients_opt[<?= $value['option_id'] ?>][tophatter_product_price]"
                                           value="<?php if (isset($value['option_prices']) && !empty($value['option_prices'])) {
                                               echo $value['option_prices'];
                                           } else {
                                               echo $value['option_price'];
                                           } ?>">
                                </div>
                                <div class="pull-left">
                                    <button class="toggle_editor tophatter-price-button" type="button"
                                            onClick="tophatterPrice(this,event);" title="Upload On Tophatter"
                                            product-id="<?= $model->product_id ?>" product-type="<?= 'variants' ?>"
                                            option-id="<?= $value['option_id'] ?>" sku="<?= $value['option_sku'] ?>"
                                            option-price="<?= (float)$value['option_price']; ?>">Update
                                    </button>

                                </div>
                                <div class="clear"></div>
                            </div>

                            <a href="javascript:void(0);" onclick="priceEdit(this)" class="variant-price"
                               product-id="<?= $value['product_id'] ?>" option-id="<?= $value['option_id'] ?>"
                               sku="<?= $value['option_sku'] ?>" option-price="<?= $value['option_price'] ?>">
                                <?php if (TophatterPromoStatus::promotionRulesExist($value['option_sku'], $merchant_id)) { ?>
                                    Edit Promotional Price
                                <?php } else { ?>
                                    Add Promotional Price
                                <?php } ?>
                            </a>
                        </td>
                        <td>
                            <?/*=$value['option_qty']*/
                            ?>
                            <div>
                                <div class="pull-left">
                                    <input class="form-control tophatter-inventory" type="text"
                                           id="tophatter_product_inventory<?= $value['option_id']; ?>"
                                           name="jet_varients_opt[<?= $value['option_id'] ?>][tophatter_product_inventory]"
                                           value="<?php
                                           echo $value['option_qty'];;
                                           ?>">
                                    <!--<input class="form-control tophatter-inventory" type="text"
                                           id="tophatter_product_inventory<?/*= $value['option_id']; */ ?>"
                                           name="jet_varients_opt[<?/*= $value['option_id'] */ ?>][tophatter_product_inventory]"
                                           value="<?php /*if(isset($value['option_quantity']) && !empty($value['option_quantity'])){
                                               echo $value['option_quantity']; ;
                                           }else{
                                               echo $value['option_qty']; ;
                                           }  */ ?>">-->
                                </div>
                                <div class="pull-left">
                                    <button class="toggle_editor tophatter-inventory-button" type="button"
                                            onClick="tophatterInventorymodal(this);" title="Upload On Tophatter"
                                            product-id="<?= $model->product_id ?>" product-type="<?= 'variants' ?>"
                                            option-id="<?= $value['option_id'] ?>" sku="<?= $value['option_sku'] ?>"
                                            option-inventory="<?= (float)$value['option_qty'] ?>"
                                            fulfillmentLagTime="<?= $model->fulfillment_lag_time ?>">Update
                                    </button>

                                </div>
                                <div class="clear"></div>
                            </div>
                        </td>
                        <td colspan="2">
                            <input type="text" style="" class="upc_opt form-control"
                                   value="<?= $value['option_unique_id'] ?>"
                                   name="jet_varients_opt[<?= $value['option_id'] ?>][upc]">
                            <label class="variant_as_parent"
                                   style="display:none;"><?php if (trim($model->jet_product->sku) == trim($value['option_sku'])) {
                                    echo "1";
                                } else {
                                    echo "0";
                                } ?></label>
                            <input type="hidden" value="<?= $value['option_sku'] ?>"
                                   name="jet_varients_opt[<?= $value['option_id'] ?>][optionsku]">
                        </td>

                        <?php if ($value['variant_option1']) {
                            ?>
                            <td>
                                <input type="text" class="form-control" readonly=""
                                       value="<?= $value['variant_option1'] ?>"
                                       name="jet_attributes[<?= $shopifyArr[0] ?>][<?= $value['option_id'] ?>][value]">
                            </td>
                            <?php
                        }
                        if ($value['variant_option2']) {
                            ?>
                            <td>
                                <input type="text" class="form-control" readonly=""
                                       value="<?= $value['variant_option2'] ?>"
                                       name="jet_attributes[<?= $shopifyArr[1] ?>][<?= $value['option_id'] ?>][value]">
                            </td>
                            <?php
                        }
                        if ($value['variant_option3']) {
                            ?>
                            <td>
                                <input type="text" class="form-control" readonly=""
                                       value="<?= $value['variant_option3'] ?>"
                                       name="jet_attributes[<?= $shopifyArr[2] ?>][<?= $value['option_id'] ?>][value]">
                            </td>
                        <?php }
                        ?>
                    </tr>
                    <?php $vairent_count++;
                }
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    unset($productOptions);
    ?>


    <?php
    unset($result);
    unset($attributes);

} else {
    ?>
    <span class="no_attribute_in_category">No attributes for the selected Category</span>

    <?php
}
?>
    <div id="view_tophatter_product" style="display:none">
    </div>

    <script>
        function viewVariants(element) {
            j$('#LoadingMSG').show();

            var url = '<?= $viewVariants;?>';
            var merchant_id = '<?= $merchant_id;?>';
            $.ajax({
                method: "post",
                url: url,
                data: {
                    id: element.getAttribute('option-sku'),
                    merchant_id: merchant_id,
                    _csrf: csrfToken
                }
            })
                .done(function (msg) {
                    //console.log(msg);
                    $('#LoadingMSG').hide();
                    $('#view_tophatter_product').html(msg);

                    $('body').attr('data-promo', 'show');
                    $('#edit-modal-close').click();
                    $("#edit_tophatter_product #myModal").on('hidden.bs.modal', function () {
                        if ($('body').attr('data-promo') == 'show') {
                            $('#view_tophatter_product').css("display", "block");

                            $('#view_tophatter_product #myModal').modal('show');
                            $('body').removeAttr('data-promo');
                        }
                    });

                    reloadEditModal2();//file index.php

                });

        }
    </script>

<?php
/*$merchant_id=MERCHANT_ID;
$urltophatterPromotions= \yii\helpers\Url::toRoute(['tophatterproduct/promotions']);
?>
<script type="text/javascript">
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    function priceEdit(element){
        j$('#edit-modal-close').click();

        var url='<?= $urltophatterPromotions; ?>';
        var merchant_id='<?= $merchant_id;?>';
        //j$('#LoadingMSG').show();
        j$.ajax({
          method: "post",
          url: url,
          data: {sku:element.getAttribute('sku'),product_id:element.getAttribute('product-id'),merchant_id : merchant_id,option_id:element.getAttribute('option-id'),price:element.getAttribute('option-price'),_csrf : csrfToken}
        })
        .done(function(msg){
            //console.log(msg);
           j$('#LoadingMSG').hide();
           j$('#price-edit').html(msg);
           //j$('#edit_tophatter_product').css("display","block");
           $('#price-edit #price-edit-modal').modal({
              // keyboard: false,
               //backdrop: 'static'
           });
           reloadEditModal();

        });

    }
</script>
<?php */ ?>