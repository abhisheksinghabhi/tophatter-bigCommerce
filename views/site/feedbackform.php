<?php
$feebBackSaveUrl = \yii\helpers\Url::toRoute(['site/client-feedback']);
?>
<div id="feedbackform">
	<div style="display: none" id="feedbacksuccess" class="alert-success alert fade in"></div>
	<div style="display: none" id="feedbackerror" class="alert alert-danger"></div>
	<div class="feedbackform-wrapper">
		<div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h1>did you faced any issue?</h1>
				<p>feedBackType</p>
				<ul>
					<li><input class="type" type="radio" name="type" value="comment"> Comment</li>
					<li><input class="type" type="radio" name="type" value="bugreport"> Bug Report</li>
					<li><input class="type" type="radio" name="type" value="question"> Question</li>
				</ul>
			</div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h1>
					Write Feedback
				</h1>
				<br>
				<textarea id="description" name="description" rows="3" cols="27" placeholder="write your feedback here">
				</textarea>
				<button id='submit'>Submit</button>
			</div>
		</div>
	</div>

</div>
<style type="text/css">
	#close_image {
		float: right;
		width: 20px !important;
		height: 20px !important;
	}
</style>
<script type="text/javascript">
	$('#submit').on('click', function () {
		var existurl = '<?= $feebBackSaveUrl; ?>';
		var type = $('.type:checked').val();
		if (!type) {
			$('#feedbacksuccess').css('display', 'none');
			$('#feedbackerror').css('display', 'block');
			$('#feedbackerror').html('Please select feedback type');
			return false;
		}
		var description = $.trim($('#description').val());
		if (description.length == 0) {
			$('#feedbacksuccess').css('display', 'none');
			$('#feedbackerror').css('display', 'block');
			$('#feedbackerror').html('feedback description is required');
			return false;
		}
		$.ajax({
			url: existurl,
			method: "post",
			dataType: 'json',
			data: {type: type, description: description},
			success: function (data) {
				if (data.success) {
					$('#feedbackerror').css('display', 'none');
					$('#feedbacksuccess').css('display', 'block');
					$('#feedbacksuccess').html(data.message);
				} else {
					$('#feedbacksuccess').css('display', 'none');
					$('#feedbackerror').css('display', 'block');
					$('#feedbackerror').html(data.message);
				}
			},
			error: function (data) {
				alert(data);
				alert("out");
			},
		})
	});
	
</script>

<style>
	
	/* #feedback {
		background: #1a75cf none repeat scroll 0 0;
		left: 100%;
		opacity: 1;
		position: absolute;
		right: 0;
		top: 21px;
	} 
	#feedback #hide {
		background: #1a75cf none repeat scroll 0 0;
		border-bottom-right-radius: 7px;
		border-top-right-radius: 7px;
		cursor: pointer;
		display: inline-block;
		height: 28px;
		width: 16px;
	}
	.feedbackform-close .feedbackform-close-wrapper .glyphicon.glyphicon-chevron-right {
		color: #ffffff;
		font-size: 10px;
		padding-top: 6px;
	}*/
</style>