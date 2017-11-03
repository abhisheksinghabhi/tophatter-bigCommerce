<?php
use yii\helpers\Html;
use frontend\components\Data;
use frontend\modules\walmart\components\Dashboard\LatestUpdates;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Latest Updates'];
$this->params['breadcrumbs'][] = $this->title;

$latestUpdates = LatestUpdates::fetchLatestUpdates();
?>


<div class="main-content-wrapper container">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="new-section latest-update">

				    <div class="jet-pages-heading">
				        <h3 class="Jet_Products_style"><?= Html::encode($this->title) ?></h3>
				        <p> Created At : <?= LatestUpdates::getFormattedTime($model->created_at) ?></p>	
				        <p> Updated At : <?= LatestUpdates::getFormattedTime($model->updated_at) ?></p>			        
				    </div>
				    <div class="latest_update_description">
				    
				        <div class="content">
				        	<?= $model->description ?>		
				        </div>
				    </div>

			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="box-update-sections">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="update-section new-section no-pad">
							<div class="update-heading grey-heading">
								<h5>Latest Updates</h5>
							</div>
							<div class="update-content">
								<ul class="update-list list-style">
									<?php if(count($latestUpdates)) : ?>
										<?php foreach ($latestUpdates as $latestUpdate) : ?>
										<?php 	$time = LatestUpdates::timeDifference($latestUpdate['updated_at']);?>
										<li>
											<p><a href="<?= Data::getUrl('latest-updates/view?id='.$latestUpdate['id']) ?>"><?= $latestUpdate['title'] ?></a></p>
											<span><?= $time." ago" ?></span>
										</li>
										<?php endforeach; ?>
									<?php else : ?>
										<li>No Latest Updates Found.</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>