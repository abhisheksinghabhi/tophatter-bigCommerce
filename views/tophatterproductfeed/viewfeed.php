<?php
use yii\helpers\Html;

$this->title = 'View Feed Details';
$this->params['breadcrumbs'][] = $this->title;
//$backurl=\yii\helpers\Url::toRoute(['tophatterproductfeed/index']);

?>
<?= Html::beginForm(['tophatterproductfeed/index'], 'post');
if (isset($feed_data['error'])) {
    ?>
    <div class="tophatter-product-feed-index">
        <div class="jet-pages-heading">
            <h1 class="Jet_Products_style">Feed Information :</h1>
            <button class="btn btn-primary " type="submit" title="Back"><span>Back</span>
            </button>
            <div class="clear"></div>
        </div>
        <div class="ced-entry-heading-wrapper">
            <div class="fieldset tophatter-configuration-index">
                <div class="ced-form-grid-tophatter">
                    <ul>
                        <?php foreach ($feed_data['error'] as $key => $value) { ?>
                            <div class="ced-form-item odd">
                                <li class="ced-lg-hlaf ced-xs-full">
                                    <label><span>Error :</span></label>
                                </li>
                                <li class="ced-lg-hlaf ced-xs-full">
                                    <?= $value['info'] ?>
                                </li>
                                <div class="clear"></div>
                            </div>
                            <div class="ced-form-item even">
                                <li class="ced-lg-hlaf ced-xs-full">
                                    <label><span>Feed Created Date</span></label>
                                </li>
                                <li class="ced-lg-hlaf ced-xs-full">
                                    <?= $feed_created_date ?>
                                </li>
                                <div class="clear"></div>
                            </div>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <?php
} elseif (isset($feed_data['feedId'])) {
    ?>

    <div class="tophatter-product-feed-index">
        <div class="jet-pages-heading">
            <h1 class="Jet_Products_style">Feed Information :</h1>
            <button class="btn btn-primary " type="submit" title="Back"><span>Back</span>
            </button>
            <div class="clear"></div>
        </div>
        <div class="ced-entry-heading-wrapper">
            <div class="fieldset tophatter-configuration-index">
                <div class="ced-form-grid-tophatter">
                    <ul>
                        <div class="ced-form-item odd">
                            <li class="ced-lg-hlaf ced-xs-full">
                                <label><span>Feed Id :</span></label>
                            </li>
                            <li class="ced-lg-hlaf ced-xs-full">
                                <?= $feed_data['feedId'] ?>
                            </li>
                            <div class="clear"></div>
                        </div>
                        <div class="ced-form-item even">
                            <li class="ced-lg-hlaf ced-xs-full">
                                <label><span>Feed Created Date</span></label>
                            </li>
                            <li class="ced-lg-hlaf ced-xs-full">
                                <?= $feed_created_date ?>
                            </li>
                            <div class="clear"></div>
                        </div>
                        <div class="ced-form-item odd">
                            <li class="ced-lg-hlaf ced-xs-full">
                                <label><span>Feed Status :</span></label>
                            </li>
                            <li class="ced-lg-hlaf ced-xs-full">
                                <?= $feed_data['feedStatus'] ?>
                            </li>
                            <div class="clear"></div>
                        </div>
                        <div class="ced-form-item even">
                            <li class="ced-lg-hlaf ced-xs-full">
                                <label><span>Item Received</span></label>
                            </li>
                            <li class="ced-lg-hlaf ced-xs-full">
                                <?= $feed_data['itemsReceived'] ?>
                            </li>
                            <div class="clear"></div>
                        </div>
                        <div class="ced-form-item odd">
                            <li class="ced-lg-hlaf ced-xs-full">
                                <label><span>Item Succeeded:</span></label>
                            </li>
                            <li class="ced-lg-hlaf ced-xs-full">
                                <?= $feed_data['itemsSucceeded'] ?>
                            </li>
                            <div class="clear"></div>
                        </div>
                        <div class="ced-form-item even">
                            <li class="ced-lg-hlaf ced-xs-full">
                                <label><span>Item Failed</span></label>
                            </li>
                            <li class="ced-lg-hlaf ced-xs-full">
                                <?= $feed_data['itemsFailed'] ?>
                            </li>
                            <div class="clear"></div>
                        </div>
                        <div class="ced-form-item odd">
                            <li class="ced-lg-hlaf ced-xs-full">
                                <label><span>Item Processing:</span></label>
                            </li>
                            <li class="ced-lg-hlaf ced-xs-full">
                                <?= $feed_data['itemsProcessing'] ?>
                            </li>
                            <div class="clear"></div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ced-entry-heading-wrapper">
            <div class="entry-edit-head">
                <h4 class="fieldset-legend">Feed Items Details:</h4>
            </div>
            <div class="Attrubute_html" id="jet_Attrubute_html">
                <table class="table feed_table table-striped table-bordered" border="2">
                    <thead>
                    <tr>
                        <th>
                            <center>SKU</center>
                        </th>
                        <th>
                            <center>Status</center>
                        </th>
                        <th>
                            <center>Description</center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($feed_data['itemDetails']['itemIngestionStatus']))
                    {
                        foreach ($feed_data['itemDetails']['itemIngestionStatus'] as $data)
                        {?>
                            <?php if(!empty($data['ingestionErrors']['ingestionError'])){?>
                            <tr class="feed_error">
                                <?php }else{ ?>
                            <tr class="feed_success">
                                <?php } ?>
                                <td><?= $data['sku']?></td>
                                <td><?= $data['ingestionStatus']?></td>
                                <?php if(!empty($data['ingestionErrors']['ingestionError'])){ ?>
                                        <td>
                                            <ol>
                                                <?php foreach ($data['ingestionErrors']['ingestionError'] as $key => $val){?>

                                                    <li id="feed_error_des"><?= $val['description']; ?></li>
                                                <?php } ?>
                                            </ol>
                                        </td>
                                <?php }else{ ?>
                                    <td><?= '-' ?></td>
                                <?php }?>
                            </tr>
                        <?php }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php } ?>

<style>
    td{
        text-align: center;
    }

    .feed_error  {
        background-color: #ffb2b2 !important;
    }
    .feed_success  {
        background-color: #b2FBb2 !important;
    }
    .feed_table{
        margin-bottom: 0px;
    }
    #feed_error_des{
        color:#333;
        text-align: left;
    }
</style>