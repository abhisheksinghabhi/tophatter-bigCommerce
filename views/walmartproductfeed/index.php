<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\walmart\models\WalmartProductFeedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Feed Details';
$this->params['breadcrumbs'][] = $this->title;

$viewurl = \yii\helpers\Url::toRoute(['walmartproductfeed/viewfeed']);

$url = \yii\helpers\Url::toRoute(['walmartproductfeed/feeddetail']);
$link = \yii\helpers\Url::toRoute(['walmartproductfeed/file']);

?>
<?= Html::beginForm(['walmartproductfeed/bulkfeedstatus'], 'post',['id'=>'walmart_feed']);//Html::beginForm(['walmartproduct/bulk'],'post');  ?>
<style>
/*.ced-survey {
    background-color: #3a1169;
    display: inline-block;
    width: 60%;
    color: #fff;
    font-size: 12px;
    padding: 1px 10px;
    margin-left: 15px;
}*/
.pagination-dont-show ul{
  display :none;
}
.pagination-dont-show select.form-control{
  display: inline-block;
}
.pagination-show select.form-control{
  display :none;
}

.list-page {
    width:24%;
    float:right; 
    text-align:right;
}
table.table-bordered tbody td {
    max-width: 317px;
    padding: 22px 15px;
    word-wrap: break-word;
}
/*.ced-survey a{
    float: right;
  color: #fff;
  text-decoration: underline;
}*/
.left-div{
  width: 75%;
  float: left;
  margin-top: 2px;
}
.table.table-striped.table-bordered tr th {
    font-size: 14px;
    /*font-weight: 600;*/
}
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
.table.table-bordered tr td a span.upload-error{
    color: #F16935;
    font-size: 1.5em;
    padding: 5px;
}
.table.table-bordered tr.danger td{
  background-color: #cfd8dc;
}
</style>
<div class="jet-product-index content-section">
<div class="form new-section">
    <div class="jet-pages-heading">
        <div class="title-need-help">
        <h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="product-upload-menu">
       </div>
        <div class="clear"></div>
    </div>
     <?php $html = '<div class="jet_notice" style="background-color: #FCF8E3;">
                      <div class="left-div">
                          <span class="font_bell">
                              <i class="fa fa-list" aria-hidden="true"></i>
                          </span>
                          Manage Feed Details
                      </div>
                      <div class="list-page">
                          Show per page ';?>
  <?php $htmlEnd = 'Items
                        </div>
                      <div style="clear:both"></div>
                    </div>';?>
    
    <?php 
        $errorActionFlag = false;
        $editActionFlag = false;
        $imageActionFlag = false;
        $viewActionFlag = false;
        $shipActionFlag = false;
        $bulkActionSelect = Html::dropDownList('action', null, [''=>'-- select bulk action --','updatefeedstatus'=>'Update Feed Status'], ['id'=>'bulk_action_id','class'=>'form-control','data-step'=>'2','data-intro'=>"Select 'Update Feed Status' Option here.",'data-position'=>'bottom']);
        $bulkActionSubmit = Html::Button('submit', ['class'=>'btn btn-primary', 'onclick'=>'validateBulkAction()', 'data-step'=>'3','data-intro'=>"Press Submit after Selecting Bulk Action.",'data-position'=>'bottom']);?>
        <div class="responsive-table-wrap"> 
        <?php 
        echo GridView::widget([
        'id' => "feed_grid",
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'filterModel' => $searchModel,
        'layout' => $html ."<span class='pagination-dont-show'>{pager}</span>".$htmlEnd."\n{summary}\n<div class='table-responsive'>{items}</div>\n<span class='pagination-show'>{pager}</span>",
        'filterSelector' => "select[name='" . $dataProvider->getPagination()->pageSizeParam . "'],input[name='" . $dataProvider->getPagination()->pageParam . "']",
        'pager' => [
            'class' => \liyunfang\pager\LinkPager::className(),
            'pageSizeList' => [25, 50, 100],
            'pageSizeOptions' => ['class' => 'form-control', 'style' => 'width: auto; margin-top: 0px; margin-left: 5px; margin-right: 5px;'],
            'maxButtonCount' => 5,
        ],
        'summary'=>'<div class="summary clearfix"><div class="col-lg-9 col-md-9 col-sm-6 col-xs-12"><span class="show-items">Showing <b>{begin}-{end}</b> of <b>{totalCount}</b> items.</span></div><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><div class="bulk-action-wrapper">'.$bulkActionSelect.$bulkActionSubmit.'<span title="Need Help" class="help_jet white-bg" style="cursor:pointer;" id="instant-help"></span></div></div></div>',
        'columns' => [
                ['class' => 'yii\grid\CheckboxColumn','checkboxOptions'=> function($data){
                    return ['value'=>$data['feed_id'],'class'=>'bulk_checkbox'];
                },
                    'headerOptions'=>['id'=>'checkbox_header','data-step'=>'1','data-intro'=>"Select Feed to Submit.",'data-position'=>'right']],
//            ['class' => 'yii\grid\SerialColumn'],
            
            'id',
//            'merchant_id',
            'feed_id',
            'product_ids:ntext',
            'created_at',
            'status',
                        [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Action', 'headerOptions' => ['width' => '80'],
                'template' => '{viewfeed}{file}{error}',
                'buttons' => [


                    /*'viewfeed' => function ($viewurl, $data) use(&$viewActionFlag) {
                        $feed_id = $data['feed_id'];
                        if (isset($data['status'])) {
                            if ($data['status'] == "PROCESSED") {

                                $options = ['data-pjax'=>0,'onclick'=>'clickView(this)','title'=>'View feed Information','id'=>$feed_id ];
                                 if(!$viewActionFlag) {
                                  $viewActionFlag = true;
                                  $options['data-step']='4';
                                  $options['data-intro']="View feed Information.";
                                  $options['data-position']='left';
                                }
                                return Html::a(
                                    '<span class="glyphicon glyphicon-eye-open jet-data"> </span>', 
                                    'javascript:void(0)',$options
                                );
                            }
                        }

                    }*/
                    'viewfeed' => function ($viewurl, $data) {
                        $feed_id = $data['feed_id'];
                        if (isset($data['status'])) {
                            if ($data['status'] == "PROCESSED") {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-eye-open jet-data"> </span>',
                                    $viewurl, ['title' => 'View Feed Detail',]
                                );
                            }
                        } elseif ($data['status'] == "ERROR") {
                            return Html::a(
                                '<span class="glyphicon glyphicon-eye-open jet-data"> </span>',
                                $viewurl, ['title' => 'View Feed Detail',]
                            );
                        }

                    },
                    'file' => function ($link, $dataProvider) use(&$viewActionFlag){
                        if(!empty($dataProvider->feed_file)){
                            return Html::a(
                                '<span>file </span>',
                                $link, ['title' => 'Download File',]
                            );
                        }
                    }
                ],

            ],
            'items_received',
            'items_succeeded',
            'items_failed',
            'items_processing',
            'feed_date'
        ],
    ]); ?></div>

