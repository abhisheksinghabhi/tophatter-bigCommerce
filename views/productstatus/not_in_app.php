<?php 
use yii\grid\GridView;
use yii\helpers\Html;
use frontend\modules\walmart\components\Data;

$this->title = 'Not In App Products';
$this->params['breadcrumbs'][] = $this->title;

$bulkActionSelect = Html::dropDownList('action', null, ['' => '-- choose bulk action --', 'all' => 'Retire all not-in-app', 'selected' => 'Retire selected'], ['id' => 'bulk_action', 'class' => 'form-control']);
$bulkActionSubmit = Html::Button('submit', ['class' => 'btn btn-primary', 'onclick' => 'validateBulkAction()']);

$bulkActionForm = $bulkActionSelect . $bulkActionSubmit;
?>
<style>
    .PUBLISHED { color: green; }
    .STAGE { color: green; }
    .UNPUBLISHED { color: red; }
</style>
<div class="content-section jet-product-index">
	<div class="form new-section">

		<div class="jet-pages-heading walmart-title">
            <div class="title-need-help">
                <h1 class="Jet_Products_style"><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="clear"></div>
        </div>
        <form id="bulk_action_form" action="<?= Data::getUrl('productstatus/retire') ?>" method="post">
		<?= GridView::widget([
		    'dataProvider' => $data_provider,
		    'filterModel' => $filterModel,
		    'summary' => '<div class="summary clearfix"><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><span class="show-items">Showing <b>{begin}-{end}</b> of <b>{totalCount}</b> items.</span></div><div class="col-lg-7 col-md-7 col-sm-7 col-xs-12"><div class="bulk-action-wrapper">' . $bulkActionForm . '</div></div></div>',
		    'columns' => $gridColumns
		]); 
		?>
		</form>
	</div>
</div>

<script type="text/javascript">
	function validateBulkAction() {
        var action = $('#bulk_action').val();
        if (action == '') {
            alert('Please Select Bulk Action');
        } else {
        	if(action == 'selected')
        	{
        		if ($("input:checkbox:checked.bulk_checkbox").length == 0) {
	                alert('Please Select Products Before Submit.');
	            }
	            else {
	                
	            	alertify.confirm ("Do you want to retire all selected products?", function(e) {
	                    if (e)
	                    {
	                		$("#bulk_action_form").submit();
	                	}
	                });
	            }
        	}
        	else if(action == 'all') 
        	{
        		alertify.confirm ("Do you want to retire all not-in-app products?", function(e) {
                    if (e)
                    {
                		$("#bulk_action_form").submit();
                	}
	            });
        	}
        }
    }
</script>