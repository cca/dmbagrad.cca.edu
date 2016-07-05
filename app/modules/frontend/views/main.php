<div id="upperwrap">
</div>
<div id="layout" class="pagewidth clearfix">	
	<div id="content" style='width: 726px; float: right;'  class="list-post" >
		<div id="loops-wrapper" class="loops-wrapper sidebar-none grid4">


			<?php if ($projects): ?>
				<?php foreach ($projects as $key => $value): ?>
					<article style='width: 169px; margin-left: 10px;' class="clone-article post type-post status-publish format-standard has-post-thumbnail hentry category-finearts post clearfix cat-3">
					    <figure class="post-image " style='max-height: 127px; overflow: hidden;'>
					        <a href="/project/view/id/<?= $value['id'] ?>"><img style='height: 115px;' src="<?= isset($value['img']) ? $value['img'].'?gallery=preview' : 'assets/images/no-img.jpg' ?>" alt="Calen Russell Barca-Hall" height="250"></a>
					    </figure>
					    <div class="post-content">
					        <h1 class="post-title entry-title" itemprop="name"><a href="/project/view/id/<?= $value['id'] ?>" title="Calen Russell Barca-Hall">

					        <?php
					        	$count = count(explode(',', $value['students']));

					        	echo $count == 1 && !empty($value['students']) ? $value['students'] : $value['name'];
					        ?>

					        </a></h1>
					        <p class="post-meta entry-meta">
					        <?php if (!Sili::$app->request->get('filter')['category']): ?>
					            <span class="post-category" style='padding-left: 0px;'><a href="/project/view/id/<?= $value['id'] ?>" title="View all posts in Fine Arts" rel="category tag"><?= $value['dataType'] == 'designStartegy' ? 'DESIGN STRATEGY' : 'STRATEGIC FORESIGHT' ?></a></span>
					        <?php endif ?>
					        </p>
					        <div class="entry-content" itemprop="articleBody">
					        </div>
					    </div>
					</article>
				<?php endforeach ?>
			<?php else: ?>
				<h2>No results</h2>
			<?php endif ?>
			



		</div>
	</div>

<?php 
	
	$students = [];
	$last = '';
	if ($projects) {
		foreach ($projects as $key => $value) {
			if ($value['students']) {
				foreach (explode(',', $value['students']) as $student) {
					if ($student) {
						if (strpos($student, 'Jr') !== false) {
							$students[$last.' Jr'] = $value['id'];
							unset($students[$last]);
							continue;
						}
						$last = trim($student);
						$students[$last] = $value['id'];
					}
					
				}
			}
		}
	}

	ksort($students);


?>

	  <aside id="sidebar">

        <div id="text-6" class="widget widget_text">
            <div class="textwidget">
                <div class="upw-content">
                    <p class="post-title">
						<?php if ($students): ?>
							<?php foreach ($students as $stKey => $st): ?>
								<?php if (trim($stKey)): ?>
									<li><a href="/project/view/id/<?= $st ?>"><?= $stKey ?></a></li>
								<?php endif ?>
							<?php endforeach ?>
						<?php endif ?>
                    </p>
                   
                </div>
            </div>
        </div>
    </aside>
</div>