
<?php
use frontend\modules\walmart\components\AttributeMap;
if($model->category)
{
    $id=$model->category;
    $merchant_id = $model->merchant_id;
//    print_r($model);die;
    ?>
    <div class="form-group field-jetproduct-jet_attributes enable_api">
        <div class="category_value" style="margin-bottom:5px">
            <span>
                <?= $category_path; ?>
                <input type="hidden" value="<?= $model->category ?>" name="category_id">
            </span>
            <input id="jetproduct-fulfillment_node" class="form-control" type="hidden" readonly="" value="<?= $id ?>" name="JetProduct[fulfillment_node]">
        </div>

        <!-- Code By Himanshu Start -->
        <?php
        //if($model->jet_product->type=='variants')
            $common_attr_values = array();
            $common_attr_str = $model->common_attributes;
            if($common_attr_str != '')
                $common_attr_values = json_decode($common_attr_str,true);

            $common_attributes = array();
            if(is_array($common_required_attributes) &&
                count($common_required_attributes))
            {
                foreach ($common_required_attributes as $value) {
                    $attr_temp = [];
                    if(is_array($value)) {
                        //$keys = array_keys($value);
                        //$attr_code = $keys[0];
                        $sub_temp = [];
                        foreach ($value as $key => $sub_attr) 
                        {
                            $attr_code = implode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $sub_attr);

                            if($model->jet_product->type=='simple' && !in_array($attr_code, $required))
                                continue;

                            $options = [];
                            $attr_value = '';
                            foreach ($sub_attr as $sub_attr_value) 
                            {
                                /*if($sub_attr_value != $key) {
                                    $attr_code .= AttributeMap::ATTRIBUTE_PATH_SEPERATOR.$sub_attr_value;
                                }*/

                                if(isset($common_attr_values[$sub_attr_value]))
                                    $attr_value = $common_attr_values[$sub_attr_value];
                                elseif(isset($common_attr_values[$attr_code]))
                                    $attr_value = $common_attr_values[$attr_code];
                                
                                if(isset($requiredAttrValues[$sub_attr_value])) {
                                    $options = explode(',', $requiredAttrValues[$sub_attr_value]);
                                } elseif(isset($requiredAttrValues[$attr_code])) {
                                    $options = explode(',', $requiredAttrValues[$attr_code]);
                                }

                                /*if(count($options)) {
                                    $sub_temp[] = array('type'=>'select', 'name'=>$sub_attr_value, 'options'=>$options, 'value'=> $attr_value);
                                } else {
                                    $sub_temp[] = array('type'=>'text', 'name'=>$sub_attr_value, 'value'=> $attr_value);
                                }*/
                            }
                            if(count($options)) {
                                $attr_temp = array('type'=>'select', 'name'=>$attr_code, 'options'=>$options, 'value'=> $attr_value);
                                $common_attributes[] = $attr_temp;
                            } else {
                                $attr_temp = array('type'=>'text', 'name'=>$attr_code, 'value'=> $attr_value);
                                $common_attributes[] = $attr_temp;
                            }
                        }
                        //$attr_temp = ['name'=>$attr_code, 'type'=>'sub_attr', 'sub_fields'=>$sub_temp];
                    } else {
                        $attr_code = $value;

                        if($model->jet_product->type=='simple' && !in_array($attr_code, $required))
                                continue;

                        $options = [];
                        $attr_value = '';
                        /*if(isset($common_attr_values[$attr_code]))
                            $attr_value = $common_attr_values[$attr_code];*/

                        //by shivam
                        if(isset($common_attr_values[$attr_code])) {
                            $attr_value = $common_attr_values[$attr_code];
                        }else{
                            $shopify_product_type = $model->jet_product->product_type;
                            $walmart_product_value = \frontend\modules\walmart\components\Data::getAttributevalue($merchant_id,$attr_code,$shopify_product_type);
                            $attr_value = $walmart_product_value['attribute_value'];
                        }
                        //end by shivam

                        if(isset($requiredAttrValues[$attr_code])) {
//                            $options = explode(',', $requiredAttrValues[$attr_code]);
                            $options = $requiredAttrValues[$attr_code];
                        }

                        if(count($options)) {
                            $attr_temp = array('type'=>'select', 'name'=>$attr_code, 'options'=>$options, 'value'=> $attr_value);
                            $common_attributes[] = $attr_temp;
                        } else {
                            $attr_temp = array('type'=>'text', 'name'=>$attr_code, 'value'=> $attr_value);
                            $common_attributes[] = $attr_temp;
                        }
                    }
                    //$common_attributes[] = $attr_temp;
                }
            }


        ?>

                <div id="common_attributes_Wrapper" <?php if(!count($common_attributes)){echo 'style="display:none;"';} ?>>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr><td colspan="2"><b>Common Attributes </b></td></tr>
                      </thead>
                      <tbody>
        <?php
            if(count($common_attributes))
            {
                foreach ($common_attributes as $attr) {
                    if($attr['type']=='text'){
        ?>
                        <tr>
                            <td style="width:50%"><?= ($attr['name']) ?></td>
                            <td  style="width:50%">
                                <input type="text" value="<?= $attr['value'] ?>" name="common_attributes[<?= $attr['name'] ?>]" class="form-control common_required" />
                                <span class="text-validator">
                            <?php
                                $array = explode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $attr['name']);
                                $flag = false;
                                $variantAttr = '';
                                if(is_array($attributes) && count($attributes))
                                {
                                    foreach ($attributes as $value) {
                                        if(is_array($value) && isset($value[$array[0]])) {
                                            $flag = true;
                                            $variantAttr = implode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $value[$array[0]]);
                                            break;
                                        }
                                    }
                                }

                                if($flag)
                                {
                                    echo $attr['name']. ' attribute is required only if "'.$variantAttr.'" is mapped with bigcommerce Option';
                                }
                                else
                                {
                                    echo $attr['name']. ' attribute is required';
                                }
                            ?>
                                </span>
                            </td>
                        </tr>
        <?php
                    } elseif($attr['type']=='select') {
        ?>
                        <tr>
                            <td style="width:50%"><?= ($attr['name']) ?></td>
                            <td  style="width:50%">
                                <select name="common_attributes[<?= $attr['name'] ?>]" class="form-control common_required">
                    <?php
                        $attr['options']=explode(',', $attr['options']);
                        if(is_array($attr['options']) && count($attr['options'])) :
                            foreach ($attr['options'] as $option) {
                    ?>
                                    <option value="<?= $option ?>" <?php if($option==$attr['value']){echo 'selected="selected"';} ?>><?= $option ?></option>
                    <?php
                            }
                        endif;
                    ?>
                                </select>
                                <span class="text-validator">
                            <?php
                                $array = explode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $attr['name']);
                                $flag = false;
                                $variantAttr = '';
                                if(is_array($attributes) && count($attributes))
                                {
                                    foreach ($attributes as $value) {
                                        if(is_array($value) && isset($value[$array[0]])) {
                                            $flag = true;
                                            $variantAttr = implode(AttributeMap::ATTRIBUTE_PATH_SEPERATOR, $value[$array[0]]);
                                            break;
                                        }
                                    }
                                }

                                if($flag)
                                {
                                    echo $attr['name']. ' attribute is required only if "'.$variantAttr.'" is mapped with bigcommerce Option';
                                }
                                else
                                {
                                    echo $attr['name']. ' attribute is required';
                                }
                            ?>
                                </span>
                            </td>
                        </tr>
        <?php
                    } elseif($attr['type']=='sub_attr') {
                        if(count($attr['sub_fields'])) {
        ?>
                        <tr>
                            <td style="width:50%"><?= ($attr['name']) ?></td>
                            <td  style="width:50%">
        <?php
                            foreach ($attr['sub_fields'] as $field) {
                                if($field['type']=='text') {
        ?>
                                    <label><?= ($field['name']) ?></label>
                                    <input type="text" value="<?= $field['value'] ?>" name="common_attributes[<?= $field['name'] ?>]" class="form-control common_required" />
                                    <span class="text-validator"><?= $field['name'] ?> attribute is required</span>
        <?php
                                } elseif($field['type']=='select') {
        ?>
                                    <label><?= ($field['name']) ?></label>
                                    <select name="common_attributes[<?= $attr['name'] ?>]" class="form-control common_required">
        <?php
                                    if(is_array($field['options']) && count($field['options'])) :
                                        foreach ($field['options'] as $option) {
        ?>
                                        <option value="<?= $option ?>" <?php if($option==$field['value']){echo 'selected="selected"';} ?>><?= $option ?></option>
        <?php
                                        }
                                    endif;
        ?>
                                    </select>
                                    <span class="text-validator"><?= $field['name'] ?> attribute is required</span>
        <?php
                                }
        ?>                      
        <?php
                            }
        ?>                  </td>
                        </tr>
        <?php
                        }
                    }
                }
            }
        ?>
                      </tbody>
                    </table>
                </div>
        <!-- Code By HImanshu End -->

        <div id="jet_Attrubute_html" class="Attrubute_html">
            <?php

            //print_r($attributes);die;
            if(count($attributes)>0 /*|| count($optionalAttrValues)>0*/)
            {
                //$attributes=array();
                //$attributes=explode(',',$merchantCategory['jet_attributes']);
                unset($merchantCategory);
                if($model->jet_product->type=='variants')
                {
                    
                    echo $this->render('varients', [
                        'model' => $model,
                        'attributes'=>$attributes,
                        'optional_attributes'=>$optional_attr,
                        'requiredAttrValues'=>$requiredAttrValues,
                        /*'optionalAttrValues'=>$optionalAttrValues,*/
                        'required'=>$required,
                        'unit_attributes'=>$unit_attributes,
                        'common_attr_values'=>$common_attr_values,
                        'category_data' => $category_data
                    ]);
                }
                else
                {
                    echo $this->render('simple',[
                        'model'=>$model,
                        'attributes'=>$attributes,
                        'optional_attr'=>$optional_attr,
                        'requiredAttrValues'=>$requiredAttrValues,
                        /*'optionalAttrValues'=>$optionalAttrValues,*/
                        'required'=>$required,
                        'category_data' => $category_data
                    ]);
                } 
                unset($connection);
            }    
            else
            {?>
                <span class="text-validator" style="font-size:14px;background-position: 0 4px;">
                No more attribute(s) are available for selected Walmart category.
                </span>
            <?php
            }   
            ?>
        </div>    
    </div>
    
<?php 
}?> 

