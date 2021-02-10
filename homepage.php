<?php
require_once('./controllers/addPost_controller.php');
require_once('./controllers/showPosts.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/facebook.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/e158849821.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">



				<!-- main right col -->
				<div class="column col-sm-12 col-xs-12" id="main">

					<!-- top nav -->
					<div class="navbar navbar-blue navbar-static-top">
						<div class="navbar-header">
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="http://usebootstrap.com/theme/facebook" class="navbar-brand logo">b</a>
						</div>
						<nav class="collapse navbar-collapse" role="navigation">
							<form class="navbar-form navbar-left">
								<div class="input-group input-group-sm" style="max-width:360px;">
									<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
									</div>
								</div>
							</form>
							<ul class="nav navbar-nav">
								<li>
									<a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a>
								</li>
								<li>
									<a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
								</li>
								<li>
									<a href="#"><span class="badge">badge</span></a>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
									<ul class="dropdown-menu">
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
										<li><a href="">More</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
					<!-- /top nav -->

					<div class="padding">
						<div class="full col-sm-9">

							<!-- content -->

							<?php
								showPosts();
							?>
							<!--/row-->

							<!-- footer -->

						</div><!-- /col-9 -->
					</div><!-- /padding -->
				</div>
				<!-- /main -->

			</div>
		</div>
	</div>


	<!--post modal-->
	<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					Post in feed
				</div>
				<form action="index.php?page=homepage" enctype="multipart/form-data" method="POST" id="addPostForm">
					<div class="modal-body">
							<div class="form-group">
								<textarea class="form-control input-lg" autofocus="" placeholder="Write something..." name="commentaire"></textarea>
							</div>
					</div>
					<div class="modal-footer">
						<div>
							<ul class="pull-left list-inline">
								<li>
									<div class="image-upload">
										<label for="file-input">
											<i class="fas fa-camera"></i>
										</label>
										<input name="postImage[]" id="file-input" type="file" accept="image/*" multiple>
									</div>
								</li>
								<li><a href=""><i class="fas fa-smile"></i></i></a></li>
								<li><a href=""><i class="fas fa-map-marker-alt"></i></a></li>
								<li><a href=""><i class="fas fa-paste"></i></a></li>
								<li>
									<div id="file_name"></div>
								</li>
							</ul>
							<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Publish" form="addPostForm">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-toggle=offcanvas]').click(function() {
				$(this).toggleClass('visible-xs text-center');
				$(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
				$('.row-offcanvas').toggleClass('active');
				$('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
				$('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
				$('#btnShow').toggle();
			});
		});

		const fileSelector = document.getElementById('file-input');
		fileSelector.addEventListener('change', (event) => {
			const fileList = event.target.files;

			Array.from(fileList).forEach(element => {
				document.getElementById('file_name').innerHTML += element.name + ", ";
				console.log(element.type);
			});
		});
	</script>
</body>

</html>