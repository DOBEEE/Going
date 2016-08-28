<div class="menu_main">
	<?php include(TEMPLATEPATH.'/images/iconfont-icon1.svg');?>
</div>
<div class="sidebar">


	<div id="header">
		<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="蛋炒饭"></a>
		<h1><a href="<?php bloginfo('url');?>"><?php bloginfo('name'); ?></a></h1>
		
	</div>
	<div id="side"> 
	
	<?php if(function_exists('dynamic_sidebar')&& dynamic_sidebar()):else:?>
		<!-- 菜单 -->
		<?php 

	      if(function_exists('wp_nav_menu')) {

	          wp_nav_menu(array( 'theme_location' => 'left-menu','container_id'=>'menu_left','menu_id'=>'meall') ); 

	      }

	    ?>
	

		<!-- 搜索框 -->
		<!-- <div id="search">
			<?php include(TEMPLATEPATH.'/searchform.php');?>
		</div> -->
	<?php endif;?>
	
	</div>
	<a id="svg-luo" href=""><?php include(TEMPLATEPATH.'/images/svg.svg');?></a>
</div>
