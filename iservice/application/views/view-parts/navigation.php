<div id="left-navigation-container">
	
	
	<div class="left-navigation-content-container">
		<!-- <a  style="color:#fff" href="<?=base_url('home');?>">
			<p style="font-size:1.5em;" class="left_navigation <?=($page=='home'?'menu-active':'')?>">
				<span  class="glyphicon glyphicon-home"></span> Home
			</p>
		</a>

		<a href="<?=base_url('profile');?>">
			<p class="left_navigation <?=($page=='profile'?'menu-active':'')?>"><span class="glyphicon glyphicon-user"></span> Profile<span class="badge pull-right"><?=$userName;?></span>
			</p>
		</a> -->

		<a href="<?=base_url('category');?>">
			<p class="left_navigation <?=($page=='category'?'menu-active':'')?>">
				<span class="glyphicon glyphicon-list-alt"></span> Category</span>
			</p>
		</a>
		<a href="<?=base_url('city');?>">
			<p class="left_navigation <?=($page=='city'?'menu-active':'')?>">
				<span class="glyphicon glyphicon-globe"></span> City</span>
			</p>
		</a>
		<a href="<?=base_url('gallery');?>">
			<p class="left_navigation <?=($page=='gallery'?'menu-active':'')?>">
				<span class="glyphicon glyphicon-picture"></span> Gallery</span>
			</p>
		</a>
		<a href="<?=base_url('users');?>">
			<p class="left_navigation <?=($page=='users'?'menu-active':'')?>">
				<span class="glyphicon glyphicon-tasks"></span> Users</span>
			</p>
		</a>

		<!-- <a href="<?=base_url('epaper_users');?>">
			<p class="left_navigation <?=($page=='epaper_users'?'menu-active':'')?>">
				<span class="glyphicon glyphicon-user"></span> Epaper Users</span>
			</p>
		</a> -->
		
		<a href="<?=base_url('advertisement');?>">
   			<p class="left_navigation <?=($page=='advertisement'?'menu-active':'')?>">
    			<span class="glyphicon glyphicon-tasks"></span> Advertisement</span>
   			</p>
  		</a>
		
		<!--********************************************************* START clientwise Features *****************************************************-->

		<a href="<?=base_url('notification');?>">
			<p class="left_navigation <?=($page=='notification'?'menu-active':'')?>"><span class="glyphicon glyphicon-bell"></span> Send Notification
			</p>
		</a>
		
		<!--********************************************************* END of clientwise Features *****************************************************-->
		
		<a href="<?=base_url('setting');?>">
			<p class="left_navigation <?=($page=='settings'?'menu-active':'')?>"><span class="glyphicon glyphicon-cog"></span> Settings
			</p>
		</a>
		
		<a href="<?=base_url('download');?>">
			<p class="left_navigation <?=($page=='download'?'menu-active':'')?>">
				<span class="glyphicon glyphicon-download"></span> Downloads</span>
			</p>
		</a>
		
	</div>
	<div class=".left-navigation-footer">
		<p class="text-center" style="color:#333;">&copy; Copyright 2015, <a href="http://www.xercesblue.in">xerces blue</a></p>
	</div>
</div>