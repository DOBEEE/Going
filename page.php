<?php include(TEMPLATEPATH.'/header.php');?>
<div id="main" class="clear">
<!-- 侧边栏 -->
<?php include(TEMPLATEPATH.'/sidebar.php');?>
<div id="container">
<div id="postal">
	<!-- 日志标题 -->
    <?php if(have_posts()):?>
    	<?php while(have_posts()):the_post();?>
    		<div class="post" id="post-<?php the_ID();?>">
	    		<h2 class="tit"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
	    		<div id="entry">
	    			
					<section>
						<img class="imgs" src="<?php echo catch_that_image() ?>">
				 	</section>
					<?php echo mb_strimwidth(strip_tags(apply_filters(‘the_content’, $post->post_content)), 0, 400,”……”); ?>
					<?php link_pages('<p><strong>Pages:</strong>', '</p>', 'number'); ?>
					<?php edit_post_link('Edit', '<p>', '</p>'); ?>
				
	    		</div>
	    	</div>
    	<?php endwhile;?>
    	<!-- 分页 -->
    <?php else :?>
    	<div class="post">
    		<h2><?php _e('NOT FOUND');?></h2>
    	</div>
    <?php endif;?>
    </div>
    

<?php include(TEMPLATEPATH.'/footer.php');?>
