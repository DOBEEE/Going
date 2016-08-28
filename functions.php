<?php


// require get_template_directory().'/ajax-comment/do.php';
// require_once(TEMPLATEPATH . '/theme-updates/theme-update-checker.php'); 
// $wpdaxue_update_checker = new ThemeUpdateChecker(
//     'Going', //主题名字
//     'http://www.immaster.cn/themes/info.json'  //info.json 的访问地址
// );
    add_action('template_include', 'load_single_template');
      function load_single_template($template) {
        $new_template = '';
        // single post template
        if( is_single() ) {
          global $post;
          // 'wordpress' is category slugs
          if( has_term('javascript', 'category', $post) ) {
            // use template file single-wordpress.php
            $new_template = locate_template(array('qsmx.php' ));
          }
        }
        return ('' != $new_template) ? $new_template : $template;
      }
function remove_open_sans() {    
    wp_deregister_style( 'open-sans' );    
    wp_register_style( 'open-sans', false );    
    wp_enqueue_style('open-sans','');    
}    
add_action( 'init', 'remove_open_sans' );

if ( function_exists('register_sidebar') )
    register_sidebar();

function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 
//获取文章中第一张图片的路径并输出
$first_img = $matches [1] [0];
 
//如果文章无图片，获取自定义图片
 
if(empty($first_img)){ //Defines a default image
$first_img = bloginfo('template_url')."/images/default.jpg";
 
//请自行设置一张default.jpg图片
}
 
return $first_img;
}
// 激活菜单
add_theme_support('nav-menus');
if(function_exists('register_nav_menus')){
	register_nav_menus(
			array(
	      	'left-menu' => '左边栏菜单',
      		'top-menu' => '顶部菜单'
			)
		);
}
require('ajax-comment/main.php');

load_theme_textdomain( 'Going', get_template_directory() . '/languages' );

    remove_action( ‘wp_head’, ‘feed_links_extra’, 3 ); // Display the links to the extra feeds such as category feeds

    remove_action( ‘wp_head’, ‘feed_links’, 2 ); // Display the links to the general feeds: Post and Comment Feed

    remove_action( ‘wp_head’, ‘rsd_link’ ); // Display the link to the Really Simple Discovery service endpoint, EditURI link

    remove_action( ‘wp_head’, ‘wlwmanifest_link’ ); // Display the link to the Windows Live Writer manifest file.

    remove_action( ‘wp_head’, ‘index_rel_link’ ); // index link

    remove_action( ‘wp_head’, ‘parent_post_rel_link’, 10, 0 ); // prev link

    remove_action( ‘wp_head’, ‘start_post_rel_link’, 10, 0 ); // start link

    remove_action( ‘wp_head’, ‘adjacent_posts_rel_link’, 10, 0 ); // Display relational links for the posts adjacent to the current post.

    remove_action( ‘wp_head’, ‘wp_generator’ ); // Display the XHTML generator that is generated on the wp_head hook, WP version



function dropdown_links_cats($cat) {
 //$selected = (int) $selected;
// $number = $number;
 
	$categories = get_terms('link_category', 'orderby=name&hide_empty=0');

	if ( empty($categories) )
		return;
    echo "<option value='0'";
	echo ($cat == 0) ? ' selected' : '';
	echo ">".__("All Categories")."</option>";
	foreach ( $categories as $category ) {
		$cat_id = $category->term_id;
		$name = wp_specialchars( apply_filters('the_category', $category->name));
		//echo "<option value='$cat_id'" . $cat_id==$selected ? " selected = 'selected'" : '' .">$name</option>";
		if ($cat_id != $cat)
		 echo "<option value='".$cat_id."'>".$name."</option>";
		else
		 echo "<option value='".$cat_id."' selected>".$name."</option>";		 
	}

}


function pagination($query_string){   
    global $posts_per_page, $paged;   
    $my_query = new WP_Query($query_string ."&posts_per_page=-1");   
    $total_posts = $my_query->post_count;   
    if(empty($paged))$paged = 1;   
    $prev = $paged - 1;   
    $next = $paged + 1;   
    $range = 10; // only edit this if you want to show more page-links   
    $showitems = ($range * 2)+1;   
      
    $pages = ceil($total_posts/$posts_per_page);   
    if(1 != $pages){   
    echo "<div class='pagination'>";   
    echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>最前</a>":"";   
    echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";   
      
    for ($i=1; $i <= $pages; $i++){   
    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){   
    echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";   
    }   
    }   
      
    echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";   
    echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后</a>":"";   
    echo "</div>\n";   
    }   
    }  
 
class PTCFP{
 
  function __construct(){
 
    add_action( 'init', array( $this, 'taxonomies_for_pages' ) );
 
    /**
     * 确保这些查询修改不会作用于管理后台，防止文章和页面混杂 
     */
    if ( ! is_admin() ) {
      add_action( 'pre_get_posts', array( $this, 'category_archives' ) );
      add_action( 'pre_get_posts', array( $this, 'tags_archives' ) );
    } // ! is_admin
 
  } // __construct
 
  /**
   * 为“页面”添加“标签”和“分类”
   *
   * @uses register_taxonomy_for_object_type
   */
  function taxonomies_for_pages() {
      register_taxonomy_for_object_type( 'post_tag', 'page' );
      register_taxonomy_for_object_type( 'category', 'page' );
  } // taxonomies_for_pages
 
  /**
   * 在标签存档中包含“页面”
   */
  function tags_archives( $wp_query ) {
 
    if ( $wp_query->get( 'tag' ) )
      $wp_query->set( 'post_type', 'any' );
 
  } // tags_archives
 
  /**
   * 在分类存档中包含“页面”
   */
  function category_archives( $wp_query ) {
 
    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
      $wp_query->set( 'post_type', 'any' );
 
  } // category_archives
 
} // PTCFP
 
$ptcfp = new PTCFP();
?>