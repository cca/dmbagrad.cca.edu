<style>
    #content {
        margin: 40px 0 60px;
        width: 660px;
        float: right;
    }
    #sidebar {
        width: 252px;
        float: left;
        margin: 40px 0 60px;
    }
    .loops-wrapper.grid4 .post{
        width: 140px;
    }
    .fancybox.current{
        display: block!important;
    }
</style>
<div id="layout" class="pagewidth clearfix">

    <!-- content -->
    <div id="content" class="list-post">


        <article itemscope="" itemtype="http://schema.org/Article"  class=" post type-post status-publish format-standard has-post-thumbnail hentry category-finearts post clearfix ">


            <div class="post-content">


                <h1 class="post-title entry-title" itemprop="name"><?= $project['project']['name'] ?></h1>
                <h5 style='font-size: 14px; color: #c44e4e; margin-top: 10px;'><?= $project['project']['dataType'] != 'designStartegy' ? 'STRATEGIC FORESIGHT' : 'DESIGN STRATEGY' ?></h5>


                <div class="entry-content" itemprop="articleBody">


                    <div>
                        <div  class="slideshow-wrapper clearfix centered photoswipe toggle-open fluid ps-fade">
                            <div id="portfolio-slideshow0" class="portfolio-slideshow" style="visibility: visible;   width: 660px;">
                                <?php $i = 0; ?>
                                <?php foreach ($project['attachments'] as $key => $value): ?>
                                    <?php if (strpos($value['filename'], 'jpg') || strpos($value['filename'], 'png')): ?>
                                        <div class="slideshow-next slideshow-content" style="display: <?= $i == 0 ? 'block' : 'none'; ?>; z-index: <?= $i ?>; opacity: <?php $i == 0 ? 1 : 0; ?>;">
                                            <a href="" class="ps-photoswipe fancybox <?= $i == 0 ? 'current' : ''; ?>" style='display: block; overflow: hidden;' rel="gallery"><img  class="psp-active" src="<?= $value['links'][0][0]['view']  ?>"></a>
                                            <div class="slideshow-meta">
                                                
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                                
                       
                            </div>
                            <!--#portfolio-slideshow-->
                        </div>
                        <!--#slideshow-wrapper-->
                    </div>
                    <div id="left">
                        <h3>Description</h3>
                        <p><?= htmlspecialchars($project['project']['description']) ?></p>
                         
                    </div>
                    <div id="left">
                        <?php $p = 0; ?>
                         <?php foreach ($project['attachments'] as $key => $attachment): ?>
                            <?php if (strpos($attachment['filename'], 'jpg') === false && strpos($attachment['filename'], 'png') === false): ?>
                                <?php if($p == 0): ?><h3>Attachments</h3><?php endif; ?>
                                <a href="<?= $attachment['links'][0][0]['view'] ?>" style='display: block; ' target='__blank'><?= $attachment['description'] ?></a>
                                <?php $p++; ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <div id="left">
                    <?php 
                        $students = [];
                        $last = '';
                        if ($project['project']['students']) {
                            foreach (explode(',', $project['project']['students']) as $student) {
                                if ($student) {
                                    if (strpos($student, 'Jr') !== false) {
                                        $students[$last.' Jr'] = $last.' Jr';
                                        unset($students[$last]);
                                        continue;
                                    }
                                    $last = trim($student);
                                    $students[$last] = $value['id'];
                                }
                                
                            }
                        }
                    ?>

                    <?php if ($students): ?>
                        <h3>TEAM MEMBERS</h3>
                        <?php foreach ($students as $keyP =>$student): ?>
                            <p><?= $keyP ?></p>
                        <?php endforeach ?>
                    <?php endif ?>
                        
                    </div>

                

                    
                    <!-- /themify_builder_content -->

                </div>
                <!-- /.entry-content -->


            </div>
            <!-- /.post-content -->

        </article>
        <!-- /.post -->





    </div>
    <!-- /content -->


    <!-- /#sidebar -->

</div>

<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect  : 'none',
            closeEffect : 'none'
        });
    });
</script>

