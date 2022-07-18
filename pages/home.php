<?php
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
    header('Location: /');
}
?>

<?php
    require_once("../layouts/header.php");
    require_once("../layouts/nav.php");
?>

<?php
include("../config/db-card.php");
?>


<style type="text/css">
	.card-container {
		width: 55rem;
		height: 50rem;
	} 

	


</style>
<body>


		<div class="container min-vh-100 p-5">
			<h1 class="mb-3 mt-3" >Welcome to my Blog</h1>
				<div class="row">
					<div>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить статью</button>
					</div>
						<?php foreach ($rows as $cardarticle ) { ?>
							<div class="card pt-3 m-3 card-container">
							<img src="<?php echo $cardarticle["img"]; ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?php echo $cardarticle["title"]; ?></h5>
									<p class="card-text"><?php echo $cardarticle["description"]; ?></p>
									<span class="date"><?php echo date("d.m.Y в H:i",  strtotime($cardarticle["date"])); ?></span>
								</div>
						</div>
						<?php }?>
				</div>
		</div>
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <form action="./createUserArticle.php" method="post" enctype="multipart/form-data">
		      	<div class="modal-body">
		        	<input type="text" name="title" class="form-control">
		        	<input type="file" name="img" class="form-control">
		        	<input type="date" name="date" class="form-control">
		          	<textarea class="form-control" name="description"></textarea>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
		        <button type="submit" class="btn btn-primary">Создать пост</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>
</body>

<?php require '../layouts/footer.php'; ?>

<script type="text/javascript">
$(".card-container").click(function() {
	// body... 
	$(this).toggleClass("active")
})

</script>
</html>


