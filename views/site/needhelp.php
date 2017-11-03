<!--   Help Section Start     -->
		<div class="container">
			  <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title" style="text-align: center;font-family: "Comic Sans MS";">Submit your Query Here !!!</h4>
			        </div>
			        <div class="modal-body">
						<table class="table table-striped table-bordered" cellspacing="0" width="100%">
							<tbody>
								<tr>
									<td class="value_label" width="33%">
										<span>Enter Full Name</span>
									</td>
									<td class="value form-group required" width="100%">
										<input id="merchant_name" class="form-control" type="text" value="" name="merchant_name" maxlength="255" placeholder="Your name ...">
									</td>
								</tr>
								<tr>
									<td class="value_label" width="33%">
										<span>Your Email ID</span>
									</td>
									<td class="value form-group required" width="100%">
										<input id="from" class="form-control" type="email" value="" name="from" maxlength="255" placeholder="Your valid Email ID">
									</td>
								</tr>
								<tr>
									<td class="value_label" width="33%">
										<span>Shopify Store Name</span>
									</td>
									<td class="required" width="100%">
										<input id="storename" class="form-control" type="text" value="" name="storename" maxlength="255" placeholder="store-name.myshopify.com">
									</td>
								</tr>
								<tr>
									<td class="value_label" width="33%">
										<span>Subject</span>
									</td>
									<td class="" width="100%">
									    <input id="subject" class="form-control" type="text" value="" name="subject" placeholder="Enter query topic here ...">
									</td>
								</tr>
								<tr>
									<td class="value_label" width="33%">
										<span>Query/Suggestion</span>
									</td>
									<td class="required" width="100%">
									    <textarea id="query" class="form-control" name="query" rows="5" cols="40" placeholder="your query goes here ..."></textarea>
									</td>
								</tr>
							</tbody>
						</table>
			        </div>
			        <div class="modal-footer">
			        	<input type="button" class="btn btn-primary" onclick="sendMail();" value="Send" id="send">
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>	      
			    </div>
			  </div>	  
			</div>	
		<!--   Help Section end     -->
		
		<script type="text/javascript">
		<?php $saveQuery= \yii\helpers\Url::toRoute(['apienable/needhelp']);?>
		
			function closeNeedHelp(){
				 j$('.needHelp').css("display","none");
			}
			function sendMail(){
				var name = j$('#merchant_name').val();
				var from = j$('#from').val();
				var storename = j$('#storename').val();
				var subject = j$('#subject').val();
				var query = j$('#query').val();

				if ((from == null || from == "")||(storename == null || storename == "")||(query == null || query == "")) {
			        alert("All fields must be filled out");
			        return false;
			    }
				 
			    var atpos = from.indexOf("@");
			    var dotpos = from.lastIndexOf(".");
			    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=from.length) {
			        alert("Please Enter a valid e-mail address");
			        return false;
			    }
				var savequery = '<?php echo $saveQuery; ?>';
				j$.ajax({
			        method: "GET",
			        url: savequery,
			        data: { name:name,from: from,storename : storename, subject: subject, query:query }
			   })
			    j$('#merchant_name').val("");
				j$('#from').val("");
				j$('#storename').val("");
				j$('#subject').val("");
				j$('#query').val("");
				alert('            Thank You !!!\n We will contact you soon');
				
			    j$('.needHelp').css("display","none");
			  
			}

		</script>