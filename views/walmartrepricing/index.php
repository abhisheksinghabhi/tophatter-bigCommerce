<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\modules\walmart\components\Data;

$this->title = 'Select Products For Repricing';
$this->params['breadcrumbs'][] = $this->title;

$merchant_id = MERCHANT_ID;
?>
<style>
    .list-page {
        width: 24%;
        float: right;
        text-align: right;
    }

    .left-div {
        width: 75%;
        float: left;
        margin-top: 2px;
    }

    .table.table-striped.table-bordered tr th {
        font-size: 14px;
    }

    .jet-product-index .jet_notice {
        font-weight: normal !important;
    }

    .jet-product-index .jet_notice .fa-bell {
        color: #B11600;
    }

    .jet-product-index .no-data {
        display: none;
    }

    .jet-product-index .no_product_error {
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
    }

    .jet_config_popup .product-import, .jet_config_popup .welcome_message {
        background: #fff none repeat scroll 0 0;
        border-radius: 5px !important;
        margin: 5% auto 3%;
        overflow: hidden;
        position: relative;
        width: 50%;
        margin-top: 11%;
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

    .table.table-bordered tr td a span {
        color: #1A75CF;
    }

    .table.table-bordered tr td a span.upload-error {
        color: #F16935;
        font-size: 1.5em;
        padding: 5px;
    }

    .table.table-bordered tr.danger td {
        background-color: #cfd8dc;
    }
    
    .Others{
        color: #1A75CF;
    }
    .Not.Uploaded{
        color: red;
    }
    .Item.Processing{
        color: #d08c00;
    }
    .PUBLISHED{
        color: green;
    }
    .STAGE{
        color: green;
    }
    .UNPUBLISHED{
        color: red;
    }
</style>

<div class="jet-product-index content-section ced-manageproduct">
    <div class="form new-section">
        <?= Html::beginForm(['walmartrepricing/view'], 'post', ['id' => 'jet_bulk_product']);?>
        <div class="jet-pages-heading walmart-title">
            <div class="title-need-help">
                <h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="product-upload-menu">
                <?= Html::Button('Go For Repricing', ['class' => 'btn btn-primary', 'onclick' => 'validateBulkAction()', 'title' => 'Perform Repricing for the Selected Products.']); ?>
                <?= Html::Button('Sync With Walmart', ['class' => 'btn btn-primary', 'onclick' => 'syncBuybox()', 'title' => 'Perform Repricing for the Selected Products.']); ?>
            </div>
            <div class="clear"></div>
        </div>

        <div class="jet_notice" style="background-color: #FCF8E3;">
            <span class="font_bell">
                <i class="fa fa-list" aria-hidden="true"></i>
                <!-- <i class="fa fa-bell fa-1x"></i> -->
            </span>Don't see all of your products? Just click <a href="<?= yii\helpers\Url::toRoute('categorymap/index'); ?>">here</a> to map all shopify product type(s) with walmart category.
            <div class="list-page" style="float:right">
                Show per page
                <select onchange="selectPage(this)" class="form-control" style="display: inline-block; width: auto; margin-top: 0px; margin-left: 5px; margin-right: 5px;" name="per-page">
                    <option value="25" <?php if (isset($_GET['per-page']) && $_GET['per-page'] == 25)
                                                echo "selected=selected";?>>25</option>
                    <option value="50" <?php if (!isset($_GET['per-page']))
                                                echo "selected=selected";?>>50</option>
                    <option value="100" <?php if (isset($_GET['per-page']) && $_GET['per-page'] == 100)
                                                echo "selected=selected";?>>100</option>
                </select>
                Items
            </div>
            <div style="clear:both"></div>
        </div>
        <?php $viewActionFlag = false;  ?>
        <?php Pjax::begin(['timeout' => 30000, 'clientOptions' => ['container' => 'pjax-container']]); ?>
        <?= GridView::widget([
            'id' => "product_grid",
            'options' => ['class' => 'table-responsive'],
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'filterSelector' => "select[name='" . $dataProvider->getPagination()->pageSizeParam . "'],input[name='" . $dataProvider->getPagination()->pageParam . "']",
            'pager' => [
                'class' => \liyunfang\pager\LinkPager::className(),
                'pageSizeList' => [25, 50, 100],
                'pageSizeOptions' => ['class' => 'form-control', 'style' => 'display: none;width:auto;margin-top:0px;'],
                'maxButtonCount' => 5,
            ],
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn',
                    'checkboxOptions' => function ($data) {
                        return ['value' => $data['product_id'], 'class' => 'bulk_checkbox'];
                    },
                    'headerOptions' => ['id' => 'checkbox_header', 'data-step' => '1', 'data-intro' => "Select Products to Upload.", 'data-position' => 'right']
                ],
                'product_id',
                [
                    'attribute' => 'image',
                    'format' => 'html',
                    'label' => 'IMAGE',
                    'value' => function ($data) {
                        if ($data['jet_product']['image']) {
                            if (count(explode(',', $data['jet_product']['image'])) > 0) {
                                $images = [];
                                $images = explode(',', $data['jet_product']['image']);
                                return Html::img($images[0],
                                    ['width' => '80px', 'height' => '80px']);
                            } else {
                                return Html::img($data['jet_product']['image'],
                                    ['width' => '80px', 'height' => '80px']);
                            }
                        } else {
                            return "";
                        }
                    },
                ],
                [
                    'attribute' => 'title',
                    'label' => 'Title',
                    'value' => 'jet_product.title',
                ],
                [
                    'attribute' => 'sku',
                    'label' => 'Sku',
                    'value' => 'jet_product.sku',
                ],
                [
                    'attribute' => 'qty',
                    'label' => 'Quantity',
                    'value' => 'jet_product.qty',
                ],
                [
                    'attribute' => 'product_type',
                    'label' => 'Product Type',
                    'value' => 'jet_product.product_type'
                ],
                [
                    'attribute' => 'upc',
                    'label' => 'Barcode',
                    'value' => 'jet_product.upc',
                ],
                [
                    'attribute' => 'type',
                    'label' => 'Type',
                    'headerOptions' => ['width' => '80'],
                    'filter' => ["simple" => "simple", "variants" => "variants"],
                    'value' => function ($data) {
                        return $data['jet_product']['type'];
                    }

                ],
                [
                    'attribute' => 'price',
                    'label' => 'Price',
                    'format' => 'html',
                    'value' => function ($data) {
                        $html = '';
                        return '<span style="display:block;">'.$data['jet_product']['price'].'</span>'.'&nbsp;&nbsp;'.$html;
                    }
                ],

                [
                    'attribute' => 'min_price',
                    'label' => 'Min Price',
                    'value' => function ($data) {
                        if(count($data['walmart_product_repricing']))
                        {
                            if(count($data['walmart_product_repricing']) == 1)
                            {
                                return $data['walmart_product_repricing'][0]['min_price'];
                            }
                            else
                            {
                                $enabled = 0; $disabled = 0;
                                foreach ($data['walmart_product_repricing'] as $value) {
                                    if($value['option_id'] == $data['jet_product']['variant_id'])
                                        return $value['min_price'];
                                }
                                return 'N/A';
                            }
                        }
                        else
                        {
                            return 'N/A';
                        }
                    }
                ],
                [
                    'attribute' => 'max_price',
                    'label' => 'Max Price',
                    'value' => function ($data) {
                        if(count($data['walmart_product_repricing']))
                        {
                            if(count($data['walmart_product_repricing']) == 1)
                            {
                                return $data['walmart_product_repricing'][0]['max_price'];
                            }
                            else
                            {
                                $enabled = 0; $disabled = 0;
                                foreach ($data['walmart_product_repricing'] as $value) {
                                    if($value['option_id'] == $data['jet_product']['variant_id'])
                                        return $value['max_price'];
                                }
                                return 'N/A';
                            }
                        }
                        else
                        {
                            return 'N/A';
                        }
                    }
                ],
                [
                    'attribute' => 'buybox',
                    'label' => 'BuyBox Status',
                    'headerOptions' => ['width' => '80'],
                    'filter' => ["1" => "BuyBox Win", "0" => "BuyBox Lose"],
                    'format' => 'html',
                    'value' => function ($data) {
                        if(count($data['walmart_product_repricing']))
                        {
                            if(count($data['walmart_product_repricing']) == 1)
                            {
                                if($data['walmart_product_repricing'][0]['buybox'])
                                    return 'WIN';
                                else
                                    return 'LOSE';
                            }
                            else
                            {
                                $win = 0; $lose = 0;
                                foreach ($data['walmart_product_repricing'] as $value) {
                                    if($value['buybox'])
                                        $win++;
                                    else
                                        $lose++;
                                }
                                return 'WIN : '.$win.'<br/>'.'LOSE : '.$lose;
                            }
                        }
                        else
                        {
                            return 'N/A';
                        }
                    }

                ],
                [
                    'attribute' => 'repricing_status',
                    'label' => 'Repricing Status',
                    'headerOptions' => ['width' => '80'],
                    'filter' => ["1" => "ENABLED", "0" => "DISABLED"],
                    'format' => 'html',
                    'value' => function ($data) {
                        if(count($data['walmart_product_repricing']))
                        {
                            if(count($data['walmart_product_repricing']) == 1)
                            {
                                if($data['walmart_product_repricing'][0]['repricing_status'])
                                    return 'ENABLED';
                                else
                                    return 'DISABLED';
                            }
                            else
                            {
                                $enabled = 0; $disabled = 0;
                                foreach ($data['walmart_product_repricing'] as $value) {
                                    if($value['repricing_status'])
                                        $enabled++;
                                    else
                                        $disabled++;
                                }
                                return 'ENABLED : '.$enabled.'<br/>'.'DISABLED : '.$disabled;
                            }
                        }
                        else
                        {
                            return 'N/A';
                        }
                    }

                ],

                [
                    'attribute' => 'status',
                    'label' => 'Status',
                    'headerOptions' => ['width' => '160'],
                    'filter' => ["Item Processing" => "Item Processing", "Not Uploaded" => "Not Uploaded", "PUBLISHED" => "PUBLISHED", "STAGE" => "STAGE", "UNPUBLISHED" => "UNPUBLISHED", "other" => "Other Products"],
                    'format' => 'html',
                    'value' => function ($data) {
                        if($data['option_status'] != null){
                            $status = explode(',',$data['option_status']);
                            $value =array_count_values($status);

                            if(!empty($value)){
                                $status = ['Item Processing','Not Uploaded','PUBLISHED','STAGE','UNPUBLISHED'];
                                $html1='';
                                $html1.='<ul>';
                                            foreach($value as $key=>$val){
                                                if(empty($key) || !in_array($key,$status)){
                                                    $key='Others';
                                                }

                                            $html1.='<li class="'.$key.'">'.$key.' : '.$val.'</li>';}
                                            $html1.='</ul>';
                                return $html1;
                            }
                        }else{
                            $html1='';
                            $html1.='<ul>';

                                $html1.='<li class="'.$data['status'].'">'.$data['status'].'</li>';
                            $html1.='</ul>';
                            return $html1;
                        }
                    }
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<script type="text/javascript">
    function validateBulkAction() {
        var action = $('#jet_product_select').val();
        if (action == '') {
            alert('Please Select Bulk Action');
            //return false;
        } else {
            if ($("input:checkbox:checked.bulk_checkbox").length == 0) {
                alert('Please Select Products Before Submit.');
                //return false;
            }
            else if(action == 'batch-retire') {
                $('body').attr('data-cnfrm','show');
                $('#edit-modal-close').click();
                
                if($('body').attr('data-cnfrm') == 'show') {
                    $('#confirm').modal('show');
                    $('body').removeAttr('data-cnfrm');
                }

                $("#confirm").on('shown.bs.modal', function () {
                    $('#cnfrm-yes').unbind('click');
                    $('#cnfrm-yes').on('click',function() {
                        $('#cnfrm-no').click();
                        $("#jet_bulk_product").submit();
                    });
                });
            }
            else {
                $("#jet_bulk_product").submit();
                //return true;
            }
        }
    }

    function syncBuybox()
    {
        window.location.replace("<?= Data::getUrl('walmartrepricing/syncbuybox') ?>");
    }

	$(".pop_up").click(function () {
            $(".popup-box").toggle("slow");
        }); 

    var submit_form = false;
    $('body').on('keyup', '.filters > td > input', function (event) {
        if (event.keyCode == 13) {
            if (submit_form === false) {
                submit_form = true;
                $("#product_grid").yiiGridView("applyFilter");
            }
        }

    });
    $("body").on('beforeFilter', "#product_grid", function (event) {
        return submit_form;
    });
    $("body").on('afterFilter', "#product_grid", function (event) {
        submit_form = false;
    });

    function selectPage(node) {
        var value = $(node).val();
        $('#product_grid').children('select.form-control').val(value);
    }
</script>
