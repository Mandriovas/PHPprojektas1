<?php

include('config/db_connect.php');

	$errors = array('email'=>'','title'=>'','ingredients'=>'');
	$email = '';
	$title = '';
	$ingredients = '';

	if (isset($_POST['Submit'])) {

		//check email
		if(empty($_POST['email'])){
			$errors['email'] =  "El.pastas butinas <br />";
		}else{
			$email = $_POST['email'];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'El.pastas netinkamo formato';
			}
		}

		//check title
		if (empty($_POST['title'])) {
			$errors['title'] =  "Pavadinimas butinas <br />";
		}else{
			$title = $_POST['title'];
			if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
				$errors['title'] =  'Pavadinimas turi buti sudarytas is raidziu ir tarpu';
			}
		}

		//check ingredients
		if (empty($_POST['ingredients'])) {
			$errors['ingredients'] =  "Indigridientai butini <br />";
		}else{
			$ingredients = $_POST['ingredients'];
			if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
				$errors['ingredients'] =  'Endigridientai turi buti atskirti kableliais ","';
			}

		}

		if (array_filter($errors)) {

		}else{
			
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

			//create sql
			$sql = "INSERT INTO pizzas (title,email,ingredients) VALUES('$title','$email','$ingredients')";

			//save to db and check
			if (mysqli_query($conn, $sql)) {
				//success
				header('location: index.php');
			}else{
				//error
				echo 'Query Error: ' . mysqli_error($conn);
			}

		}

	} //end of POST check

?>

<!DOCTYPE html>
<html>
<body>
<?php include ('template/header.php'); ?>

<section class="container grey-text">
	<h4 class="center">Prideti nauja pica</h4>
	<form class="white" action="add.php" method="POST">
		<label>Jusu El.pastas : </label>
		<input type="text" name="email" value="<?php echo ($email) ?>">
		<div class="red-text"><?php echo $errors['email']; ?></div>
		<label>Picos pavadinimas : </label>
		<input type="text" name="title" value="<?php echo ($title) ?>">
		<div class="red-text"><?php echo $errors['title']; ?></div>
		<label>Ingredientai (atskirti kableliais) : </label>
		<input type="text" name="ingredients" value="<?php  echo ($ingredients) ?>">
		<div class="red-text"><?php echo $errors['ingredients']; ?></div>
		<div class="center">
			<input type="submit" name="Submit" value="Irasyti" class="btn brand z-depth-0">
		</div>
	</form>
</section>

<?php include ('template/footer.php'); ?>


</body>
</html>