<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg">
	      <!-- Modal content-->
	      <div class="modal-content" id='edit-content'>
	        <div class="modal-header">
	          <h4 class="modal-title" style="text-align: center;font-family: "Comic Sans MS";"><?= $model->jet_product->title?></h4>
	        </div>
	        <div class="modal-body">
				<div class="jet-product-form">

                    <?php $form = ActiveForm::begin([
                            'id' => 'jet_edit_form',
                            'action' => frontend\modules\walmart\components\Data::getUrl('walmartproduct/updateajax/?id='.$model->product_id),
                            'method'=>'post',
                        ]); ?>
                    <div class="form-group">
                    	<?= $form->field($model->jet_product, 'sku')->hiddenInput()->label(false);?>
						<?/*<?= $form->field($model, 'title')->hiddenInput()->label(false);?>
                        <?= $form->field($model, 'weight')->hiddenInput()->label(false);?>
                        <?= $form->field($model, 'qty')->hiddenInput()->label(false);?>
                         <?= $form->field($model, 'vendor')->hiddenInput()->label(false);?>
                        <?= $form->field($model, 'description')->hiddenInput()->label(false); ?>
                        <div class="form-group field-jetproduct-price">
                            <input id="jetproduct-price" class="form-control select_error" type="hidden" value="<?= $model->price;?>" name="JetProduct[price]">
                        </div>
                       */?>
                        <div class="field-jetproduct">
                        	<?php $brand="";
                        	$brand=$model->jet_product->vendor;
                        	?>
                        	<table class="table table-striped table-bordered">
                        		<thead>
                        			<tr>
                        				<th>Title</th>
                        				<?php 
                                    	if($model->jet_product->type!="variants" || count($attributes)==0)
                                    	{ ?>
                            				<th>Sku</th>
                            				<th>Price</th>
                            				<th>Quantity</th>
                        				<?php 
                                    	}?>
                        				<th>Brand</th>
                        				<th>Weight</th>
                        				<th>Product Type</th>
                        				<th>Description</th> 
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<tr>
                        				<td>
                                            <input type="text" name="JetProduct[title]" value=" <?=substr($model->jet_product->title, 0, 75);?>" class="form-control" id="inputSelectCode" style="width: 300px;">
                                            
                        				</td>
                        				<?php 
                                    	if($model->jet_product->type!="variants" || count($attributes)==0)
                                    	{ ?>
                        				<td>
                        				<?= $model->jet_product->sku;?>
                        				</td>
                        				<td>
                        				<?= (float)$model->jet_product->price;?>
                        				</td>
                        				<td>
                        					<?= $model->jet_product->qty;?>
                        				</td>
                        				<?php 
                                    	}?>
                                    	<?php $brand=$model->jet_product->additional_info; ?>
                        				<td>
                        				   <input type="text" name="JetProduct[brand]" value="<?=json_decode($brand)->brand;?>" class="form-control" id="inputSelectCode">
                        					
                        				</td>
                        				<td>
                        					<?= (float)$model->jet_product->weight;?>
                        				</td>
                        				<td>
                        					<?= $model->jet_product->product_type;?>
                        				</td>
                        				<td>
                        				  <div class="more">
                    						<?php 
                                                //var_dump($model->jet_product->description);die;
                    							$truncated="";$var_string="";
                    							$var_string=strip_tags($model->short_description);
                    							$truncated = (strlen($var_string) > 50) ? substr($var_string, 0, 50)."...<a  onclick='showDescription()' title='More Description' href='#'>more</a>" : $var_string;
                    						?>
                    						<?= $truncated;?>
                        					</div>
                        				</td>
                        			</tr>
                        		</tbody>
                        	</table>
                        	<table class="table table-striped table-bordered">
                        		<thead>
                                    <th>Short Description</th>
                                	<th>Shelf Description</th>
                                	<th>Product Tax Code</th>	
                        	   </thead>
                        	   <tbody>
                        	       <tr>
                        	           <td>
                        	           <?php //echo $model->self_description;die;?>
                        	               <textarea  maxlength="3000" name="JetProduct[short_description]" class="form-control" id="jetproduct-short_description"><?=$model->short_description;?></textarea>
                        	           </td>
                        	       
                        	           <td>
                        	               <textarea maxlength="5000" name="JetProduct[self_description]" class="form-control" id="jetproduct-self_description"><?= $model->self_description;?></textarea>
                        	           </td>
                        	           <td style="width: 30%">
                                    		<input type="text" name="JetProduct[product_tax]" value="<?= $model->tax_code;?>" class="form-control" id="inputSelectCode">
                                    		<span class="text-validator">To get product tax code click <a target="_blank" href="<?= yii\helpers\Url::toRoute(['walmarttaxcodes/index']); ?>">here</span>
                                    	</td>
                        	       </tr>
                        	   </tbody>
                        	</table>
                             <!-- new fields start -->
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <th>Sku Override</th>   
                                    <th>Product Id Override</th>
                                    <th>Product Lack Time</th>
                               </thead>
                               <tbody>
                                   <tr>
                                        <td>
                                            <select class="form-control" name="sku_override">
                                                <option value="0" <?php if(!$model->sku_override){echo "selected";} ?>>NO</option>
                                                <option value="1" <?php if($model->sku_override){echo "selected";} ?>>YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="product_id_override">
                                                <option value="0" <?php if(!$model->product_id_override){echo "selected";} ?>>NO</option>
                                                <option value="1" <?php if($model->product_id_override){echo "selected";} ?>>YES</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="fulfillment_lag_time" value="<?= $model->fulfillment_lag_time;?>" class="form-control">
                                        </td>
                                   </tr>
                               </tbody>
                            </table>
                            <!-- new fields end -->
                        	<?php 
                        	if($model->jet_product->type=="variants" && (count($attributes)>0 || count($optionalAttrValues)>0))
                        	{  
                            	echo $form->field($model->jet_product, 'ASIN')->hiddenInput()->label(false);
                            	//echo $form->field($model->jet_product, 'upc')->hiddenInput()->label(false);
                            	//echo $form->field($model->jet_product, 'mpn')->hiddenInput()->label(false);
                        	}
                        	else
                        	{
                        		$upc=$model->jet_product->additional_info;
                        		
                        		
                        		
                        		?>
                        	<table class="table table-striped table-bordered">
                        		<thead>
                        			<tr>
                        				<th>Barcode(UPC/GTIN/ISBN)</th>
                        				
                        			</tr>
                        		</thead>
                        		<tbody>
        							<tr>
        								<td style="width: 40%">	
                                    		<label class="general_product_id" style="display:none;"><?=trim($model->product_id);?></label>
                                    		<input type="text" maxlength="500" value="<?=json_decode($upc)->upc_code;?>" name="JetProduct[upc]" class="form-control" id="jetproduct-upc">
                                    	</td>
                                    </tr>	
                           		</tbody>
                        	</table>  
                        	<?php 
                            }?> 
                        </div>
                        <?= $this->render('category_tab',[
                            'model' => $model,
                            'category_path'=>$category_path,
                            'attributes'=>$attributes,
                            'optional_attr'=>$optional_attr,
                            'requiredAttrValues'=>$requiredAttrValues,
                            'optionalAttrValues'=>$optionalAttrValues,
                            'common_required_attributes'=>$common_required_attributes
                        ]) ?>
                        <?php unset($connection);?>
                	</div>
                	<?php ActiveForm::end(); ?>
                </div>
                <!-- <div class="block-callout block-show-callout type-warning block-show-callout type-warning">
	          	  <div class="note">
                      <h4>
                        <i class="fa fa-exclamation-circle on" title="Warning"></i>
                        <span>BARCODE</span>
                      </h4>
                        <p>Must be one of the following values: GTIN-14 (14 digits), EAN (13 digits), ISBN-10 (10 digits), ISBN-13 (13 digits), UPC (1
                      2 digits).</p>
                      <div class="clear"></div>
			 	  </div>
                  <div class="note">
                      <h4>
                        <i class="fa fa-exclamation-circle on" title="Warning"></i>
                        <span>ASIN</span>
                      </h4>
                      <p>ASIN must be Alphanumeric with length of 10</p>
			 	    <div class="clear"></div>
                  </div>
			 	  <div class="note">
                      <h4 >
                        <i class="fa fa-exclamation-circle on" title="Warning"></i>
                        <span>MPN</span>
                      </h4>
                      <p>Manufacturer Part number provided by the original manufacturer of the merchant SKU.</p>
			 	   <div class="clear"></div>
                  </div>
			 	  <div class="note">Every product must have least one combination : Brand + BARCODE or Brand + ASIN or Brand + MPN.</div>
			    </div> -->
	        </div>
	        <div class="modal-footer">
	          <div class="v_error_msg" style="display:none;"></div>
	          <div class="v_success_msg alert-success alert" style="display:none;"></div>
	          
	          <?= Html::submitButton('Save', ['class' => 'btn btn-primary','id'=>'saveedit','onclick'=>'saveData()']) ?>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      <div class="modal-content" id="product_description" style="padding:20px;display:none">
          <?php $form = ActiveForm::begin([
                            'id' => 'jet_editdesc_form',
                            'action' => frontend\modules\walmart\components\Data::getUrl('walmartproduct/updateajaxdesc/?id='.$model->product_id),
                            'method'=>'post',
         ]); ?>
	      

            <textarea rows="10" cols="50" name="JetProduct[product_description]" class="form-control" id="jetproduct-product_description">
                <?= $model->short_description ?>"
            </textarea> 
			<button type="button" style="margin-left: 90%;" class="btn btn-primary" id="descriptionClose" onclick="closedescription()" >Close </button>
		 
		  <?php ActiveForm::end(); ?>	  

          <?= Html::submitButton('EDit', ['class' => 'btn btn-primary','id'=>'saveedit','onclick'=>'savedescData()']) ?>   
           </div> 
		</div>
	</div>	 
