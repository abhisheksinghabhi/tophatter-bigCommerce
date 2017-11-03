
application/x-httpd-php refunddata.php ( PHP script text )

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
$walmartOrderItemsRefundItems = \yii\helpers\Url::toRoute(['walmartorderdetail/refund-items']);

$orderData = json_decode($orderData,true);

$shipmentData = $orderData['order']['orderLines']['orderLine'];


//$orderData1 = json_decode($orderData['order_data'],true);
//$items = $orderData1['orderLines']['orderLine'];
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\walmart\models\WalmartOrderDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Walmart Order Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walmart-order-details-index">
  <form method="post" action="<?= $walmartOrderItemsRefundItems ?>">
    <input type="hidden" name="purchaseOrderId" value="<?= $orderData['purchase_order_id'] ?>"/>
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <th>
            Item Sku
          </th>
          <th>
            Line Number
          </th>
          <th>
            Status
          </th>
          <th>
            
          </th>
        </tr>
        <?php //foreach($shipmentData as $data): 

        $items=$shipmentData;

        foreach($items as $item){
        $status = isset($item['orderLineStatuses']['orderLineStatus']['status'])?$item['orderLineStatuses']['orderLineStatus']['status']: '';


        if($status == ''){
           $status = isset($item['orderLineStatuses']['orderLineStatus'][0]['status'])?$item['orderLineStatuses']['orderLineStatus'][0]['status']: '';
        }
        ?>
        <tr>
          <td>
            <?php echo $item['item']['sku'] ?>
          </td>
          <td>
            <?php echo $item['lineNumber'] ?>
          </td>
          <td>
            <?php echo $status ?>
          </td>
          <td>

          <?php if(strtolower($status)=='shipped'){ 
                $charges = isset($item['charges']['charge'][0]) ? $item['charges']['charge'] : [$item['charges']['charge']];

                foreach($charges as $charge){
                  //print_r($charge);die();
                  $taxAmount = $charge['tax'];
                  if(is_array($taxAmount)){
                     $taxAmount = isset($taxAmount['taxAmount']['amount'])?$taxAmount['taxAmount']['amount']:0;
                  }
          ?>
              <div>
          <?php if($charge['chargeType'] == 'PRODUCT') { ?>
                <?= $charge['chargeName'] ?>:<input type="checkbox" name="selectedlineNumber[]" value="<?= $item['lineNumber'] ?>" />
          <?php } else { ?>
                <?= $charge['chargeName'] ?>:<input type="checkbox" name="includeShipping[]" value="<?= $item['lineNumber'] ?>" />
          <?php } ?>

                <input type="hidden" name="lineNumber[<?= $item['lineNumber'] ?>][<?= $charge['chargeType'] ?>][chargeName]" value="<?= $charge['chargeName'] ?>" />
                <input type="hidden" name="lineNumber[<?= $item['lineNumber'] ?>][<?= $charge['chargeType'] ?>][chargeAmount][amount]" value="<?= $charge['chargeAmount']['amount'] ?>" />
                <input type="hidden" name="lineNumber[<?= $item['lineNumber'] ?>][<?= $charge['chargeType'] ?>][chargeAmount][currency]" value="<?= $charge['chargeAmount']['currency'] ?>" />


        <?php if(isset($charge['tax']) && is_array($charge['tax']) && count($charge['tax'])>0 ) { ?>
                <input type="hidden" name="lineNumber[<?= $item['lineNumber'] ?>][<?= $charge['chargeType'] ?>][tax][taxName]" value="<?= $charge['tax']['taxName'] ?>"/>
                <input type="hidden" name="lineNumber[<?= $item['lineNumber'] ?>][<?= $charge['chargeType'] ?>][tax][taxAmount][amount]" value="<?= $taxAmount ?>"/>
                <input type="hidden" name="lineNumber[<?= $item['lineNumber'] ?>][<?= $charge['chargeType'] ?>][tax][taxAmount][currency]" value="<?= $charge['tax']['taxAmount']['currency'] ?>"/>
        <?php } ?>
              </div>
              
        <?php 
              }
            } 
        ?>
          </td>

        </tr>
      <?php } //endforeach; ?>

      <tr>
          <td><strong>Refund Comments</strong></td><td colspan="3"><textarea name="refundComments"></textarea></td>
      </tr>
      <tr>
          <td><strong>Refund Reason</strong>
          </td>
          <td colspan="3"><select name="refundReason">
                      <option value="BillingError">BillingError</option>
                      <option value="TaxExemptCustomer">TaxExemptCustomer</option>
                      <option value="ItemNotAsAdvertised">ItemNotAsAdvertised</option>
                      <option value="IncorrectItemReceived">IncorrectItemReceived</option>
                      <option value="CancelledYetShipped">CancelledYetShipped</option>
                      <option value="ItemNotReceivedByCustomer">ItemNotReceivedByCustomer</option>
                      <option value="IncorrectShippingPrice">IncorrectShippingPrice</option>
                      <option value="DamagedItem">DamagedItem</option>
                      <option value="DefectiveItem">DefectiveItem</option>
                      <option value="CustomerChangedMind">CustomerChangedMind</option>
                      <option value="CustomerReceivedItemLate">CustomerReceivedItemLate</option>
                      <option value="Missing Parts / Instructions">Missing Parts / Instructions</option>
                      <option value="Finance -> Goodwill">Finance -> Goodwill</option>
                      <option value="Finance -> Rollback">Finance -> Rollback</option>

                  </select>
          </td>
      </tr>
      <tr>
          <td colspan="4" style="text-align: center;" ><button class="btn btn-default" type="submit" >Refund</button></td>
      </tr>
      </tbody>
    </table>
  </form>
  
   
</div>


<script type="text/javascript">
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    function refundItems($id){
        
    }
</script>