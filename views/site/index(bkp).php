<?php
use frontend\modules\walmart\components\Data;
?>
<div class="site-index">

<?php 
if(!\Yii::$app->user->isGuest) 
{
		if($popup=="show"){
			//include Yii::getAlias('@webroot').'/frontend/integration/views/layouts/configpopup.php';
            echo $this->render('popup/configpopup');
		}elseif($isExpire=="showLicenseExpirePopup"){
			//include Yii::getAlias('@webroot').'/frontend/integration/views/layouts/licenceexpirepopup.php';
            echo $this->render('popup/licenceexpirepopup');
		}elseif($isExpire=="showTrialExpirePopup"){
            echo $this->render('popup/trialexpirepopup');
		}

        //print_r($dashboard);die;
	?>
	
	
	<?php /*
		<div class="yii_notice jet_notice">
	        Please be informed that OUR OFFICE <b>WILL BE CLOSED</b> on the <b>15<sup>th</sup>-Aug-2016</b> in cunjunction of <b>INDEPENDENCE DAY</b>. For any query, you can mail us at <a href="mailto: shopify@cedcommerce.com?Subject= Need Help" target="_blank">shopify@cedcommerce.com</a>   
		</div>
	*/?>
	
	<div class="bs-component">
        <div class="alert alert-dismissible alert-success" >
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong style="float:left;">welcome <?php echo str_replace(".myshopify.com","",Yii::$app->user->identity->shop_name);?> ! </strong>
			<!-- <div style="float:right"> How to start ? <a class="alert-link" href="<?= Yii::$app->request->baseUrl ?>/how-to-sell-on-jet-com" target="_blank">Click here</a></div> -->
			<div style="clear:both"></div>
        </div>
    </div>

    <!-- Dashboard Starts From Here -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $dashboard['availableProduct'];?></h3>
                    <p>Live on Walmart</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <a href="<?= Data::getUrl('walmartproduct/index'); ?>/?WalmartProductSearch[title]=&WalmartProductSearch[sku]=&WalmartProductSearch[qty]=&WalmartProductSearch[price]=&WalmartProductSearch[upc]=&WalmartProductSearch[tax_code]=&WalmartProductSearch[type]=&WalmartProductSearch[status]=PUBLISHED" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-light-blue-active">
                <div class="inner">
                    <h3><?= $dashboard['reviewProduct'];?></h3>
                    <p>Under Walmart Review</p>
                </div>
                <div class="icon">
                    <i class="fa fa-eye"></i>
                </div>
                <a href="<?= Data::getUrl('walmartproduct/index'); ?>/?WalmartProductSearch[title]=&WalmartProductSearch[sku]=&WalmartProductSearch[qty]=&WalmartProductSearch[price]=&WalmartProductSearch[upc]=&WalmartProductSearch[tax_code]=&WalmartProductSearch[type]=&WalmartProductSearch[status]=Items+Processing&_pjax=%23w0" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3><?= $dashboard['readytoshipOrders'];?></h3>
                    <p>Ready to Ship</p>
                </div>
                <div class="icon">
                    <i class="fa fa-truck"></i>
                </div>
                <a href="<?= Data::getUrl('walmartorderdetail/index'); ?>/?WalmartOrderDetailSearch[purchase_order_id]=&WalmartOrderDetailSearch[sku]=&WalmartOrderDetailSearch[bigcommerce_order_id]=&WalmartOrderDetailSearch[status]=complete" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $dashboard['completed'];?></h3>
                    <p>Shipped orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-usd"></i>
                </div>
                <a href="<?= Data::getUrl('walmartorderdetail/index'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

    <!-- //Product Sale graph -->
<?php 
    if ($graphData && count($graphData)>0) {
?>
    <script type="text/javascript" src="<?= Yii::$app->request->baseUrl?>/js/loader.js"></script>
    <script type="text/javascript">
        //google.charts.load("current", {packages:["corechart"]});
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawAreaChart);
        function drawAreaChart() {
            var areaChartData = google.visualization.arrayToDataTable([
                ['Product SKU(s)', 'Number of Orders'],
        <?php $countrow=0;
              foreach ($graphData as $newKey=>$newVal) {   
        ?>
                [ "<?=$newKey ?>",<?=$newVal ?>     ],
        <?php $countrow++;
                if ($countrow==10) {
                    break;
                }
              } 
        ?>
            ]);
                            
            var options = {
                            bars: 'horizontal', // Required for Material Bar Charts.
                            //hAxis: {title: 'Product SKU',  titleTextStyle: {color: '#00A65A'}},
                            //vAxis: {title: 'Number of Orders',titleTextStyle: {color: '#00A65A'},minValue: 0}
                        };
            var areaChart = new google.charts.Bar(document.getElementById('product_chart_div')); 
            areaChart.draw(areaChartData, options);
        }          
    </script>
    <section class="col-lg-6 connectedSortable">             
        <div class="box box-primary">
            <div class="box-header" style="text-align: center;">
                <h3 class="box-title">Top 10 Ordered Products</h3>
            </div><!-- /.box-header -->
                              
            <div class="box-body" align="center" id="product_chart_div" style="width: 100%; height: 500px; float: left;">
            </div>
        </div><!-- /.box -->
    </section><!-- /.Left col -->
<?php 
    } elseif ($donut_chart_data && count($donut_chart_data)>0) {
?>
    <section class="col-lg-6 connectedSortable">
        <div class="box box-primary">
            <div class="box-header" style="text-align: center;">
                <h3 class="box-title">Products Details</h3>
            </div><!-- /.box-header -->
            <div  align="center" id="donut-example"></div>
        </div>

        <script type="text/javascript">
            Morris.Donut({
                element: 'donut-example',
                data: [
                    {label: "Total Products", value: <?= $donut_chart_data['all_prod'] ?>},
                    //{label: "mapped_prod", value: <?php /* echo $donut_chart_data['mapped_prod'] */ ?> },
            <?php if ($donut_chart_data['simple_prod_with_stnd_code']>0) { ?>
                    {label: "Ready to Upload(simple)", value: <?= $donut_chart_data['simple_prod_with_stnd_code'] ?>},
            <?php }
                  if ($donut_chart_data['variants_prod_with_stnd_code']>0) {
            ?>
                    {label: "Ready to Upload(variants)", value: <?= $donut_chart_data['variants_prod_with_stnd_code']; ?>},
            <?php } 
                  //if ($donut_chart_data['missing_UPC_ASIN_MPN']>0) {
            ?>
                    //{label: "Missing UPC/ASIN/MPN", value: <?= $donut_chart_data['missing_UPC_ASIN_MPN']; ?>},
            <?php //} ?>
                ]
            });
        </script>
    </section>
    <section class="col-lg-6 connectedSortable">
        <table class="table table-striped table-bordered" cellspacing="0">
            <tr>
                <th colspan="2"><center><b>STATISTIC</b></center></th>
            </tr>
            <tr>
                <td>Total Products</td>
                <td>You have <?= $donut_chart_data['all_prod'] ?> products in app</td>
            </tr>
    <?php   if ($donut_chart_data['simple_prod_with_stnd_code']>0) {  ?>
            <tr>
                <td>Ready to Upload(simple)</td>
                <td>You have  <?= $donut_chart_data['simple_prod_with_stnd_code'] ?> Product(s) with unique Standard code and ready to upload on Jet  </td>
            </tr>
    <?php   }
            if ($donut_chart_data['variants_prod_with_stnd_code']>0) {
    ?>
            <tr>
                <td>Ready to Upload(variants)</td>
                <td>You have <?= $donut_chart_data['variants_prod_with_stnd_code'] ?> Product(s) with unique Standard code(with variation) and need to map with Jet attributes to upload on Jet </td>
            </tr>
    <?php   }
            //if ($donut_chart_data['missing_UPC_ASIN_MPN'] > 0) {
    ?>
            <!-- <tr>
                <td>Missing UPC/ASIN/MPN</td>
                <td>You have <?php //echo $donut_chart_data['missing_UPC_ASIN_MPN'] ?> products in your shopify store, that doesn't contain the either UPC or ASIN or MPN </td>
            </tr> -->
    <?php   //}   ?>
        </table>
    </section>
<?php 
    }               
