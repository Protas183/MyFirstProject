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
						<a href="../validation-form/uploadUserArticle.php" class="btn btn-primary">Добавить статью</a>
					</div>
						<div class="card pt-3 m-3 card-container">
							<img src="<?php echo $cardarticle["img"]; ?>" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title"><?php echo $cardarticle["title"]; ?></h5>
									<p class="card-text"><?php echo $cardarticle["text"]; ?></p>
									<span class="date"><?php echo date("d.m.Y в H:i",  strtotime($cardarticle["date"])); ?></span>
								</div>
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


