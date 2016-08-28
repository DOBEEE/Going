<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>404</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<style>
#primary{
	text-align: center; 
	position: fixed;
	top: 50%;
	left: 50%;
	width:50%;
	height: 50%;
	-webkit-transform: translateX(-50%) translateY(-50%);
	-moz-transform: translateX(-50%) translateY(-50%);
	-ms-transform: translateX(-50%) translateY(-50%);
	transform: translateX(-50%) translateY(-50%);
	/*justify-content:center;
	align-items:center;
	display:-webkit-flex*/
}
@media screen and (max-width: 768px) {
	#primary{
		text-align: center; 
		position: fixed;
		top: 50%;
		left: 50%;
		width:70%;
		height: 70%;
		-webkit-transform: translateX(-50%) translateY(-50%);
		-moz-transform: translateX(-50%) translateY(-50%);
		-ms-transform: translateX(-50%) translateY(-50%);
		transform: translateX(-50%) translateY(-40%);
	}
}
button{
	display: inline-block;
	padding: 6px 12px;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: normal;
	line-height: 1.42857143;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	cursor: pointer;
	-webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	background-image: none;
	border: 1px solid transparent;
	border-radius: 4px;
	color: #52B8CB;
	background-color: #fff;
	border-color: #52B8CB;	
}
.img{
	max-height: 100%;
	max-width: 100%;
}
	</style>
	</head>
<body>
<div id="main" class="clear" style="width: 100%;">

	<div id="primary">

		<img class="img" src="<?php bloginfo('template_url'); ?>/images/404.png" alt="找不到页面">

			<a style="display: block;" href="<?php bloginfo('url');?>">
			<button style=" 
			  ">返回首页</button>
			  </a>

	</div>
	</div>
	</body>
	</html>