?>   
</div>
<?php 
} 
else 
{ 
?>
    <div class="jumbotron">
        <p class="lead">Walmart Shopify Interface</p>
        <img class="jet-logo-big" src="<?php echo Yii::$app->request->baseUrl?>/images/jet_word_logo.jpg" width="300" height="200">
        <p class="lead">Jet is a new kind of marketplace — a smart shopping platform that finds ways to turn built-in costs into opportunities to save you money. Welcome to the ultimate shopping hack.</p>
    </div>
</div> 
<!-- Dashboard Ends -->
<?php }?>

<?/*

<style>
.start.breadcrumb > h3 {
  float: left;
  margin-bottom: 0;
  margin-top: 0;
}
.start.breadcrumb .how_start {
  float: right;
}
.panel {
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
}
.panel-red {
    border-color: #f44336;
}
.panel-heading {
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
  min-height: 85px;
  padding: 5px 7px;
}
.panel-red .panel-heading {
    background-color: #f44336;
    border-color: #f44336;
    color: #fff;
}
.panel-red a {
    color: #f44336;
    font-size: 13px;
}
.panel-green {
    border-color: #7501B1;
}
.panel-green .panel-heading {
    background-color: #7501B1;
    border-color: #7501B1;
    color: #fff;
}
.panel-green .panel-heading {
    background-color: #7501B1;
    border-color: #7501B1;
    color: #fff;
}
.panel-green a {
    color: #7501B1;
    font-size: 13px;
}
.panel-yellow {
    border-color: #757500;
}
.panel-yellow .panel-heading {
    background-color: #757500;
    border-color: #757500;
    color: #fff;
}

.panel-yellow a {
    color: #757500;
    font-size: 13px;
}

.panel-lime {
    border-color: #F47922;
}
.panel-lime .panel-heading {
    background-color: #F47922;
    border-color: #F47922;
    color: #fff;
}
.panel-lime a {
    color: #F47922;
    font-size: 13px;
}
 
.panel-blue {
    border-color: #03a9f4;
}
.panel-blue .panel-heading {
    background-color: #03a9f4;
    border-color: #03a9f4;
    color: #fff;
}
.panel-blue a {
    color: #03a9f4;
    font-size: 13px;
}

.panel-light {
    border-color: #009688;
}
.panel-light .panel-heading {
    background-color: #009688;
    border-color: #009688;
    color: #fff;
}
.panel-light a {
    color: #009688;
    font-size: 13px;
}


.panel-red-gray {
    border-color: #ff5722;
}
.panel-red-gray .panel-heading {
    background-color: #ff5722;
    border-color: #ff5722;
    color: #fff;
}
.panel-red-gray a {
    color: #ff5722;
    font-size: 13px;
}

.panel-dark {
    border-color: #4caf50;
}
.panel-dark .panel-heading {
    background-color: #4caf50;
    border-color: #4caf50;
    color: #fff;
}
.panel-dark a {
    color: #4caf50;
    font-size: 13px;
}
.huge {
    font-size: 21px !important;
}
.info-heading {
    margin-top: 6px;
    font-size: 16px;
}
</style>
*/?>
