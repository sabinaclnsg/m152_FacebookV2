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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/e158849821.js" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div class="wrapper">
		<div class="box">
			<div class="row row-offcanvas row-offcanvas-left">


				<!-- main right col -->
				<div class="column col-sm-12 col-xs-12" id="main">

					<!-- navbar -->
					<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #3b5998;">
						<a class="navbar-brand" href="#">Facebook</a>
						<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="index.php"><i class="glyphicon glyphicon-home"></i></a>
								</li>
								<li class="nav-item">
									<button type="button" class="btn" data-toggle="modal" data-target="#postModal">Add Post</button>
								</li>
							</ul>
						</div>
						<div class="navbar-collapse collapse order-3 dual-collapse2">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a href="#" class="nav-link" style="padding: 0;"><img src="assets/img/bird_profile.jpg" alt="avatar" style="border-radius: 50%; width: 40px; margin: 5px;"></a>
								</li>
							</ul>
						</div>
					</nav>
					<!-- /top nav -->

					<div>
						<div class="full col-sm-12">
							<?php

							if (!empty($error)) {
								echo "<div class='alert alert-danger' role='alert'>$error</div>";
							}

							?>

							<!-- content -->
							<?php

							showPosts();


							?>
							<!--/row-->

							<!-- footer -->
							<!-- /padding -->
						</div>
						<!-- /main -->

					</div>
				</div>
			</div>

			<!--post modal-->
			<div id="postModal" class="modal fade" tabindex="-1" aria-labelledby="postModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Post in feed</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="index.php?page=homepage" enctype="multipart/form-data" method="POST" id="addPostForm">
							<div class="modal-body pb-1">
								<div class="form-group">
									<textarea class="form-control input-lg" autofocus="" placeholder="Write something..." name="commentaire"></textarea>
								</div>
							</div>
							<div class="">
								<div class="d-flex pt-0 pb-3 pr-3 pl-3">
									<div class="mr-auto">
										<input type="submit" name="submit" class="btn btn-primary btn-sm" value="Publish" form="addPostForm">
									</div>
									<div class="row mr-1">
										<div class="image-upload p-1">
											<label for="file-input">
												<i class="fas fa-camera"></i>
											</label>
											<input type="hidden" name="MAX_FILE_SIZE" value="3300000">
											<input name="postImage[]" id="file-input" type="file" accept="image/*, video/*" multiple>
										</div>
										<a href="" class="p-1"><i class="fas fa-smile"></i></i></a>
										<a href="" class="p-1"><i class="fas fa-map-marker-alt"></i></a>
										<a class="p-1"><i class="fas fa-paste"></i></a>
									</div>
									<div id="file_name"></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>




			<script type="text/javascript">
				/*$(document).ready(function() {
			$('[data-toggle=offcanvas]').click(function() {
				$(this).toggleClass('visible-xs text-center');
				$(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
				$('.row-offcanvas').toggleClass('active');
				$('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
				$('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
				$('#btnShow').toggle();
			});
		});*/

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