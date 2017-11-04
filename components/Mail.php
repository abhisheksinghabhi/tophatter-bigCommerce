<?php 
namespace frontend\modules\tophatter\components;
use Yii;
use yii\base\Component;
use frontend\modules\tophatter\components\Data;

class Mail extends MailSources
{
	private $_data = null;
	private $_template = null;
	public $_debug = false;
	private $_html = null;
	private $_handle;
	private $_source;
	public function __construct($data,$template,$source = 'php',$debug = false){
		$this->_data = $data;
		$this->_template = $template;
		$this->_debug = $debug;
		$this->_source = $source;
		$this->insertTemplate($this->_template);
		if($this->_debug){
			$this->_handle = fopen(Yii::getAlias('@webroot').'/var/mail.log','a');
			$this->log(print_r($data,true));
		}
	}

	/* function for processing email template */
	private function processedTemplate(){
		$file = $this->getFile();
		if($file){
			$html = file_get_contents($file);
			$html1 = preg_replace_callback(
		        '/{{ var (.*?) }}/',
		        function ($matches) {
		            return $this->_replaceVariable($matches);
		        },
		        $html
		    );
		    return $html1;
		}
		
		
	}

	/* function for getting template file path */
	public function getFile(){
		$serach = [];
		$file = Yii::getAlias('@webroot').'/views/templates/'.$this->_template;
		$serach[]=$file;
		if(file_exists($file)){
			return $file;
		}
		$file = Yii::getAlias('@webroot').'/frontend/views/templates/'.$this->_template;
		$serach[]=$file;
		if(file_exists($file)){
			return $file;
		}
		$file = dirname(Yii::getAlias('@webroot')).'/frontend/views/templates/'.$this->_template;
		$serach[]=$file;
		if(file_exists($file)){
			return $file;
		}
		$file = dirname(Yii::getAlias('@webroot')).'/frontend/modules/tophatter/views/templates/'.$this->_template;
		$serach[]=$file;
		if(file_exists($file)){
			return $file;
		}

		$file = Yii::getAlias('@webroot').'/frontend/modules/tophatter/views/templates/'.$this->_template;
		$serach[]=$file;
		if(file_exists($file)){
			return $file;
		}
		else
		{

			$this->log('Template Not Found : '.print_r($serach,true));
			return false;
		}

	}

	/* function for replacing template variable with correct value */
	private function _replaceVariable($matches){
		$value = '';
		if(isset($matches[1])){
			$matches[1] = trim($matches[1]);
			if(strpos($matches[1], '.')!==false){
				$value = $this->getNestedValue(explode('.',$matches[1]),$this->_data);
			}
			else
			{
				$value = isset($this->_data[$matches[1]]) ? $this->_data[$matches[1]] : '';
			}
		}

		if(is_string($value)){
			return $value;
		}elseif(is_array($value)){
			return json_encode($value);
		}
		else
		{
			return $value;
		}

	}

	/*function for getting nested value for template variable */
	public function getNestedValue($arr,$data){
		$value = '';
		foreach($arr as $key){
			if(isset($data[$key])){
				$data = $data[$key];
				$value = $data;
			}
			else
			{
				$value = '';
				break;
			}
		}
		return $value;
	}

	/* function for sending email  */
	public function sendMail(){
		try{
			if(isset($this->_data['merchant_id']) && !empty($this->_data['merchant_id'])){
				$template = str_replace('.html', '', $this->_template);
				 $query = "SELECT `value` FROM  `tophatter_config` WHERE `merchant_id`='".$this->_data['merchant_id']."' AND `data`='".$template."'";
                $emailTemplatevalue = Data::sqlRecords($query,"one");
              
                
                if($emailTemplatevalue['value'] ==1){
					$html = $this->processedTemplate();
					if($this->send($this->_data,$html,$this->_source)){
						
					}
					else
					{
						$this->log('Unable to send mail.');
					}
				}
			}
			else{
				$html = $this->processedTemplate();

				if($this->send($this->_data,$html,$this->_source)){
					
				}
				else
				{
					$this->log('Unable to send mail.');
				}
			}
		}
		catch(Exception $e){
			$this->log($e->getMessage());
		}
	}



	public function log($message){
		fwrite($this->_handle,date(DATE_RFC822).' : '.$message.PHP_EOL);
	}


	public function insertTemplate($template){
		$query="SELECT `template_path` FROM `email_template` WHERE template_path='".$template."'";
	    $allData = Data::sqlRecords($query, 'one');
	    if(empty($allData)){
	    	$mainTitle =str_replace('.html', '',$title);
	    	$title =str_replace('email/', '',$mainTitle);
	    	
	    	$model = Data::sqlRecords("INSERT INTO `email_template` (`template_title`,`template_path`,`custom_title`) VALUES ('".$title."','".$template."','".$title."')", 'all','insert');
	    	$model = Data::sqlRecords("INSERT INTO `walamrt_config` (`data`,`value`,`merchant_id`) VALUES ('".$mainTitle."','1',,'".$this->_data['merchant_id']."')", 'all','insert');
			
		}
    }
	
}