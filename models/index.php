<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Manage Products';
$this->params['breadcrumbs'][] = $this->title;
$merchant_id=MERCHANT_ID;
$urlJet= \yii\helpers\Url::toRoute(['walmartproduct/getwalmartdata']);
$urlJetEdit= \yii\helpers\Url::toRoute(['walmartproduct/editdata']);
$urlJetError= \yii\helpers\Url::toRoute(['walmartproduct/errorwalmart']);
$urlGetTax=\yii\helpers\Url::toRoute(['walmartproduct/gettaxcode']);
$saveVariantImageUrl= yii\helpers\Url::toRoute(['walmartproduct/changevariantimage']);
?>

<style>
.jet-product-index .jet_notice{
  font-weight: normal !important;
}
.jet-product-index .jet_notice .fa-bell {
  color: #B11600;
}
.jet-product-index .no-data{
  display: none;
}
  .jet-product-index .no_product_error{
      background-color: #f2dede;
      border-color: #ebccd1;
      color: #a94442;
  }
 .jet_config_popup .product-import,.jet_config_popup .welcome_message{
    background: #fff none repeat scroll 0 0;
    border-radius: 5px !important;
    margin: 5% auto 3%;
    overflow: hidden;
    position: relative;
    width: 50%;
    margin-top: 11%;
  }
  .import-product .import-btn .btn{
    background-color: #6f6f6f !important;
    border-color: #067365 !important;
    margin-bottom: 8px;
    margin-left: 5px;
    color:white;
    padding: 11px 22px;
}
.import-product .import-btn .btn:hover{
  background-color: #067365 !important;
    border-color: #067365 !important;
}
.jet-product-index .jet_notice {
    background-color: #f5f5f5;
    border-color: #d6e9c6;
    border-radius: 4px;
    color: #333;
    font-size: 14px;
    font-weight: bold;
    line-height: 19px;
    margin-bottom: 0;
    padding: 4px 8px;
}
.import_popup.jet_config_popup.jet_config_popup_error {
  box-shadow: 0 0 6px 3px #000000;
  left: 0;
  top: 0%;
  width: 100%;
}
.upload-error{
	color: #F16935;
	font-size: 1.5em;
	margin-left: 8px;
}
</style>
<div class="jet-product-index">
<?= Html::beginForm(['walmartproduct/ajax-bulk-upload'],'post');//Html::beginForm(['walmartproduct/bulk'],'post');?>
	<div class="jet-pages-heading">
		<h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Update Product Price', ['updateprice'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Update Product Inventory', ['updateinventory'], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Get Product Status', ['batchproductstatus'], ['class' => 'btn btn-primary']) ?>
		<!--<?=Html::submitButton('submit', ['class' => 'btn btn-primary',]);?>
		<?php $arrAction=array('batch-upload'=>'Upload');?>
		<?=Html::dropDownList('action','',$arrAction,['class'=>'form-control pull-right',])?>-->

    
    <div class="submit-upload-wrap">
      <?=Html::submitButton('submit', ['class' => 'btn btn-primary',]);?>
      <?php $arrAction=array('batch-upload'=>'Upload','batch-retire'=>'Retire', 'batch-product-status'=>'Update Status');?>
      <?=Html::dropDownList('action','',$arrAction,['class'=>'form-control pull-right',])?>
    </div>
   

		<div class="clear"></div>
	</div>
  <div class="jet_notice" style="background-color: #FCF8E3;">
    <span class="font_bell">
      <i class="fa fa-list" aria-hidden="true"></i>
      <!-- <i class="fa fa-bell fa-1x"></i> -->
    </span>
    Don't see all of your products? Just click <a href="<?= yii\helpers\Url::toRoute('categorymap/index');?>">here</a> to map all bigcommerce product type(s) with walmart category.
    <div class="list-page" style="float:right">
      Show per page 
      <select onchange="selectPage(this)" class="form-control" style="display: inline-block; width: auto; margin-top: 0px; margin-left: 5px; margin-right: 5px;" name="per-page">
        <option value="25" <?php if(isset($_GET['per-page']) && $_GET['per-page']==25){echo "selected=selected";}?>>25</option>
        <option <?php if(!isset($_GET['per-page'])){echo "selected=selected";}?> value="50">50</option>
        <option value="100" <?php if(isset($_GET['per-page']) && $_GET['per-page']==100){echo "selected=selected";}?> >100</option>
      </select>
      Items
    </div>
    <div style="clear:both"></div>
  </div>
	
   <?php Pjax::begin(['timeout' => 5000, 'clientOptions' => ['container' => 'pjax-container']]); ?>
    <?= GridView::widget([
    	'id'=>"product_grid",
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterSelector' => "select[name='".$dataProvider->getPagination()->pageSizeParam."'],input[name='".$dataProvider->getPagination()->pageParam."']",
        'pager' => [
            'class' => \liyunfang\pager\LinkPager::className(),
            'pageSizeList' => [25,50,100],
            'pageSizeOptions' => ['class' => 'form-control','style' => 'display: none;width:auto;margin-top:0px;'],
            'maxButtonCount'=>5,
        ],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
        		//['class' => 'yii\grid\CheckboxColumn'],
            ['class' => 'yii\grid\CheckboxColumn',
               'checkboxOptions' => function($data)
                {
                    return ['value' => $data['product_id']];
                },
            ],
           //'id',
            [
              'attribute' => 'image',
              'format' => 'html',
              'label' => 'Image',
              'value' => function ($data) 
              {

                if($data['jet_product']['image']){
                    if(count(explode(',',$data['jet_product']['image']))>0)
                    {
                        $images=[];
                        $images=explode(',',$data['jet_product']['image']);
                        return Html::img($images[0],
                            ['width' => '80px','height'=>'80px']);
                     }else{
                        return Html::img($data['jet_product']['image'],
                            ['width' => '80px','height'=>'80px']);
                    }
                 }else{
                     return "";
                 }
              },
          ],
          [
            'attribute'=>'title',
            'label'=>'Title',
            'value'=>function ($data) 
            {
               
              $add_data=($data['jet_product']['title']);
               
               return $add_data;
            },
          ],
          [
            'attribute'=>'sku',
            'label'=>'Sku',
            'value'=>'jet_product.sku',
          ],
          [
            'attribute'=>'qty',
            'label'=>'Quantity',
            'value'=>'jet_product.qty',
          ],
          
          [
            'attribute'=>'price',
            'label'=>'Price',
            'value'=>'jet_product.price',
          ],
          [
            'attribute'=>'upc',
            'label'=>'Barcode',
            'value'=>function ($data) 
            {
               $add_data=json_decode($data['jet_product']['additional_info']);
               $upc=json_decode($data['jet_product']['upc']);
              if($upc)
               	return $upc;
              else 
              	return $add_data->upc_code;
            },
          ],
          //'tax_code',
          [
            'attribute'=>'tax_code',
            'label'=>'Tax Code',
            'format'=>'raw',
            'headerOptions' => ['width' => '150'],
            'value' => function ($data) 
              {
                return $data->tax_code;
                /*return Html::a(
                        'Get TaxCode', 
                        'javascript:void(0)',['data-pjax'=>0,'onclick'=>'getTax(this.id)','id'=>$data->product_id]
                    );*/
              },
          ],
          [
            'attribute'=>'type',
            'label'=>'Type',
            'headerOptions' => ['width' => '80'],
            'filter' => ["simple"=>"simple","variants"=>"variants" ],
            'value' => function ($data) 
            {
               return $data['jet_product']['type'];
            },

          ],
          [
            'attribute'=>'status',
            'label'=>'Status',
            'headerOptions' => ['width' => '160'],
            'filter' => ["Items Processing"=>"Submitted on walmart","Not Uploaded"=>"Not Uploaded","PUBLISHED"=>"PUBLISHED"],
              'value' => function ($data) 
              {
                 return $data['status'];
              },
             
          ],

          [
              'class' => 'yii\grid\ActionColumn',
              'header'=>'Action','headerOptions' => ['width' => '80'],
              'template' => '{update}{view}{link}{errors}{changeImage}',
          	'buttons' => [
      			    
              'update' => function ($url,$model)
              { 			                      
                    return Html::a(
                        '<span class="glyphicon glyphicon-plus-sign"> </span>',
                        'javascript:void(0)',['data-pjax'=>0,'onclick'=>'clickEdit(this.id)','title'=>'Edit product','id'=>$model->id]
                        );			                         
              },
              'view' => function ($url,$model)
              {
                  if($model->status=="PUBLISHED")
                  {
                    //var_dump($model);die;
                    return Html::a(
                        '<span class="glyphicon glyphicon-eye-open jet-data"> </span>', 
                        'javascript:void(0)',['data-pjax'=>0,'onclick'=>'clickView(this.id)','title'=>'View Product Detail','id'=>$model->jet_product->sku]
                    );
                  }
              },
              'errors'=> function ($url,$model)
              {
                if(($model->error !="") && !is_null($model->error))
                {
                  return Html::a(
                      '<span class="fa fa-exclamation-circle upload-error"> </span>', 
                      'javascript:void(0)',['data-pjax'=>0,'onclick'=>'checkError(this.id)','title'=>'Upload Error','id'=>$model->id]
                  );
                }                            
              },
              'changeImage'=> function ($url,$model)
              {
              	if($model->merchant_id=="226")
				{
              		return Html::a(
              				'<span class="glyphicon glyphicon-camera"> </span>',
              				'javascript:void(0)',['data-pjax'=>0,'onclick'=>'changeVariantImage(this.id)','title'=>'Update Image','id'=>$model->product_id]
              		);
              	}
              },
    				],
          ],
        ],
    ]);?>
