

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
        <?php
            printf( _n( '还有板凳！', '共有%1$s条评论:', get_comments_number(), 'Going' ),
                number_format_i18n( get_comments_number() ), get_the_title() );
        ?>
    </h2>
    <div id="loading-comments" style="display: none;"><span>Loading...</span></div>
    <ol class="comment-list">
        <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 34,
            ) );
        ?>
    </ol><!-- .comment-list -->
    <!-- 检测评论分页 -->
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comments-navi">
        <?php paginate_comments_links('prev_text=«&next_text=»');?>
    </nav>
    <?php endif; // Check for comment navigation. ?>

    <?php if ( ! comments_open() ) : ?>
    <p class="no-comments"><?php _e( 'Comments are closed.', 'Going' ); ?></p>
    <?php endif; ?>
    
    <?php else : ?>
        <h2 class="comments-title">
        <?php
            printf( _n( '沙发空缺中！', '沙发空缺中！', 'Going' ),
                number_format_i18n( get_comments_number() ), get_the_title() );
        ?>
        </h2>
        <?php endelse; ?>
    <?php endif; // have_comments() ?>
    
    <?php comment_form(
    array(

    'fields' => array(
        

        'author' => '
        <p class="comment-form-author">
         <span class="required">*</span>
         <input type="text" aria-required="true" size="30" value="'.$comment_author.'" name="author" id="author" placeholder="昵称">
         </p>',

        'email' => '
        <p class="comment-form-email">
        <span class="required">*<a target="_blank" href="http:// 你的URL链接地址"></a></span>
        <input type="text" aria-required="true" size="30" value="'.$comment_author_email.'" name="email" id="email" placeholder="邮箱">
        </p>',

        'url' => '
        <p class="comment-form-url">
        <input type="text" size="30" value="'.$comment_author_url.'" name="url" id="url" placeholder="站点">
        </p>'
        )
    )
    ); ?>

</div><!-- #comments -->
