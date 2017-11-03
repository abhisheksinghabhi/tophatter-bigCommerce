<?php
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;

$succes_img = Yii::$app->request->baseUrl.'/frontend/images/batchupload/fam_bullet_success.gif';
$error_img = Yii::$app->request->baseUrl.'/frontend/images/batchupload/error_msg_icon.gif';
$loader_img = Yii::$app->request->baseUrl.'/frontend/images/batchupload/rule-ajax-loader.gif';

$ipmort_url = Data::getUrl('walmartrepricing/index');
$url = Data::getUrl('walmartrepricing/savebuyboxdata');
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
                    <h1 class="Jet_Products_style">Syncing Buybox Data</h1>
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
                        Starting Buybox Sync, please wait...
                    </li>
                    <li style="background-color:#FFD;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/fam_bullet_error.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Warning: Please do not close the window during the Syncronisation process
                    </li>
                </ul>

                <ul id="profileRows">
                    <li style="background-color:#DDF; ">
                        <img class="v-middle" src="<?php echo $succes_img ?>">
                        <?php echo 'Total '.$total_products.' Records(s) Found.'; ?>
                    </li>
                    <li style="background-color:#DDF;" id="update_row">
                        <img class="v-middle" id="status_image" src="<?php echo $loader_img ?>">
                        <span id="update_status" class="text">Updating...</span>
                    </li>
                    <li id="liFinished" style="display:none;background-color:#Fff;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/note_msg_icon.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Finished Buybox Syncronisation process.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var csrfToken = j$('meta[name=csrf-token]').attr("content");
    var totalRecords = parseInt("<?= $total_products; ?>");
    var pages = parseInt("<?php echo $pages; ?>");
    var countOfSuccess = 0;
    var id = 0;

    var my_id = document.getElementById('liFinished');
    var update_status = document.getElementById('update_status');
    var update_row = document.getElementById('update_row');
    var status_image = document.getElementById('status_image');

    if((id+1)==pages)
        SyncData(1);
    else
        SyncData(0);

    function SyncData(islast){
        percent = getPercent();
        update_status.innerHTML = percent+'% Page '+(id+1)+' Of '+ pages +' Processing';
        j$.ajax({
            url:"<?= $url?>",
            method: "post",
            dataType:'json',
            data:{ index : id,_csrf : csrfToken, csvFilePath : "<?= $csvFilePath ?>", isLast : islast},
            success: function(json) {
                id++;
                if(json.success){
                    countOfSuccess+=json.success_count;
                    var span = document.createElement('li');
                    span.innerHTML = '<img class="v-middle" src="<?php echo $succes_img ?>"><span class="text">'+json.success_count+' Product(s) Synced of page '+id+'...</span>';
                    span.id = 'id-'+id;
                    span.style = 'background-color:#DDF';
                    update_row.parentNode.insertBefore(span, update_row);
                }
                if(json.error){
                    //var error_msg = json.error_count+' Product(s) are not found in our app with below mentioned SKU :';
                    var error_msg = json.error_count+' Product(s) can not be synced';

                    var span = document.createElement('li');
                    span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">'+error_msg+'</span>';
                    span.style = 'background-color:#FDD';
                    update_row.parentNode.insertBefore(span, update_row);

                    /*var span = document.createElement('li');
                    span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">'+json.error+'</span>';
                    span.style = 'background-color:#FDD';
                    update_row.parentNode.insertBefore(span, update_row);*/

                    $.each(json.error_object, function(sku, msg) {
                        var span = document.createElement('li');
                        span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">'+sku+' : '+msg+'</span>';
                        span.style = 'background-color:#FDD';
                        update_row.parentNode.insertBefore(span, update_row); 
                    });
                }

                if(id < pages) 
                {
                    if((id+1)==pages)
                        SyncData(1);
                    else
                        SyncData(0);
                }
                else 
                {
                    status_image.src = '<?php echo $succes_img ?>';
                    var span = document.createElement('li');

                    span.innerHTML = '<img class="v-middle" src="<?php echo $succes_img ?>"><span id="update_status" class="text">'+countOfSuccess+' Product(s) Successfully Synced.'+'</span>';

                    span.style = 'background-color:#DDF';
                    my_id.parentNode.insertBefore(span, my_id);
                    document.getElementById("liFinished").style.display="block";
                    j$(".warning-div").hide();
                    j$("#profileRows").css({'margin-top':'10px'});
                    update_status.innerHTML = percent+'% Page '+(id)+' Of '+pages+' Processed.';

                }
            },
            error: function(){
                id++;
                var span = document.createElement('li');
                span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">Something Went Wrong </span>';
                span.id = 'id-'+id;
                span.style = 'background-color:#FDD';
                update_row.parentNode.insertBefore(span, update_row);

                if(id < pages) 
                {
                    if((id+1)==pages)
                        SyncData(1);
                    else
                        SyncData(0);
                }
                else
                {
                    status_image.src = '<?php echo $succes_img ?>';
                    var span = document.createElement('li');
                    span.innerHTML = '<img class="v-middle" src="<?php echo $succes_img ?>"><span id="update_status" class="text">'+countOfSuccess+' Product(s) Successfully Synced.'+'</span>';
                    span.style = 'background-color:#DDF';
                    my_id.parentNode.insertBefore(span, my_id);
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