</div>

<script type="text/javascript">
var csrfToken = $('meta[name="csrf-token"]').attr("content");
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip({html:true});
// $('[data-toggle="tooltip"]').tooltip();   
 /* $('.danger').popover({ 
    html : true,
    content: function() {
      return $('#popover_content_wrapper').html();
    }
  });  */
});
function saveData()
{
	var postData = j$("#jet_edit_form").serializeArray();
	//console.log(postData);
	var formURL = j$("#jet_edit_form").attr("action");
	var type='<?= $model->jet_product->type ?>';
	var attr_count='<?= count($attributes) ?>';
	if(type=="variants" && attr_count>0)
	{
    	if(checkselectedBeforeSubmit())
        {
    		j$('#LoadingMSG').show();
		    j$.ajax(
		    {
		        url : formURL,
		        type: "POST",
		        dataType: 'json',
		        data : postData,
		        _csrf : csrfToken,
		        success:function(data, textStatus, jqXHR) 
		        {
		        	j$('#LoadingMSG').hide();
		        	if(data.success)
		        	{	
		        		j$('.v_success_msg').html('');
		        		j$('.v_success_msg').append(data.success);
		        		j$('.v_error_msg').hide();
		        		j$('.v_success_msg').show();
		        		
		        	}
			        else
				    {
			        	j$('.v_error_msg').html('');
		        		j$('.v_error_msg').append(data.error);
		        		j$('.v_success_msg').hide();
		        		j$('.v_error_msg').show();
		        		
		        		
				    }
		            //data: return data from server
		        },
		        error: function(jqXHR, textStatus, errorThrown) 
		        {
		        	j$('.v_error_msg').html('');
		        	j$('#LoadingMSG').hide();
		        	j$('.v_error_msg').append("something went wrong..");
		        	j$('.v_error_msg').show();
		        }
		    });
    	}
    	else{
    	  	return false;
    	}
	}
	else
	{
		j$('#LoadingMSG').show();
		//submit simple form	
		j$.ajax(
	    {
	        url : formURL,
	        type: "POST",
	        dataType: 'json',
	        data : postData,
	        success:function(data, textStatus, jqXHR) 
	        {
	        	j$('#LoadingMSG').hide();
	        	if(data.success)
	        	{	
	        		j$('.v_success_msg').html('');
	        		j$('.v_success_msg').append(data.success);
	        		j$('.v_error_msg').hide();
	        		j$('.v_success_msg').show();
	        		
	        	}
		        else
			    {
		        	j$('.v_error_msg').html('');
	        		j$('.v_error_msg').append(data.error);
	        		j$('.v_success_msg').hide();
	        		j$('.v_error_msg').show();
			    }
	        },
	        error: function(jqXHR, textStatus, errorThrown) 
	        {
	        	j$('.v_error_msg').append('');
	        	j$('#LoadingMSG').hide();
	        	j$('.v_error_msg').append("something went wrong..");
	        	j$('.v_error_msg').show();
	        	//console.log(textStatus);
	        }
	    });
	}	
  
}

