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
    			<div class="categ">
    				<?php the_category(', ') ?>
    			</div>
    			 
	    		<h2 class="tit">

	    		<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
	    		</h2>
	    		<div id="entry">
	    		
	    			<p class="postmetadata">
	    				<span class="data1"><?php the_time('Y年m月d日');?></span>
						 
						
						<span class="comments1"><?php comments_popup_link('发表回复', '1', '%'); ?></span> 
					
					</p>
				<section class="imgs">
					<img class="imgs" src="<?php echo catch_that_image() ?>">
				</section>
				<?php echo mb_strimwidth(strip_tags(apply_filters(‘the_content’, $post->post_content)), 0, 400,”……”); ?>
				
				<p class="more"><a class="more" href="<?php the_permalink();?>"><?php _e('继续阅读>>')?></a></p>
				<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
					

				
	    		</div>
	    	</div>
    	<?php endwhile;?>
    	<!-- 分页 -->
    	<div class="navigation">
    		<?php pagination($query_string); ?>
    	</div>
    <?php else :?>
    	<div class="post">
    		<h2><?php _e('NOT FOUND');?></h2>
    	</div>
    <?php endif;?>
    </div>
	
    <?php include(TEMPLATEPATH.'/footer.php');?>
