<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>canvas { width: 100%; height: 100% }</style>
    <script src="<?php bloginfo('template_url'); ?>/js/Three.js"></script>
</head>
<body>
	

    <script>
    	var scene = new THREE.Scene();  // 场景
        var camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);// 透视相机
        var renderer = new THREE.WebGLRenderer();   // 渲染器
        renderer.setSize(window.innerWidth, window.innerHeight);    // 设置渲染器的大小为窗口的内宽度，也就是内容区的宽度
        document.body.appendChild(renderer.domElement);
        
        var geometry = new THREE.CubeGeometry(100,100,100);//新建立方体
        var material = new THREE.MeshBasicMaterial({color: 0x00ff00});
        var cube = new THREE.Mesh(geometry, material); 
        scene.add(cube);
        camera.position.z = 500;

                var light = new THREE.DirectionalLight(0xFF0000);
                light.position.set(0, 0, 100);
                // light.castShadow = true;
                scene.add(light);
        function render() {
            requestAnimationFrame(render);
            cube.rotation.x += 0.1;
            cube.rotation.y += 0.1;
            renderer.render(scene, camera);
        }
        render();
    </script>



</body>
</html>
<?php
/*
Template Name: 我的页面模板
*/
?>
    
    
