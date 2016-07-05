<!DOCTYPE html>
<html>
	<head>
		<title><?php $pageTitle ?></title>
		<script src='https://code.jquery.com/jquery-2.2.1.min.js' type='text/javascript'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type='text/css'>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js' type='text/javascript'></script>
		<link rel="stylesheet" href="/assets/styles/main.css">
	</head>
	<body>
	<div id="log" style='width: 200px; height 200px;'></div>
	<div id="headerwrap">
		<header id="header" style='height: 50px;' class="pagewidth">
		    <hgroup>
		        <div id="site-logo" style='width: 100%;'>
		            <a href="http://www.cca.edu" title="Graduate Thesis Work 2014" style='background: url(/assets/images/img.jpg) no-repeat left center; background-size: 100%; height: 40px;display: block;float: right;width: 324px;'></a>
		            <h1 style='font-size: 30px;margin-top: -13px;font-weight: bold; text-transform: none; float: left;'><a href="/" style='font-family: inherit; font-weight: inherit;' class='ght'>DMBA Graduate Thesis Work <?php if(Sili::$app->request->get('filter')['year']) {echo Sili::$app->request->get('filter')['year'];}else{echo '2016';}; ?></a></h1>
		        </div>
		    </hgroup>
		    <div id="main-nav-wrap">
		        <div id="menu-icon" class="mobile-button"></div>
		        <nav>
		            <ul id="main-nav" style='top: 60px;' class="main-nav">
		                <li class="menu-item menu-item-type-post_type menu-item-object-page filter" data-attr='category' data-value='2'><a style='padding-left: 0;' fa-link  class='menu-item-a ds <?= Sili::$app->request->get('filter')['category'] == '2' ? 'active' : '' ?>' >DESIGN STRATEGY</a></li>
		                <li class="menu-item menu-item-type-post_type menu-item-object-page filter" data-attr='category' data-value='1'><a class='menu-item-a sf <?= Sili::$app->request->get('filter')['category'] == '1' ? 'active' : '' ?>' >STRATEGIC FORESIGHT</a></li>
		                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a>Archives</a>
		                    <ul class="filter-by-year sub-menu">
			                    <li class="menu-item menu-item-type-custom menu-item-object-custom filter" data-attr='year' data-value='2016'><a href="">2016</a></li>
			                    <li class="menu-item menu-item-type-custom menu-item-object-custom filter" data-attr='year' data-value='2015'><a href="">2015</a></li>
		                        <li class="menu-item menu-item-type-custom menu-item-object-custom filter" data-attr='year' data-value='2014'><a href="">2014</a></li>
			                    <li class="menu-item menu-item-type-custom menu-item-object-custom filter" data-attr='year' data-value='2013'><a href="">2013</a></li>
		                        <li class="menu-item menu-item-type-custom menu-item-object-custom filter" data-attr='year' data-value='2012'><a href="">2012</a></li>
			                    <li class="menu-item menu-item-type-custom menu-item-object-custom filter" data-attr='year' data-value='2011'><a href="">2011</a></li>
			                    <li class="menu-item menu-item-type-custom menu-item-object-custom filter" data-attr='year' data-value='2010'><a href="">2010</a></li>
		                    </ul>
		                </li>
		                <input type="text" placeholder='Search' id='search_inp' style='float: right;background: #eaeaea; height: 10px; width: 305px;' value='<?= isset(Sili::$app->request->get('filter')['text']) ? Sili::$app->request->get('filter')['text'] : '' ?>'>
		            </ul>
		            <!-- /#main-nav -->
		        </nav>
		    </div>
		    <!-- /#main-nav-wrap -->
		</header>
	</div>
	<script>
		$(document).on('click', '.filter a', function(event) {
			event.preventDefault();
			var name = $(this).parent().data('attr'),
				value = $(this).parent().data('value');

			$('#'+name).val(value);
			$('#filterForm').submit();
		});
		$('#search_inp').keypress(function(event) {
			event.keyCode == 13 ? $('#text_inp').val($(this).val()).parent('form').submit() : $('#text_inp').val($(this).val());
		});	
	</script>
	<form style='display: none;' id='filterForm' action="/">
		<input type="text" name='filter[year]' id='year' value='<?= isset(Sili::$app->request->get('filter')['year']) ? Sili::$app->request->get('filter')['year'] : '' ?>'>
		<input type="text" name='filter[category]' id='category' value='<?= isset(Sili::$app->request->get('filter')['category']) ? Sili::$app->request->get('filter')['category'] : '' ?>'>
		<input type="text" name='filter[text]' id='text_inp' value='<?= isset(Sili::$app->request->get('filter')['text']) ? Sili::$app->request->get('filter')['text'] : '' ?>'>
	</form>


	<div id="body" class="clearfix">
		<?= $content ?>		
	</div>

	<input type='hidden' name='query_inp'>
	<h6 style='text-align: center;'>© 2016 California College of the Arts, unless otherwise noted</h6>
	</body>
</html>