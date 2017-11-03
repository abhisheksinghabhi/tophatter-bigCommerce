<?php
namespace frontend\modules\walmart\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\WalmartRepricing;
use frontend\modules\walmart\models\WalmartProduct;

class WalmartRepriceController extends WalmartmainController
{
    public function actionEdit()
    {
        $error = false;
        $product_id = Yii::$app->request->get('id',false);
        if($product_id)
        {
            $reprice = new WalmartRepricing();

            $productData = $reprice->getProductData($product_id);
            if(is_array($productData))
            {
                if(isset($productData['status']) && $productData['status'] == WalmartProduct::PRODUCT_STATUS_UPLOADED)
                {
                    /*if(isset($productData['upc']) && $productData['upc'] != '') {
                        $upc = $productData['upc'];
                        $apiData = $reprice->getBestMarketplacePrice($upc,true);
                        if(isset($apiData['errors'])) {
                            $error = true;
                        } else {
                            return $this->render('edit', [
                                        'productData' => $productData,
                                        'apiData' => $apiData
                                    ]);
                        }
                    } else {
                        $error = true;
                    }*/
                    return $this->render('edit', [
                                        'productData' => $productData
                                    ]);
                } else {
                    $error = true;
                }
            } else {
                $error = true;
            }
        }
        else {
            $error = true;
        }

        if($error) {
            Yii::$app->session->setFlash('error','Can not do Repricing for this Product.');
            return $this->redirect(['walmartproduct/index']);
        }
    }

    public function actionSave()
    {
        if($post = Yii::$app->request->post())
        {
            $merchant_id = MERCHANT_ID;
            if(isset($post['option_id']) && $post['option_id'] == '') {
                if(is_numeric($post['min_price']) && is_numeric($post['max_price']))
                {
                    if($post['id'] != '')
                    {
                        $query = "UPDATE `walmart_product_repricing` SET `upc`='{$post['upc']}',`min_price`='{$post['min_price']}',`max_price`='{$post['max_price']}',`best_price`='{$post['best_price']}',`walmart_itemid`='{$post['walmart_itemid']}' WHERE id={$post['id']}";
                        Data::sqlRecords($query,null,"update");
                    }
                    else
                    {
                        $query = "INSERT INTO `walmart_product_repricing`(`merchant_id`, `product_id`, `option_id`, `upc`, `min_price`, `max_price`, `best_price`, `walmart_itemid`) VALUES ('{$merchant_id}', '{$post['product_id']}','{$post['option_id']}','{$post['upc']}','{$post['min_price']}','{$post['max_price']}','{$post['best_price']}','{$post['walmart_itemid']}')";
                        Data::sqlRecords($query,null,"insert");
                    }
                }
                elseif(trim($post['min_price']) == '' && trim($post['max_price']) == '')
                {
                    if($post['id'] != '')
                    {
                        $query = "DELETE FROM `walmart_product_repricing` WHERE `id`={$post['id']}";
                        Data::sqlRecords($query,null,"update");
                    }
                }
            } else {
                foreach ($post['option_id'] as $key=>$option_id) 
                {
                    if(is_numeric($post['min_price'][$key]) && is_numeric($post['max_price'][$key]))
                    {
                        if($post['id'][$key] != '')
                        {
                            $query = "UPDATE `walmart_product_repricing` SET `upc`='{$post['upc'][$key]}',`min_price`='{$post['min_price'][$key]}',`max_price`='{$post['max_price'][$key]}',`best_price`='{$post['best_price'][$key]}',`walmart_itemid`='{$post['walmart_itemid'][$key]}' WHERE id={$post['id'][$key]}";
                            Data::sqlRecords($query,null,"update");
                        }
                        else
                        {
                            $query = "INSERT INTO `walmart_product_repricing`(`merchant_id`, `product_id`, `option_id`, `upc`, `min_price`, `max_price`, `best_price`, `walmart_itemid`) VALUES ('{$merchant_id}', '{$post['product_id']}','{$option_id}','{$post['upc'][$key]}','{$post['min_price'][$key]}','{$post['max_price'][$key]}','{$post['best_price'][$key]}','{$post['walmart_itemid'][$key]}')";
                            Data::sqlRecords($query,null,"insert");
                        }
                    }
                    elseif(trim($post['min_price']) == '' && trim($post['max_price']) == '')
                    {
                        if($post['id'] != '')
                        {
                            $query = "DELETE FROM `walmart_product_repricing` WHERE `id`={$post['id']}";
                            Data::sqlRecords($query,null,"update");
                        }
                    }
                }
            }
            Yii::$app->session->setFlash('success','Data Saved Successfully.');
            if(isset($post['product_id']))
                return $this->redirect(['walmart-reprice/edit?id='.$post['product_id']]);
            else
                return $this->redirect(['walmart-reprice/edit']);
        }
        else
        {
            Yii::$app->session->setFlash('error','Data Not Saved.');
            return $this->redirect(['walmart-reprice/edit']);
        }
    }
}
