<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<meta name="keywords" content="蛋炒饭,前端博客,html5, JavaScript"/>
	<meta name="decription" content="李国辉的个人技术博客"/>
	<title><?php bloginfo('name');?><?php wp_title();?></title>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles/default.css"type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>"type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/genericons/genericons.css"type="text/css">
	<?php if (is_singular() && comments_open()) {
        wp_enqueue_script('comment-reply');
    } ?>
	<?php wp_head(); ?>
	<script type="text/javascript" src="http://youzikuwebfont.oss-cn-beijing.aliyuncs.com/api.lib.min.js"></script>
	<script type='text/javascript' src='http://libs.baidu.com/jquery/1.8.2/jquery.min.js?ver=1.8.2'></script>
</head>
<body style="height: 100%;">
