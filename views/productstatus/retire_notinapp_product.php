<?php
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;

$this->title = 'Syncing Product Status';

$success_img = Yii::$app->request->baseUrl.'/frontend/modules/walmart/assets/images/batchupload/fam_bullet_success.gif';
$error_img = Yii::$app->request->baseUrl.'/frontend/modules/walmart/assets/images/batchupload/error_msg_icon.gif';
$loader_img = Yii::$app->request->baseUrl.'/frontend/modules/walmart/assets/images/batchupload/rule-ajax-loader.gif';

$url = Data::getUrl('productstatus/retirepost');
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
                    <h1 class="Jet_Products_style">Retiring Not-in-app product(s)</h1>
                </div>
                <div class="product-upload-menu">
                    <a href="<?= Yii::$app->request->referrer ?>">
                        <button class="btn btn-primary uptransform" type="button" title="Back"><span>Back</span></button>
                    </a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="block-content panel-body shopify-api ">
                <ul class="warning-div" style="margin-top: 18px">
                    <li style="background-color:#Fff;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/note_msg_icon.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Starting product retire process, please wait...
                    </li>
                    <li style="background-color:#FFD;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/fam_bullet_error.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Warning: Please do not close the window during processing
                    </li>
                </ul>

                <ul id="profileRows">
                    <li style="background-color:#DDF; ">
                        <img class="v-middle" src="<?php echo $success_img ?>">
                        <?php echo 'Total '.$total_products.' products(s) selected.'; ?>
                    </li>
                    <li class="" id="success_count" style="background-color: rgb(221, 221, 255); display: none;"></li>
                    <li class="" id="error_count" style="background-color: rgb(255, 221, 221); display: none;"></li>
                    <li style="background-color:#DDF;" id="update_row">
                        <img class="v-middle" id="status_image" src="<?php echo $loader_img ?>">
                        <span id="update_status" class="text">Updating...</span>
                    </li>
                    <li id="liFinished" style="display:none;background-color:#Fff;">
                        <img src="<?php echo yii::$app->request->baseUrl.'/frontend/images/batchupload/note_msg_icon.gif';?>" class="v-middle" style="margin-right:5px"/>
                        Finished retire process.
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
    var id = 0;

    var countOfSuccess = 0;
    var uptodateCount = 0;
    var errorCount = 0;

    var my_id = document.getElementById('liFinished');
    var update_status = document.getElementById('update_status');
    var update_row = document.getElementById('update_row');
    var status_image = document.getElementById('status_image');
    var success_count_element = document.getElementById('success_count');
    var error_count_element = document.getElementById('error_count');

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
            data:{ index : id,_csrf : csrfToken,},
            success: function(json) {
                id++;
                
                alert(id);
                if(json.success) {
                    countOfSuccess += json.success_count;
                    var innerHTML = '<img class="v-middle" src="<?php echo $success_img ?>"><span class="text">'+countOfSuccess+' products submitted for retire.</span>';
                    success_count_element.innerHTML = innerHTML;

                    var className = 'id-'+id;
                    success_count_element.className = className;
                    success_count_element.style.display = "block";
                }

                if(json.error) {

                    if(json.error_msg) 
                    {
                        var span = document.createElement('li');
                        span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">'+json.error_msg+'</span>';
                        span.style = 'background-color:#FDD';
                        update_row.parentNode.insertBefore(span, my_id);
                    }
                    else if(json.error_count) 
                    {

                        errorCount += json.error_count;
                        var error_msg = errorCount+" product(s) can't be retired.";
                        var innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">'+error_msg+'</span>';
                        error_count_element.innerHTML = innerHTML;
                        var className = 'error-id-'+id;
                        error_count_element.className = className;
                        error_count_element.style.display = "block";

                        
                        $.each(json.errored_sku, function(key, msg) {
                            var span = document.createElement('li');
                            span.innerHTML = '<img class="v-middle" src="<?php echo $error_img ?>"><span class="text">'+msg+'</span>';
                            span.style = 'background-color:#FDD';
                            update_row.parentNode.insertBefore(span, my_id); 
                        });
                    }
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
                    status_image.src = '<?php echo $success_img ?>';
                    var span = document.createElement('li');

                    span.innerHTML = '<img class="v-middle" src="<?php echo $success_img ?>"><span id="update_status" class="text">Status of '+countOfSuccess+' product(s) successfully updated.'+'</span>';

                    span.style = 'background-color:#DDF';
                    my_id.parentNode.insertBefore(span, my_id);
                    document.getElementById("liFinished").style.display="block";
                    j$(".warning-div").hide();
                    j$("#profileRows").css({'margin-top':'10px'});
                    update_status.innerHTML = percent+'% Page '+(id)+' Of '+pages+' Processed.';

                }
            },
/*            error: function(){
               
                var span = document.createElement('li');
                span.innerHTML = '<img class="v-middle" src="<?php // echo $error_img ?>"><span class="text">Something Went Wrong </span>';
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
                    status_image.src = '<?php // echo $success_img ?>';
                    var span = document.createElement('li');
                    span.innerHTML = '<img class="v-middle" src="<?php // echo $success_img ?>"><span id="update_status" class="text">'+countOfSuccess+' Product(s) Successfully Synced.'+'</span>';
                    span.style = 'background-color:#DDF';
                    my_id.parentNode.insertBefore(span, my_id);
                    j$(".warning-div").hide();
                    j$("#profileRows").css({'margin-top':'10px'});
                    document.getElementById("liFinished").style.display="block";
                }
            }
            
*/        });


    }

    function getPercent() {

        return Math.ceil(((id+1)/pages)*1000)/10;
    }

</script>