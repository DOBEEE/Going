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
                    
                    <p class="postmetadata">
                    <span class="data1"><?php the_time('Y年m月d日');?></span>
                    <span class="categ single-categ">
                        <?php the_category(', ') ?>
                    </span>
                    
                </p>
                
                <?php the_content(); ?>
                <div class="copyright">
                    <div> » <b>本文链接：</b><a target="_blank" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <br/> » <b>版权归</b>
                    <a target="_blank" title="蛋炒饭博客" href="http://www.immaster.cn" rel="copyright nofollow">汉堡鸡肉卷鸡腿鸡翅</a><b>所有</b>
                    </div>
                    <div> » <b>转载请注明来源，如果你喜欢这篇文章，欢迎将它分享给你的朋友</b>
                    </div>
                </div>
                <?php link_pages('<p><strong>Pages:</strong>', '</p>', 'number'); ?>
                <?php the_tags( '<footer class="entry-meta single-entry"><span class="tag-links">', '', '</span></footer>' ); ?>
                </div>
                <div class="navigation">
                    <?php previous_post_link('下一篇：%link') ?> <?php next_post_link('上一篇：%link') ?>
                </div>
                <!-- 评论 -->
                
                    <?php if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
            </div>
        <?php endwhile;?>

        <!-- 分页 -->
        
    <?php else :?>
        <div class="post">
            <h2><?php _e('NOT FOUND');?></h2>
        </div>
    <?php endif;?>
    </div>
    
<script>
function createDirectory() {
    this.tocList = [];
    this.parentList = [];
}
createDirectory.prototype = {
    constructor: createDirectory,
    paddingItem: 3,
    init: function () {
        var oDirectory = document.createElement('div');
        oDirectory.className = 'directory';
        this.getContent();
        this.getPerantItem();
        this.setContent();
        this.render();
    },
    getContent: function () {
        var k = 1;
        while(document.getElementById('toc_' + k)){
            var item = {};
            var toc = document.getElementById('toc_' + k);
            item.tocType = toc.tagName.match(/h(\d+)/i)[1];
            item.text = toc.innerHTML;
            this.tocList.push(item);
            k++;
        }
    },
    getPerantItem: function () {
        var tocList_copy = this.tocList.slice(0);
        tocList_copy.sort(this.compare('tocType'));
        tocList_copy[0].paddingLeft = paddingItem;
        this.parentList.push(tocList_copy[0]);
    },
    compare: function (propertyName) {
        return function (object1, object2) {
            var value1 = object1[propertyName];
            var value2 = object2[propertyName];

            return object2 - object1;
        }
    },
    setContent: function () {
        for (var i = 0; i < this.tocList.length; i++) {
            var item = this.tocList[i];
            for (var n = 0; n < this.parentList.length; n++) {

                if (item.tocType>this.parentList[n].tocType) {
                    this.parentList.splice(n, 0, item);
                    item.paddingLeft = (this.parentList.length - n - 1)*paddingItem;
                    break;
                }else if(item.tocType == this.parentList[n].tocType){
                    item.paddingLeft = this.parentList[n].paddingLeft;
                    break;
                }
            }
        }
    },
    render: function () {
        for (var i = 0; i < this.tocList.length; i++) {
            oDirectory.innerHTML += '<a href="#toc_'+i+'" style="padding-left:'+this.tocList[i].paddingLeft+'px;">'+this.tocList[i].text+'</a>'
        }
        document.body.appendChild(oDirectory);
    }
}
new createDirectory();
</script>
<?php include(TEMPLATEPATH.'/footer.php');?>