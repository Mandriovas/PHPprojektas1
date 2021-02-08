<?php 

	if(isset($_POST['submit'])){


		session_start();

		$_SESSION['name'] = $_POST['name'];

		header('Location: index.php');
	}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Prisijungimas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include ('template/header.php'); ?>

    <section class="container grey-text">
        <br>
        <h4 class="center">Prisijungti</h4>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="text" name="name">
            <input type="submit" name="submit" value="Prisijungti" class="btn brand z-depth-0 prisijungti">
        </form>

        <?php include ('template/footer.php'); ?>
    </section>
</body>

</html>
