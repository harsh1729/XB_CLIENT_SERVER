<div class="row">
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<h4><?=$maincontent[0]['heading']?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><?=nl2br($maincontent[0]['content']);?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
	</div>
</div>
<?php foreach($moreeditorialcontent as $index => $singleeditorial): ?>
	<?php if($index%4 == 0): ?>
		<div class="row">
	<?php endif; ?>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading"><?=$singleeditorial['heading'];?></div>
				<div class="panel-body">
					<?=mb_substr($singleeditorial['content'],0,430,'utf-8')." ...";?>
					<p><a href="<?=base_url('editorial/'.$singleeditorial['id']);?>" class="btn btn-default btn-xs pull-right">Read more ...</a><p>
				</div>
			</div>
		</div>
	<?php if(($index+1)%4 == 0 || $index+1 == count($moreeditorialcontent)): ?>
	<?php endif; ?>
	</div>
<?php endforeach; ?>