<?php
use yii\helpers\Html;
$succes_img = Yii::$app->request->baseUrl.'/frontend/images/batchupload/fam_bullet_success.gif';
$error_img = Yii::$app->request->baseUrl.'/frontend/images/batchupload/error_msg_icon.gif';
$loader_img = Yii::$app->request->baseUrl.'/frontend/images/batchupload/rule-ajax-loader.gif';
$ipmort_url=Yii::$app->request->baseUrl.'/walmart/productcsv/index';

$url=\yii\helpers\Url::toRoute(['productcsv/barcodeupdate']);
$productfeedUrl= \yii\helpers\Url::toRoute(['productcsv/index']);
?>
<style type="text/css" >
    .shopify-api ul { list-style-type:none; padding:0; margin:0; }
    .shopify-api ul li { margin-left:0; border:1px solid #ccc; margin:2px; padding:2px 2px 2px 2px; font:normal 12px sans-serif; }
    .shopify-api img { margin-right:5px; }
    li span ul li{
        border : 0px !important;
        margin-left:18px !important;
    }
</style>

<div class="row">
    <div class="col-md-12" style="margin-top: 10px;">
        <div class="panel panel-default form new-section">
            <div class="jet-pages-heading">
                <div class="title-need-help">
                    <h1 class="Jet_Products_style">Product Update through CSV</h1>
                </div>
                <div class="product-upload-menu">
                    <a href="<?php echo $ipmort_url;?>">
                        <button class="btn btn-primary uptransform" type="button" title="Back"><span>Back</span></button>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="block-content panel-body shopify-api ">
                <ul class="warning-div" style="margin-top: 18px">
                    <li style="background-color:#Fff;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/note_msg_icon.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Starting Product Update execution, please wait...
                    </li>
                    <li style="background-color:#FFD;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/fam_bullet_error.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Warning: Please do not close the window during Product update
                    </li>
                </ul>

                <ul id="profileRows">
                    <li style="background-color:#DDF; ">
                        <img class="v-middle" src="<?php echo $succes_img ?>">
                        <?php echo 'Total '.$totalcount.' Product(s) Found.'; ?>
                    </li>
                    <li style="background-color:#DDF;" id="update_row">
                        <img class="v-middle" id="status_image" src="<?php echo $loader_img ?>">
                        <span id="update_status" class="text">Updating...</span>
                    </li>
                    <li id="liFinished" style="display:none;background-color:#Fff;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/note_msg_icon.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Finished Product Update execution.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var csrfToken = j$('meta[name=csrf-token]').attr("content");
    var totalRecords = parseInt("<?php echo $totalcount; ?>");
    var pages = parseInt("<?php echo $pages; ?>");
    var countOfSuccess = 0;
    var id = 0;
    var products = "<?php echo addslashes($products) ; ?>";
    var prod = JSON.parse(products);
    var i = 0;
    var limit = 100;
    var new_array = [];
    var v = [];
    var count = 0;
//        console.log(prod);
    j$.each(prod, function (index,value) {

        if(count < limit){
            new_array[count] = value;
            count++;
        }else{
            count = 0;
            v[i] = new_array;
            new_array = [];
            new_array[count] = value;
            count++;
            i++;
        }
        if(prod.length-1 == index)
        {
            v[i] =new_array;
        }
    });
//        console.log(v);

    var my_id = document.getElementById('liFinished');
    var update_status = document.getElementById('update_status');
    var update_row = document.getElementById('update_row');
    var status_image = document.getElementById('status_image');
    updatefeeddata();

    function updatefeeddata(){
        percent = getPercent();
        update_status.innerHTML = percent+'% Page '+(id+1)+' Of total product(s) pages '+v.length+' Processing';
        j$.ajax({
            url:"<?= $url?>",
            method: "post",
            dataType:'json',
            data:{ index : id,_csrf : csrfToken,count : totalRecords,products : v[id]},
            success: function(json) {//transport
                //var json = transport.responseText.evalJSON();
                id++;
                if(json.success){
                    countOfSuccess+=json.success.count;
                    var span = document.createElement('li');
                    span.innerHTML = '<img class="v-middle" src="<?php echo $succes_img ?>"><span class="text">'+json.success.count+' Product Updated of page '+id+'...</span>';
                    span.id = 'id-'+id;
                    span.style = 'background-color:#DDF';
                    update_row.parentNode.insertBefore(span, update_row);
                }
                if(json.error){
                    var errors = JSON.parse((json.error));
                    j$.each(errors,function (index,value) {
                        var span = document.createElement('li');
                        span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">'+value+' : Invalid product barcode</span>';
                        span.id = 'id-'+id;
                        span.style = 'background-color:#FDD';
                        update_row.parentNode.insertBefore(span, update_row);
                    });

                }
                if(id < v.length){
                    updatefeeddata();
                }else{
                    status_image.src = '<?php echo $succes_img ?>';
                    var span = document.createElement('li');

                    span.innerHTML = '<img class="v-middle" src="<?php echo $succes_img ?>"><span id="update_status" class="text">'+countOfSuccess+' Product(s) Successfully Updated.'+'</span>';

                    span.style = 'background-color:#DDF';
                    my_id.parentNode.insertBefore(span, my_id);
                    //$('liFinished').show();
                    document.getElementById("liFinished").style.display="block";
                    j$(".warning-div").hide();
                    j$("#profileRows").css({'margin-top':'10px'});
                    update_status.innerHTML = percent+'% '+(id)+' Of '+v.length+' Processed.';

                }
            },
            error: function(){
                id++;
                var span = document.createElement('li');
                span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">Something Went Wrong </span>';
                span.id = 'id-'+id;
                span.style = 'background-color:#FDD';
                update_row.parentNode.insertBefore(span, update_row);

                if(id < v.length){
                    updatefeeddata();
                }else{
                    status_image.src = '<?php echo $succes_img ?>';
                    var span = document.createElement('li');
                    span.innerHTML = '<img class="v-middle" src="<?php echo $succes_img ?>"><span id="update_status" class="text">'+countOfSuccess+' Feed(s) Successfully Uploaded.'+'</span>';
                    span.style = 'background-color:#DDF';
                    my_id.parentNode.insertBefore(span, my_id);
                    //$('liFinished').show();
                    j$(".warning-div").hide();
                    j$("#profileRows").css({'margin-top':'10px'});
                    document.getElementById("liFinished").style.display="block";
                }
            }
        });

    }

    function getPercent() {

        return Math.ceil(((id+1)/pages)*1000)/10;
    }

</script>