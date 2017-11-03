<?php 
namespace frontend\modules\walmart\components;
use Yii;
use yii\base\Component;
use Mailgun\Mailgun;

class MailSources extends Component
{

	public function send($data,$html,$source){
		$subject = isset($data['subject'])?$data['subject']:'';
		$reciever = isset($data['reciever'])?$data['reciever']:'';
		$sender = isset($data['sender'])?$data['sender']:'';
		if($this->_debug)
		{
			$error = '';
			$error = $sender == ''?' Sender Missing;':'';
			$error .= $reciever == ''?' Reciever Missing;':'';
			if($error!='')
				$this->log($error);
		}
		
		if($source=='mailgun'){
			$emails = isset($data['bcc'])?explode(',',$data['bcc']):[];
			$bccEmails = '';
			foreach($emails as $key => $bccEmail){
				$emails[$key] = $bccEmail."<{$bccEmail}>";
			}
			$bccEmails = implode(',',$emails); 
			return $this->mailgunMailer($sender,$reciever,$bccEmails,$subject, $html);
		}
		else
		if($source=='php')
		{
			$headers = "MIME-Version: 1.0" . chr(10);
			$headers .= "Content-type:text/html;charset=iso-8859-1" . chr(10);
			$headers .= 'From: '.$sender . chr(10);
			$bccEmails = isset($data['bcc'])?explode(',',$data['bcc']):[];
			foreach($bccEmails as $bccEmail){
				$headers .= 'Bcc: '.$bccEmail. chr(10);
			}
			return $this->phpMailer($reciever,$subject, $html, $headers);
		}
	}
	public function phpMailer($reciever,$subject, $html, $headers){
		
		if(mail($reciever,$subject, $html, $headers)){
			return true;
		}
		else
		{
			return false;
		}
	}
	public function mailgunMailer($sender,$reciever,$bccEmails,$subject, $html){
		try{
			$mgClient = new Mailgun('key-081d780ed03cf89ca6c10a908b37d7b1');
			$domain = "sandboxaa397a12e02f48fca42f0defd603324d.mailgun.org";
			$reciever = 'satyaprakash@cedcoss.com';
			$mailData = array(
			    'from'    => $sender.' <'.$sender.'>',
			    'to'      => $reciever.' <'.$reciever.'>',
			    'subject' => $subject,
			    'html'    => $html
			);
			if($bccEmails!=''){
				$mailData['bcc'] = $bccEmails;
			}
			# Make the call to the client.
			$result = $mgClient->sendMessage($domain,$mailData );
			
			if($result->http_response_body && $result->http_response_code==200)
			{
				return true;
			}
			else
			{
				$this->log(print_r($result,true));
				return false;
			}
		}
		catch(Exception $e)
		{
			$this->log($e->getMessage());
		}
		
	}
}