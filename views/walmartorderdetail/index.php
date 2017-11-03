<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use yii\widgets\Pjax;
use frontend\modules\walmart\components\Data;
$walmartOrderItemsRefundContent = \yii\helpers\Url::toRoute(['walmartorderdetail/refund-data']);
$walmartOrderShippingContent = \yii\helpers\Url::toRoute(['walmartorderdetail/curlprocessfororder']);
$viewWalmartOrderDetails = \yii\helpers\Url::toRoute(['walmartorderdetail/vieworderdetails']);
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\walmart\models\WalmartOrderDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Walmart Order Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walmart-order-details-index content-section">
  <div class="form new-section">
    <div class="jet-pages-heading">
      <div class="title-need-help">
        <h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
        <a class="help_jet" title="Need Help" target="_blank" href="<?= Yii::$app->request->baseUrl; ?>/walmart-marketplace/sell-on-walmart"></a>
      </div>
       <div class="product-upload-menu">
        <a class="btn btn-primary" id="fetch-walmart-orders" data-step="1" data-intro="Fetch the order(s) that are created from walmart." data-position="left" title="Fetch Walmart Orders" href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartorderdetail/create">Fetch Walmart Orders</a>
         <a class="btn btn-primary"  title="Update shipment to walmart panel" href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartorderdetail/curlprocessfororder">Update Shipment Data</a>
        <a class="btn btn-primary"  id="sync-walmart-orders" data-step="2" data-intro="Sync order(s) from walmart." data-position="left" title="Create Walmart order in store" href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartorderdetail/syncorder">Synchronize Walmart Orders <?php if($countOrders>0){?><span class="sync_notication"><?php echo $countOrders;?></span><?php }?></a>
        <a class="btn btn-primary" id="update-orders-status" data-step="1" data-intro="Update the order(s) status from walmart." data-position="left" title="Get Current Order Status" href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartorderdetail/updateorderstatus">Update Order status</a>
        <a class="btn btn-primary" id="ack-order" data-step="1" data-intro="Fetch the acknowledgement Order." data-position="left" title="Get Acknowledgement order" href="<?= Yii::$app->request->baseUrl; ?>/walmart/walmartorderdetail/ackorder">Fetch Acknowledged Order</a>
       
        <span title="Need Help" class="help_jet white-bg" style="cursor:pointer;" id="bulk-action-help"></span>
      </div>
      <div class="clear"></div> 
  </div>

  <div class="responsive-table-wrap">
  <?php Pjax::begin(['timeout' => 5000, 'clientOptions' => ['container' => 'pjax-container']]); ?>
    <?= GridView::widget([
      'options'=>['class'=>'grid-view table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id',
      'purchase_order_id',
           /* [
               'label'=>'Order Name (Shopify)',
               'attribute'=>'shopify_order_name',
               'format'=>'raw',
               'value' => function($data){
                $result="";
                  $result=User::find()->where(['id'=>$data->merchant_id])->one();
                  if($result)
                    $shopname=$result->username;
                $url = "https://".$shopname."/admin/orders/".$data->shopify_order_id;
                return Html::a($data->shopify_order_name, $url, ['title' => 'Shopify Order Name','target'=>'_blank']);
               }
             ],*/
            'sku',
            [
               'label'=>'Bigcommerce Order Id',
               'attribute'=>'bigcommerce_order_id',
               'format'=>'raw',
               'value' => function($data){
                if($data->bigcommerce_order_id==0)
                  return '';
                else
                  return $data->bigcommerce_order_id;
               }
             ],
      
             // 'reference_order_id',
            // 'order_data:ntext',
            // 'shipment_data:ntext',             
            [
                'attribute'=> 'status',
                'contentOptions'=>['style'=>'width: 250px;'],
                'filter' => ["acknowledged"=>"acknowledged","Shipped"=>"Shipped","Cancelled"=>"Cancelled"],
            ],

            'created_at',

            
            ['class' => 'frontend\modules\walmart\components\Grid\OrderDetails\ActionColumn'],
        ],
    ]); ?>
 <?php Pjax::end(); ?>
 </div>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="text-align: center;font-family: "Comic Sans MS";">Items Refund</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="shippingModal" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="text-align: center;font-family: "Comic Sans MS";">Ship Order</h4>
            </div>
            <div class="modal-body">
                Tracking Number : <select id="requested_shipments" name="key">
                  
                </select>
                <input type="hidden" id="order_id"/>
                <input type="hidden" id="order_name"/>
                Carrier <select id="shipping_carrier" name="carrier">
                  <option value="UPS">UPS</option>
                  <option value="USPS">USPS</option>
                  <option value="FedEx">FedEx</option>
                  <option value="Airborne">Airborne</option>
                  <option value="OnTrac">OnTrac</option>

                </select>
                <button id="ship_now" type="Button">Ship</button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div  id="view_walmart_order"></div>

