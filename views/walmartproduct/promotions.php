<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\walmart\components\Data;
use dosamigos\datepicker\DatePicker;

$currentPriceTypes = ['REDUCED','CLEARANCE'];
?>

<div class="container">
	  <!-- Modal -->
	  <div class="modal fade" tabindex="-1" id="price-edit-modal" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-lg">
	      <!-- Modal content-->
	      <div class="modal-content" id='edit-content'>
	        <div class="modal-header">
	          <h4 class="modal-title" style="text-align: center;font-family: "Comic Sans MS";"></h4>
	        </div>
	        <div class="modal-body">
				<form id="promotions-form" action="<?= \yii\helpers\Url::toRoute(['walmartproduct/promotion-save']) ?>">
                
                    <input type="hidden" name="merchant_id" value="<?= $post['merchant_id'] ?>" />
                    <input type="hidden" name="option_id" value="<?= $post['option_id'] ?>" />
                    <input type="hidden" name="sku" value="<?= $post['sku'] ?>" />
                    <input type="hidden" name="product_id" value="<?= $post['product_id'] ?>" />
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>Product Id</center>
                                </th>
                                <!-- <th>
                                    <center>Option Id</center>
                                </th> -->
                                <th>
                                    <center>SKU</center>
                                </th>
                                <th>
                                    <center>Price</center>
                                </th>
                                <th>
                                    <center>Special Price</center>
                                </th>
                                <th>
                                    <center> Current/Special Price Type </center>
                                </th>
                                <th>
                                    <center>Start Date</center>
                                </th>
                                <th>
                                    <center>End Date</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="promotion-tbody">
                            <?php foreach($promotions as $promotion){ 
                                $d = new DateTime($promotion['effective_date']);
                                    $effective_date = $d->format('Y-m-d H:i:s');
                                    $d = new DateTime($promotion['expiration_date']);
                                    $expiration_date = $d->format('Y-m-d H:i:s');
                                    ?>
                            <tr>
                                <td><input type="hidden" name="promotion[id][]" value="<?= $promotion['id'] ?>"?><?= $post['product_id'] ?></td>
                                <!-- <td><?= $post['option_id'] ?></td> -->
                                <td><?= $post['sku'] ?></td>
                                <td><input type="text" name="promotion[orignal_price][]" value="<?= $promotion['original_price'] ?>" /></td>
                                <td><input type="text" name="promotion[special_price][]" value="<?= $promotion['special_price'] ?>" /></td>
                                <td> <select class="form-control" name="promotion[current_price_type][]">
                                        <option value=""></option>
                            <?php   foreach ($currentPriceTypes as $currentPriceType) {   ?>
                                        <option value="<?= $currentPriceType ?>" <?= $promotion['current_price_type']==$currentPriceType?'selected="selected"':'' ?>><?= $currentPriceType ?></option>
                            <?php   } ?>
                                    </select></td>
                                <td><input class="date-time form-control" type="text" name="promotion[effective_date][]" value="<?= $effective_date ?>" ><p class="note">In UTC Time Zone</p></td>
                                <td><input type="text" class="date-time form-control" name="promotion[expiration_date][]" value="<?= $expiration_date ?>" ><p class="note">In UTC Time Zone</p></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-primary" id="addPromotion"  >Add Promotion </button></td>
                            </tr>
                        </tfoot>
                        
                    </table>
                </form>
	        </div>
	        <div class="modal-footer Attrubute_html">
	          <div class="promotion_error_msg" style="display:none;"></div>
	          <div class="promotion_success_msg alert-success alert" style="display:none;"></div>
	          
	          <?= Html::submitButton('Save', ['class' => 'btn btn-primary','id'=>'save-promotion']) ?>
	          <button type="button" class="btn btn-default" id="close_promotions" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	      <div class="modal-content"  style="padding:20px;display:none">
				
		  </div>
		  		      
		</div>
	</div>	 
</div>
<script type="text/javascript">
    
    j$('#addPromotion').on('click',function(){
        /*$rowData = '<tr>\
                            <td><?= $post["product_id"] ?></td>\
                            <td><?= $post["sku"] ?></td>\
                            <td><center><input type="text" name="promotion[orignal_price][]" value="<?= $post["price"] ?>"></center></td>\
                            <td><center><input type="text" name="promotion[special_price][]"></center></td>'+'<td><input class="new-date-time" onfocus="showDatepicker(this)" type="text" name="promotion[effective_date][]"><p class="note">In UTC Time Zone</p></td><td><input type="text" class="new-date-time" onfocus="showDatepicker(this)" name="promotion[expiration_date][]"><p class="note">In UTC Time Zone</p></td>'+'</tr>';
        $('#promotion-tbody').append($rowData);*/

        if($('#promotion-tbody tr').length < 10)
        {
            var $tr = $("<tr>");
            $tr.append($("<td>").html($("<span>",{"style": "font-size: 10px;"}).html("Can't Delete Until Uploaded on Walmart")));
            /*$tr.append($("<td>").html("<?= $post['product_id'] ?>"));*/
            $tr.append($("<td>").html("<?= $post['sku'] ?>"));
            $tr.append($("<td>").html($("<input>", {"type": "text", "class": "form-control", "name": "promotion[orignal_price][]", "value":"<?= $post['price'] ?>"})));
            $tr.append($("<td>").html($("<input>", {"type": "text", "class": "form-control", "name": "promotion[special_price][]"})));

            $tr.append($("<td>").html($("<select>",{"class": "form-control", "name": "promotion[current_price_type][]"}).append($("<option>",{"value": ""}).text(""))
                <?php foreach ($currentPriceTypes as $currentPriceType) { ?>
                        .append($("<option>",{"value": "<?= $currentPriceType ?>"}).text("<?= $currentPriceType ?>"))
                <?php } ?>
                ));


            $tr.append($("<td>").append($("<input>", {"type": "text", "class": "form-control", "name": "promotion[effective_date][]"}).datetimepicker({timeFormat: 'HH:mm:ss', dateFormat: 'yy-mm-dd' })).append($("<p>", {"class": "note"}).html("In UTC Time Zone")));
            $tr.append($("<td>").append($("<input>", {"type": "text", "class": "form-control", "name": "promotion[expiration_date][]"}).datetimepicker({timeFormat: 'HH:mm:ss', dateFormat: 'yy-mm-dd' })).append($("<p>", {"class": "note"}).html("In UTC Time Zone")));

            $('#promotion-tbody').append($tr);
        }
        else
        {
            alert("The maximum number of promotions for a given item should not be more than 10.");
        }

    });

    j$('#save-promotion').on('click',function(){

        var postData = j$("#promotions-form").serializeArray();
        //console.log(postData);
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var formURL = j$("#promotions-form").attr("action");
        console.log(formURL);
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
                        j$('.promotion_success_msg').html('');
                        j$('.promotion_success_msg').append(data.success);
                        j$('.promotion_error_msg').hide();
                        j$('.promotion_success_msg').show();
                        j$('#close_promotions').click();
                       
                         //j$('#reload-edit-modal').click();
                        
                        
                    }
                    else
                    {

                        j$('.promotion_error_msg').html('');
                        j$('.promotion_error_msg').append(data.error);
                        j$('.promotion_success_msg').hide();
                        j$('.promotion_error_msg').show();
                        
                        
                    }
                    //data: return data from server
                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    j$('.promotion_error_msg').html('');
                    j$('#LoadingMSG').hide();
                    j$('.promotion_error_msg').append("something went wrong..");
                    j$('.promotion_error_msg').show();
                }
            });
    });
    
</script>

<script type="text/javascript">
    
    $('.date-time').datetimepicker({timeFormat: 'HH:mm:ss', dateFormat: 'yy-mm-dd' });
    /*function showDatepicker(element)
    {
        $(element).datepicker({timeFormat: 'HH:mm:ss', dateFormat: 'yy-mm-dd' });
    }*/
</script>