<?php Pjax::end(); ?>
</div>
	<?php 
	if(isset($productPopup))
	{            	
	?>
	<div class="walmart_config_popup walmart_config_popup_error" style="">
		<div id="jet-import-product" class="import-product" >
			<div class="fieldset welcome_message">
				<div class="entry-edit-head">
					<h4 class="fieldset-legend">
						Welcome! to Walmart Products Import Section
					</h4>
				</div>
				<?php 
					if ($countUpload)
          {
						?>
						<div class="entry-edit-head">
						    <h4>You have <?php echo $countUpload;?> products in your bigcommerce Store. </h4>
							<h4 id="product_import" class="alert-success" style="display: none"></h4>
							<h4 id="not_sku" style="display: none" class="alert-success"></h4>		
						</div>
						<div class="import-btn">
							<h4>Click to import BigCommerce store products to Walmart Marketplace Integration App<h4>
							<a href="<?php echo \yii\helpers\Url::toRoute(['walmartproduct/batchimport'])?>" class="btn">Import Products</a>		
						</div>
						<?php 
					}else{
						?>
						<div class="product-error">
							<h4>Either you don't have any product or none of products have SKU in your bigcommerce Store </h4>
						</div>
						<?php 
					}
				?>
				<div class="loading-bar" style="display: none;">
					<img alt="" src="<?=Yii::$app->getUrlManager()->getBaseUrl() ?>/images/loading_spinner.gif">
					<h3>Please wait...</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="walmart_config_popup_overlay" style=""></div>
<?php }?>
<div id="view_jet_product" style="display:none">
</div>
<div id="edit_jet_product" style="display:none">
</div>
<div id="products_error" style="display:none">
</div>