<script type="text/javascript">
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    function openRefundPopup($id){
        
        var url='<?= $walmartOrderItemsRefundContent ?>';
        j$('#LoadingMSG').show();
        j$.ajax({
          method: "post",
          url: url,
          data: {id:$id,_csrf : csrfToken }
        })
        .done(function(msg) {
           j$('#LoadingMSG').hide();
           j$('#myModal .modal-body').html(msg); 
           $('#products_error #myModal').modal('show');
        });
        
        //$('#myModal .modal-body').html($url);
        $('#myModal').modal('show');
    }

  function checkorderstatus(purchase_order_id) 
  {
      var url = '<?= $viewWalmartOrderDetails; ?>';
      $('#LoadingMSG').show();
      $.ajax({
          method: "post",
          url: url,
          data: {purchase_order_id: purchase_order_id, _csrf: csrfToken}
      })
      .done(function (msg) {
        $('#LoadingMSG').hide();
        $('#view_walmart_order').html(msg);
        $('#view_walmart_order').css("display", "block");
        $('#view_walmart_order #myModal').modal({
            keyboard: false,
            backdrop: 'static'
        })
      })
  }


    function openShippingPopup($data){
        
        if(typeof $data=='undefined'||$data.length<=0)
          return;
        var select = document.getElementById('requested_shipments');
        while (select.firstChild) {
            select.removeChild(select.firstChild);
        }
            var opt = document.createElement('option');
            opt.value = '';
            opt.innerHTML = "Select Option";
            select.appendChild(opt);
        for(var key in $data){
            var opt = document.createElement('option');
            opt.value = key;
            opt.innerHTML = $data[key].fulfillments[0].tracking_number;
            select.appendChild(opt);
        }
        //document.getElementById('order_id').value=$data[0].id;
        //document.getElementById('order_name').value=$data[0].name;
        select.onchange = function(){
          if(typeof $data[this.value]!='undefined'){
            document.getElementById('order_id').value=$data[this.value].id;
            document.getElementById('order_name').value=$data[this.value].name;
          }
          else
          {
            document.getElementById('order_id').value='';
            document.getElementById('order_name').value='';
          }
        }

        document.getElementById('ship_now').onclick = function(){
          var url='<?= $walmartOrderShippingContent ?>';
          j$('#LoadingMSG').show();
          j$.ajax({
            method: "get",
            url: url,
            data: {id:$('#order_id').val(),name:$('#order_name').val(),carrier:$('#shipping_carrier').val(),mannual:true,_csrf : csrfToken,key:$('#requested_shipments').val() }
          })
          .done(function(msg) {
            window.location.reload(false);
          });
        }

        $('#shippingModal').modal('show');
    }

    var introBulkAction = "";
    $(function () {

            var introBulkAction = introJs().setOptions({
                showStepNumbers: false,
                exitOnOverlayClick: false,
                steps: [
                    
                    {
                        element: '#fetch-walmart-orders',
                        intro: " Fetch the order(s) that are created from walmart.",
                        position: 'bottom'
                    },
                    {
                        element: '#sync-walmart-orders',
                        intro: " Sync Order(s) from walmart.",
                        position: 'bottom'
                    },
                    {
                        element: '#sync-walmart-orders',
                        intro: "Click here to Sync Order(s) walmart orders.",
                        position: 'bottom'
                    },

                ]
            });
            $('#bulk-action-help').click(function () {
                introBulkAction.start();
            });

        });
</script>
<?php $get = Yii::$app->request->get();
  if(isset($get['tour'])) : 
?>
  <script type="text/javascript">
    $(document).ready(function(){
      var productQuicktour = introJs().setOptions({
        doneLabel: 'Next page',
              showStepNumbers: false,
              exitOnOverlayClick: false,
            });

            productQuicktour.start().oncomplete(function() {
              window.location.href = '<?= Data::getUrl("walmartconfiguration/index?tour") ?>';
          });
      });
  </script>
<?php endif; ?>