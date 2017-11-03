<?php
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;

$this->title = 'Validate Feed XML';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="latest-updates-create">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="latest-updates-form">
	    <form method="post">
			<input type="hidden" value="LkFHNWdOX2lcLxZ4CgpyPhgwLH4seB4vdigfXFB9JQxXGTYHKgEGJg==" name="_frontendCSRF">
	    	<textarea id="xml_data" style="width: 100%" rows="10" cols="150" placeholder="Enter Xml Data Here"></textarea>
		    <div class="form-group">
		        <button class="btn" type="button" onclick="validateFeedXml()">Validate</button>
			</div>
	    </form>
	</div>
	<div id="validation_response" style="width: 100%; height: 200px; border: 1px solid gray; margin-top: 20px; overflow: scroll;">
		response
	</div>
</div>
<style type="text/css">
	.validation_error { 
		background-color: #f2dede;
	    border-color: #ebccd1;
	    border-radius: 4px;
	    color: #a94442;
	    margin-bottom: 20px;
	    padding: 15px;
	}
	.validation_success {
	    background-color: #dff0d8;
	    border-color: #d6e9c6;
	    color: #3c763d;
	    margin-bottom: 20px;
	    padding: 15px;
	}
</style>
<script type="text/javascript">
	function validateFeedXml()
	{
		var xml = $("#xml_data").val();
		xml = xml.trim();
		if(xml == '') {
			alert('Please Enter XML data');
		} else {
			if(isXml(xml)) {
				$.ajax({
	                url : "<?= Data::getUrl('feed-validator/validate') ?>",
	                type: "POST",
	                dataType: 'json',
	                data : { xmldata : xml }
	            }).done(function(response) {
	                if(response.success)
	                {
	                	$("#validation_response").removeClass();
	                	$("#validation_response").addClass('validation_success');
	                	$("#validation_response").text(response.message);
	                }
	                else if(response.error)
	                {
	                	$("#validation_response").removeClass();
	                	$("#validation_response").addClass('validation_error');
	                	$("#validation_response").text(response.message);
	                }
	            });
        	} else {
        		alert('Please Enter Valid XML');
        	}
		}
	}

	function isXml(xmlString)
	{
		var parser = new DOMParser();
		var dom = parser.parseFromString(xmlString, "text/xml");
		if(dom.documentElement.nodeName == "parsererror") {
			return false;
		} else {
			return true;
		}
	}
</script>
