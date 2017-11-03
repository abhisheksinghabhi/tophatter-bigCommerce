<?php
    use yii\helpers\Html;
?>

<div class="container">
      <!-- Modal -->
      <div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content" id='edit-content'>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" style="text-align: center;font-family: "Comic Sans MS";">Order Current Status on Walmart</h4>
            </div>
            <div class="modal-body">
                <div class="jet-product-form">
                    <div class="form-group">
                        <div class="field-jetproduct">
                            <table class="table table-striped table-bordered">                              
                                <tbody>
                                    <tr>
                                        <td class="value_label" width="33%">
                                            <span>Purchase Order ID</span>
                                        </td>
                                        <td class="value form-group " width="100%">
                                            <span><?= $model['purchaseOrderId']?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="value_label" width="33%">
                                            <span>Customer Email ID</span>
                                        </td>
                                        <td class="value form-group " width="100%">
                                            <span><?= $model['customerEmailId']?></span>
                                        </td>
                                    </tr>
                                    </tbody>
                            </table> 
                            <?
                                if (isset($model['orderLines']['orderLine'])) 
                                {?>
                                    
                                        <table class="table table-striped table-bordered">                              
                                            <thead>
                                                <tr>
                                                    <th>Product Title</th>
                                                    <th>Product SKU</th>
                                                    <th>Amount</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                    <th>Shipping Carrier</th>
                                                    <th>Tracking Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                                foreach ($model['orderLines']['orderLine'] as $key => $value) 
                                                    {
                                                ?>

                                                    <tr>
                                                        <td>
                                                            <span><?= $value['item']['productName']?></span>
                                                        </td>
                                                        <td>
                                                            <span><?= $value['item']['sku']?></span>
                                                        </td>

                                                        <?
                                                            if (isset($value['charges']['charge'])) 
                                                            {   
                                                                foreach ($value['charges']['charge'] as $key1 => $val1) 
                                                                {
                                                                    if($val1['chargeType']=="SHIPPING")
                                                                    continue;
                                                                    ?>
                                                                        
                                                                        <td >
                                                                            <span><?= $val1['chargeAmount']['amount']."   ".$val1['chargeAmount']['currency']?></span>
                                                                        </td>
                                                                    <?                                          
                                                                }  
                                                            }

                                                            if (isset($value['orderLineQuantity'])) 
                                                            {                                                                   
                                                                ?>
                                                                    
                                                                    <td >
                                                                        <span><?= $value['orderLineQuantity']['unitOfMeasurement']?></span>
                                                                    </td>
                                                                                                                                
                                                                    <td >
                                                                        <span><?= $value['orderLineQuantity']['amount']?></span>
                                                                    </td>
                                                                <?php
                                                            }

                                                            if (isset($value['orderLineStatuses']['orderLineStatus'])) 
                                                            {   
                                                                foreach ($value['orderLineStatuses']['orderLineStatus'] as $key2 => $val2) 
                                                                {
                                                                    if (isset($val2['status'])) 
                                                                    {
                                                                        ?>
                                                                            
                                                                            <td >
                                                                                <span><?= $val2['status']?></span>
                                                                            </td>
                                                                        <?  
                                                                    }
                                                                    if (isset($val2['trackingInfo']['carrierName']['carrier'])) 
                                                                    {
                                                                        ?>
                                                                            
                                                                            <td >
                                                                                <span><?= $val2['trackingInfo']['carrierName']['carrier']?></span>
                                                                            </td>
                                                                        <?  
                                                                    }elseif (isset($val2['trackingInfo']['carrierName']['otherCarrier'])) 
                                                                    {
                                                                        ?>
                                                                            
                                                                            <td >
                                                                                <span><?= $val2['trackingInfo']['carrierName']['otherCarrier']?></span>
                                                                            </td>
                                                                        <?  
                                                                    }
                                                                    if (isset($val2['trackingInfo']['trackingNumber'])) 
                                                                    {
                                                                        ?>
                                                                            
                                                                            <td >
                                                                                <span><?= $val2['trackingInfo']['trackingNumber']?></span>
                                                                            </td>
                                                                        <?  
                                                                    }
                                                                    /*if (isset($val2['trackingInfo']['trackingURL'])) 
                                                                    {
                                                                        ?>
                                                                            
                                                                            <td >
                                                                                <span><?= $val2['trackingInfo']['trackingURL']?></span>
                                                                            </td>
                                                                        <?  
                                                                    }*/
                                                                    ?>                                              
                                                                <?php                                                               
                                                                }                                                               
                                                            }
                                                        ?>              
                                                    </tr>

                                                <? }?>
                                            </tbody>
                                        </table>

                             <? 
                                }
                            ?>
                            <? 
                                if (isset($model['shippingInfo'])) 
                                    {
                                        ?>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Zip Code</th>
                                                    <th>Country</th>
                                                    <th>Address Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?
                                            if (isset($model['shippingInfo']['postalAddress'])) 
                                            {                                               
                                                ?>  
                                                <tr>                                                    
                                                        
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['postalAddress']['name']?></span>
                                                                </td>
                                                                
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['phone']?></span>
                                                                </td>
                                                            
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['postalAddress']['address1']?></span>
                                                                </td>
                                                            
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['postalAddress']['city']?></span>
                                                                </td>
                                                            
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['postalAddress']['state']?></span>
                                                                </td>
                                                            
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['postalAddress']['postalCode']?></span>
                                                                </td>
                                                            
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['postalAddress']['country']?></span>
                                                                </td>
                                                           
                                                                <td>
                                                                    <span><?= $model['shippingInfo']['postalAddress']['addressType']?></span>
                                                                </td>
                                                            </tr>
                                                    
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                            </tbody>
                                        </table>
                                        
                                        <?                                          
                                    }
                            ?>
                        </div>
                     </div>
                </div>                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>              
        </div>
    </div>   
</div>