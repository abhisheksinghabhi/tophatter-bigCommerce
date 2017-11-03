<?php
use yii\helpers\Html;
unset($data['width']);
unset($data['depth']);
unset($data['weight']);
unset($data['height']);
unset($data['option_set_id']);
unset($data['option_set_display']);
unset($data['inventory_warning_level']);
unset($data['inventory_tracking']);
unset($data['reviews_rating_sum']);
unset($data['reviews_count']);
unset($data['availability_description']);
unset($data['sort_order']);
unset($data['condition']);
unset($data['order_quantity_minimum']);
unset($data['order_quantity_maximum']);
unset($data['preorder_release_date']);
unset($data['gift_wrapping_options_type']);
unset($data['gift_wrapping_options_list']);
unset($data['meta_description']);
unset($data['preorder_message']);
unset($data['is_preorder_only']);
unset($data['is_price_hidden']);
unset($data['price_hidden_label']);
unset($data['is_preorder_only']);
unset($data['custom_url']);
$html = '<table class="table table-striped table-bordered" cellspacing="0" width="100%"><tbody>
		<tr class="value_label" width="100%" style=""><th colspan="2"><h4 class="modal-title" style="text-align: center;font-family: " Comic Sans MS";">Product
                    Information on Bigcommerce Store</h4></th></tr>';

foreach ($data as $key => $value) {

              if(is_array($value)){
                            
                        $value=count($value);
                } 

               else{
                    $value=$value;
                } 

       /* foreach ($value as $k => $v) {
            $html .= '
            <tr>
                <td class="value_label" width="33%">
                    <span>' . strtoupper($k) . '</span>
                </td>
                <td class="value form-group " width="100%">
                    <span>' . $v . '</span>
                </td>
            </tr>';
        }*/

        //echo "echo";var_dump($value);
        $html .= '
        <tr>
            <td class="value_label" width="33%">
                <strong>' . strtoupper($key) . '</strong>
            </td>
            <td class="value form-group ">
                <span>' .$value. 
               '</span>
            </td>
        </tr>';
    
}

$html .= '</tbody><tfoot><tr><td> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></td></tr></tfoot></table>';
?>
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            
                    <?= $html ?>
             
        </div>
    </div>
</div>
<style>
    .form-group {
        margin: 0 0 0;
    }
</style>
