<?php
require("functions.php");
require("User.class.php");

$User = new User($mysqli);

if (isset($_SESSION["userId"])){
	//suunan sisselogimise lehele
	header("Location: data.php");
	exit();
}

$loginEmail2 = "";
$loginEmailError = "";
$loginPasswordError = "";

$notice = "";
if(isset($_POST["loginEmail"])){
	if(!empty($_POST["loginEmail"])){
		$_POST["loginEmail"] = $Helper->cleanInput($_POST["loginEmail"]);
		
if (isset($_POST["loginEmail"]) && isset($_POST["loginPassword"]) && 
	!empty($_POST["loginEmail"]) && !empty($_POST["loginPassword"]))
	{
	
	$notice = $User->login($_POST["loginEmail"], $_POST["loginPassword"]);
	$loginEmail2 = $_POST["loginEmail"];
	
} else {
	$loginEmailError = "Sisselogimiseks peab sisestama e-maili";
	$loginPasswordError = "Sisselogimiseks peab sisetama parooli";
}
	}
}
?>

<!DOCTYPE html>
<?php require("header.php");?>

	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
<html>
<head>
	<title>Logi sisse või loo kasutaja</title>
</head>
<body>

	<h1>Logi sisse</h1>
	<form method="POST">
		<p style="color:red;"><?=$notice;?></p>
		<label>E-post</label> <br>
		<div class="form-group">
		<input class="form-control" name="loginEmail" type="text" value="<?=$loginEmail2;?>"> <?php echo $loginEmailError; ?>
		</div>
		<div class="form-group">
		<input class="form-control" name="loginPassword" type="password"> <?php echo $loginPasswordError; ?> <br><br>
		<input class="btn btn-success btn-sm-block visible-xs-block" type="submit" value="Logi sisse">
		<input class="btn btn-success btn-sm hidden-xs" type="submit" value="Logi sisse">
		
	<h2>Loo Kasutaja</h2><br><a href="create_user.php" class="btn btn-success btn-sm hidden-xs" role="button">Vajuta Siia</a><br><br></a></a>
	
	</form
		</div>
</div>
</div>
</div>

</body>
</html>