function savedescData(){
    var postData = j$("#jet_editdesc_form").serializeArray();
    //console.log(postData);
    var formURL = j$("#jet_editdesc_form").attr("action");
    var type='<?= $model->jet_product->type ?>';
    var attr_count='<?= count($attributes) ?>';
    if(type=="variants" && attr_count>0)
    {
        if(checkselectedBeforeSubmit())
        {
            j$('#LoadingMSG').show();
            j$.ajax(
            {
                url : formURL,
                type: "POST",
                dataType: 'json',
                data : postData,
                _csrf : csrfToken,
                success:function(data, textStatus, jqXHR) 
                {
                    j$('#LoadingMSG').hide();
                    if(data.success)
                    {   
                        j$('.v_success_msg').html('');
                        j$('.v_success_msg').append(data.success);
                        j$('.v_error_msg').hide();
                        j$('.v_success_msg').show();
                        
                    }
                    else
                    {
                        j$('.v_error_msg').html('');
                        j$('.v_error_msg').append(data.error);
                        j$('.v_success_msg').hide();
                        j$('.v_error_msg').show();
                        
                        
                    }
                    //data: return data from server
                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    j$('.v_error_msg').html('');
                    j$('#LoadingMSG').hide();
                    j$('.v_error_msg').append("something went wrong..");
                    j$('.v_error_msg').show();
                }
            });
        }
        else{
            return false;
        }
    }
    else
    {
        j$('#LoadingMSG').show();
        //submit simple form    
        j$.ajax(
        {
            url : formURL,
            type: "POST",
            dataType: 'json',
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                j$('#LoadingMSG').hide();
                if(data.success)
                {   
                    j$('.v_success_msg').html('');
                    j$('.v_success_msg').append(data.success);
                    j$('.v_error_msg').hide();
                    j$('.v_success_msg').show();
                    
                }
                else
                {
                    j$('.v_error_msg').html('');
                    j$('.v_error_msg').append(data.error);
                    j$('.v_success_msg').hide();
                    j$('.v_error_msg').show();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                j$('.v_error_msg').append('');
                j$('#LoadingMSG').hide();
                j$('.v_error_msg').append("something went wrong..");
                j$('.v_error_msg').show();
                //console.log(textStatus);
            }
        });
    }   
}

function showDescription(){
	j$('#edit-content').css('display','none');
	j$('#product_description').css('display','block');
}
function closedescription(){
	j$('#edit-content').css('display','block');
	j$('#product_description').css('display','none');
}
</script>