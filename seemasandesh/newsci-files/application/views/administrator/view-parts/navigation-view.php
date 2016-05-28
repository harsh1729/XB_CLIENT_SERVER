<div id="left-navigation-container">
	
	
	<div class="left-navigation-content-container">
		<a  style="color:#fff" href="<?=base_url('administrator');?>">
			<p style="font-size:1.5em;" class="left_navigation <?=($page=='home'?'menu-active':'')?>">
				<span  class="glyphicon glyphicon-home"></span> Home
			</p>
		</a>

		<a href="<?=base_url('administrator/profile');?>">
			<p class="left_navigation <?=($page=='profile'?'menu-active':'')?>"><span class="glyphicon glyphicon-user"></span> Profile<span class="badge pull-right"><?=$userName;?></span>
			</p>
		</a>

		<a href="<?=base_url('administrator/pending');?>">
			<p class="left_navigation <?=($page=='pending'?'menu-active':'')?>">
				<span class="glyphicon glyphicon-download-alt"></span> Pending<span class="badge pull-right" id="pendingCountLabel"></span>
			</p>
		</a>
		<a href="<?=base_url('administrator/news');?>">
			<p class="left_navigation <?=($page=='news'?'menu-active':'')?>"><span class='glyphicon glyphicon-file'></span> Add News
			</p>
		</a>
		

		<?php if($usertype == "superAdmin" || $usertype == "admin") :?>
			<a href="<?=base_url('administrator/user');?>">
				<p class="left_navigation <?=($page=='user'?'menu-active':'')?>"><span class='glyphicon glyphicon-facetime-video'></span> Add User
				</p>
			</a>
		<?php endif; ?>
		<?php if($usertype == "superAdmin" || $usertype == "admin") :?>
			<a href="<?=base_url('administrator/category');?>">
				<p class="left_navigation <?=($page=='category'?'menu-active':'')?>"><span class='glyphicon glyphicon-magnet'></span> Add Category
				</p>
			</a>
		<?php endif; ?>
		
		<?php foreach($addons as $index => $row): ?>
			<?php $temp = base_url("administrator/".$row['admincontroller']); ?>
			<a href="<?=$temp;?>">
				<p class="left_navigation <?=($page==$row['admincontroller']?'menu-active':'')?>"><span class='glyphicon glyphicon-list-alt'></span> <?=$row['name'];?>
				</p>
			</a>
		<?php endforeach; ?>
		
		<!--********************************************************* START clientwise Features *****************************************************
		
		<a href="<?=base_url('administrator/epaper');?>">
			<p class="left_navigation <?=($page=='epaper'?'menu-active':'')?>"><span class='glyphicon glyphicon-list-alt'></span> E-Paper
			</p>
		</a>
		<a href="<?=base_url('administrator/notification');?>">
			<p class="left_navigation <?=($page=='notification'?'menu-active':'')?>"><span class="glyphicon glyphicon-bell"></span> Send Notification
			</p>
		</a>

		<?php if($usertype == "superAdmin" || $usertype == "admin") :?>
			<a href="<?=base_url('administrator/advt');?>">
				<p class="left_navigation"><span class="glyphicon glyphicon-gift"></span> Advertisement
				</p>
			</a>
		<?php endif; ?>
		
		<a href="<?=base_url('administrator/joke');?>">
			<p class="left_navigation <?=($page=='joke'?'menu-active':'')?>"><span class='glyphicon glyphicon-gift'></span> Jokes
			</p>
		</a>
		<a href="<?=base_url('administrator/manthan');?>">
			<p class="left_navigation <?=($page=='manthan'?'menu-active':'')?>"><span class='glyphicon glyphicon-leaf'></span> manthan
			</p>
		</a>
		<a href="<?=base_url('administrator/auto_sandesh');?>">
			<p class="left_navigation <?=($page=='auto_sandesh'?'menu-active':'')?>"><span class='glyphicon glyphicon-plane'></span> auto sandesh
			</p>
		</a>
		<a href="<?=base_url('administrator/publicmessage');?>">
			<p class="left_navigation <?=($page=='publicmessage'?'menu-active':'')?>"><span class='glyphicon glyphicon-globe'></span> public messages
			</p>
		</a>
		<a href="<?=base_url('administrator/rivernrates');?>">
			<p class="left_navigation <?=($page=='rivernrates'?'menu-active':'')?>"><span class='glyphicon glyphicon-globe'></span> River and Rate
			</p>
		</a>
		<a href="<?=base_url('administrator/rashifal');?>">
			<p class="left_navigation <?=($page=='rashifal'?'menu-active':'')?>"><span class='glyphicon glyphicon-globe'></span> Rashi - Fal
			</p>
		</a>
		
		********************************************************* END of clientwise Features *****************************************************-->
		
		
		
		<a href="<?=base_url('administrator/suggestions');?>">
			<p class="left_navigation <?=($page=='suggestions'?'menu-active':'')?>"><span class="glyphicon glyphicon-thumbs-up"></span> User Suggestions
			</p>
		</a>
		<a href="<?=base_url('administrator/settings');?>">
			<p class="left_navigation <?=($page=='settings'?'menu-active':'')?>"><span class="glyphicon glyphicon-cog"></span> Settings
			</p>
		</a>
		
	</div>
	<div class=".left-navigation-footer">
		<p class="text-center" style="color:#333;">&copy; Copyright 2015, <a href="http://www.xercesblue.in">xerces blue</a></p>
	</div>
</div>