</div>
</div>

<script>
    var csrfToken = j$('meta[name=csrf-token]').attr("content");

    function clickView(element) {
        var feed_id = element.parentNode.parentNode.getAttribute('data-key');
        var url = '<?= $viewurl ?>';
        j$.ajax({
            method: "get",
            url: url,
            data: {id: feed_id, _csrf: csrfToken},
            success: function (response) {
                $('#content').append(response);
            }
        });
    }

    function selectPage(node) {
        var value = $(node).val();
        $('#feed_grid').children('select.form-control').val(value);
    }

    function validateBulkAction()
    {
        var action = $('#bulk_action_id').val();
        if(action == '') {
          alert('Please Select Bulk Action');
          //return false;
        } else {
          if($("input:checkbox:checked.bulk_checkbox").length == 0)
          {
            alert('Please Select Products Before Submit.');
            //return false;
          }
          else
          {
            $("#walmart_feed").submit();
            //return true;
          }
        }
    }

    $(function(){   
      var intro = introJs().setOptions({
            showStepNumbers: false,
            exitOnOverlayClick: false,
            /*steps: [
              {
                element: '#product_edit_action',
                intro: 'This is Shopify Product Type.',
                position: 'bottom'
              },
              {
                element: '#product_error_action',
                intro: 'This is Shopify Product Type.',
                position: 'bottom'
              }
            ]*/
          });  
          $('#instant-help').click(function(){
                intro.start();
          });
    });
</script>
