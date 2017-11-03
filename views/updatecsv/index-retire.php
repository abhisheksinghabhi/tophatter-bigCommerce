<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 11/4/17
 * Time: 5:06 PM
 */
use yii\helpers\Html;
$this->title = 'Retire Product On Walmart';
$this->params['breadcrumbs'][] = $this->title;

$importUrl=\yii\helpers\Url::toRoute(['updatecsv/readretirecsv']);
?>
<div class="product_csv content-section">

    <div class="form new-section">
        <div class="jet-pages-heading">
            <h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
            <div class="clear"></div>
        </div>
        <div class="csv_import col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="csv_import1">
                <form action="<?php echo \yii\helpers\Url::toRoute(['updatecsv/exportretireproduct']);?>" method="post">
                    <h4>Export Product Infromation</h4>
                    <p>Export csv file to retire the product on walmart.com.</p>
                    <div class="input-wrap">
                        <input type="submit" class="btn btn-primary" value="Export"/>
                    </div>
                </form>
            </div>
        </div>
        <div class="csv_export col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="csv_import1">
                <form action="<?php echo $importUrl;?>" method="post" enctype="multipart/form-data">
                    <h4>Import Updated Product Csv File</h4>
                    <p>After export csv file , Remove all the products that you don't want to retirewant on walmart.</p>
                    <div class="input-wrap clearfix">
                        <input type="file" name="csvfile"/>
                        <input type="submit" class="btn btn-primary" value="Import"/>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<style>

    .csv_import {
        padding-left: 0;
        padding-right: 10px;
    }
    .csv_export {
        padding-left: 10px;
        padding-right: 0;
    }
    .csv_import1 {
        border: 1px solid #d4d4d4;
        border-radius: 3px 3px 0 0;
        margin: 25px 0;
        min-height: 228px;
    }
    .csv_import1 h4 {
        background: #dfdfdf none repeat scroll 0 0;
        font-size: 18px;
        margin: 0 0 15px;
        padding: 13px 10px;
    }
    .csv_import1 p {
        line-height: 25px;
        padding-left: 10px;
        padding-right: 10px;
    }
    .input-wrap {
        padding-left: 10px;
        padding-right: 10px;
    }
    .input-wrap input {
        display: inline-block;
    }
</style>