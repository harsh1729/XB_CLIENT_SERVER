<div id="left-navigation-container">
	<div class="left-navigation-content-container">
		<a  style="color:#fff" href="<?=base_url('home');?>">
			<p style="font-size:1.5em;" class="left_navigation <?=($page=='home'?'menu-active':'')?>">
				<span  class="glyphicon glyphicon-home"></span> Home
			</p>
		</a>

		<a href="<?=base_url('doctor');?>">
			<p class="left_navigation <?=($page=='doctor'?'menu-active':'')?>"><span class="glyphicon glyphicon-user"></span> Add Doctor
			</p>
		</a>
		<a href="<?=base_url('city');?>">
			<p class="left_navigation <?=($page=='city'?'menu-active':'')?>"><span class="glyphicon glyphicon-globe"></span> City
			</p>
		</a>

		<a href="<?=base_url('advt');?>">
			<p class="left_navigation <?=($page=='advt'?'menu-active':'')?>"><span class="glyphicon glyphicon-globe"></span> Advertisement
			</p>
		</a>
		
	</div>
	<div class=".left-navigation-footer">
		<p class="text-center" style="color:#333;">&copy; Copyright 2015, <a href="http://www.xercesblue.in">xerces blue</a></p>
	</div>
</div>