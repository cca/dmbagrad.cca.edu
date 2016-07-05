<html>
	<head>
		<title><?= $pageTitle ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type='text/css'>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' type='text/javascript'></script>
	</head>
	<body style='background: url("/assets/images/background.png")'>
		<nav class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Cca</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="/admin">CCA</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li <?=  $this->config->route['controllerId'] == 'MainController' ? 'class="active"' : '' ?>><a href="/admin">All projects</a></li>
	            <li <?=  $this->config->route['controllerId'] == 'TrashController' ? 'class="active"' : '' ?>><a href="/admin/trash">Deleted</a></li>
	            <li ><a href="/setdata">Update Data </a></li>
	            <li><a href="/admin?logout=true">Logout <span class="sr-only">(current)</span></a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
		<div class="container" style='margin-top: 50px;'>
			<?= $content ?>
		</div>
	</body>
</html>