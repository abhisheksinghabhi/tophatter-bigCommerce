<?php
namespace frontend\modules\walmart\controllers;

use Yii;
use yii\web\Controller;
use frontend\modules\walmart\models\WalmartRegistration;

class WalmartRegisterController extends Controller
{
	public function beforeAction($action)
    {
    	$this->enableCsrfValidation = false;
    	return parent::beforeAction($action);
	}

	public function actionSave()
	{

		$model = new WalmartRegistration();
		$post = Yii::$app->request->post();
		//print_r($post);die("fdf");
	    if ($post) 
	    {
		    $merchant_id = Yii::$app->user->identity->id;
		    $post['WalmartRegistration']['shipping_source'] = json_encode($post['WalmartRegistration']['shipping_source']);
		    $post['WalmartRegistration']['merchant_id'] = $merchant_id;
		    //var_dump($model->validate());die;
		    try
		    {
			    $isExist = WalmartRegistration::find()->where(['merchant_id'=>$merchant_id])->one();
		    	if(is_null($isExist))
		    	{
				    if ($model->load($post) && $model->validate()) {
				    	$model->save(false);
				        return json_encode(['success'=>true,'message'=>"Congratulations! Registration has been completed."]);
				    } else {
				    	return json_encode(['error'=>true,'message'=>self::getErrorString($model)]);
				    }
				}
				else
				{
					return json_encode(['success'=>true,'message'=>"Already Registered."]);
				}
			}
			catch(\Exception $e)
			{
				return json_encode(['error'=>true,'message'=>'There has been an Error.','exception'=>$e->getMessage()]);
			}
			catch(\yii\db\Exception $e)
			{
				return json_encode(['error'=>true,'message'=>'There has been an Error.','dbexception'=>$e->getMessage()]);
			}
	    }
	    else
	    {  
		    return json_encode(['error'=>true,'message'=>"Register Unsuccessful."]);
	    }
	}
	
	/**
	 * Get Model Validation Error Message String from model object
     *
	 * @param $model
	 * @return string
	 */
	private function getErrorString($model)
	{
		$errors = [];
		if(is_array($model->errors))
		{
			foreach ($model->errors as $key => $_error) {
				if(is_array($_error))
					$errors[$key] = implode('AND', $_error);
				else
					$errors[$key] = $_error;
			}

			return implode(',', $errors);
		}
		else
		{
			return $model->errors;
		}
	}
}