<?php if($merchant_id==226){
	?>
	<div id="products_image" style="display:none">
	</div>
	<div id="update_variant_products_image" style="display:none">
	</div>
<?php }?>
<script type="text/javascript">
var submit_form = false;
$('body').on('keyup','.filters > td > input', function(event) {
	    if (event.keyCode == 13) {
	    	 if(submit_form === false) {
	    	        submit_form = true;
	    	        $("#product_grid").yiiGridView("applyFilter");
	    	    }
	    }

});
$("body").on('beforeFilter', "#product_grid" , function(event) {
	 return submit_form;
});
$("body").on('afterFilter', "#product_grid" , function(event) {
	submit_form = false;
});
var csrfToken = $('meta[name="csrf-token"]').attr("content");
function clickView(id){
  var url='<?= $urlJet ?>';
  var merchant_id='<?= $merchant_id;?>';
  j$('#LoadingMSG').show();
    j$.ajax({
      method: "post",
      url: url,
      data: {id:id,merchant_id : merchant_id,_csrf : csrfToken }
    })
    .done(function(msg) {
    console.log(msg);
       j$('#LoadingMSG').hide();
       j$('#view_jet_product').html(msg);
       j$('#view_jet_product').css("display","block");    
       $('#view_jet_product #myModal').modal('show');
    });
}
function clickEdit(id){
	var url='<?= $urlJetEdit; ?>';
	var merchant_id='<?= $merchant_id;?>';
	//j$('#LoadingMSG').show();
    j$.ajax({
      method: "post",
      url: url,
      data: {id:id,merchant_id : merchant_id,_csrf : csrfToken}
    })
    .done(function(msg){
		//console.log(msg);
       j$('#LoadingMSG').hide();
       j$('#edit_jet_product').html(msg);
       j$('#edit_jet_product').css("display","block");	  
       $('#edit_jet_product #myModal').modal({
    	   keyboard: false,
    	   backdrop: 'static'
       })
    });
}
function checkError(id){
	var url='<?= $urlJetError ?>';
	var merchant_id='<?= $merchant_id;?>';
	j$('#LoadingMSG').show();
    j$.ajax({
      method: "post",
      url: url,
      data: {id:id,merchant_id : merchant_id,_csrf : csrfToken }
    })
    .done(function(msg) {
		console.log(msg);
       j$('#LoadingMSG').hide();
       j$('#products_error').html(msg);
       j$('#products_error').css("display","block");	  
       $('#products_error #myModal').modal('show');
    });
}
function getTax(id)
{
  var url='<?= $urlGetTax ?>';
  j$('#LoadingMSG').show();
    j$.ajax({
      method: "post",
      url: url,
      data: {id:id,_csrf : csrfToken }
    })
    .done(function(msg) 
    {
      //console.log(msg);
      j$('#LoadingMSG').hide();
      j$('#products_error').html(msg);
      j$('#products_error').css("display","block");    
      $('#products_error #myModal').modal('show');
    });
}

function changeVariantImage(product_id){
	//alert(product_id);
	var url='<?= $saveVariantImageUrl; ?>';
	var merchant_id='<?= $merchant_id;?>';
	j$('#LoadingMSG').show();
    j$.ajax({
      method: "post",
      url: url,
      data: {product_id : product_id ,_csrf : csrfToken}
    })
    .done(function(msg){
		console.log(msg);
       j$('#LoadingMSG').hide();
       j$('#update_variant_products_image').html(msg);
       j$('#update_variant_products_image').css("display","block");	  
       $('#update_variant_products_image #myModal').modal({
    	   keyboard: false,
    	   backdrop: 'static'
       })
    });
}

function selectPage(node){

  var value=$(node).val();

  $('#product_grid').children('select.form-control').val(value);
}
</script>