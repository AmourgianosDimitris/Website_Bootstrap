<!DOCTYPE html>
<html>
<head>

	<style>
		table, th, td {
			border: 3px solid black;
			border-collapse: collapse;
			width: 30px;
			height: 30px;
		}

		th, td {
			padding: 15px;
		}

		.center {
  			margin: auto;
  			width: 60%;
			padding: 10px;
			display: block;
		}

		.center2 {
			margin: auto;
  			width: 60%;
			padding: 10px;
			z-index: 9;
		}

		/*##############################################################*/
		 {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: block;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 2;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 10%;
  padding: 15px;
  margin: auto;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
} 

	</style>
	
</head>
<body>

	<br>
	
	<h1 class="center">Ο παρακάτω πίνακας χρησιμοποιεί βρόχους επανάληψης</h1>

	
	

	<script>
		function openForm() {
  			document.getElementById("myForm").style.display = "block";
		}

		function closeForm() {
  			document.getElementById("myForm").style.display = "none";
		}

		function table_dis(){
			document.getElementById("table").style.display = "none";
		}
	</script>
<?php
		function html_table($word){
					echo '<br>';

					echo '<table class="center2">';

					for ($j=1;$j<=5;$j++){

						echo '<tr style="background-color: red">';

						for ($i=1;$i<=10;$i++){
							echo '<th id="red">'.$word.'</th>';
						}

						echo '</tr>';

						echo '<tr style="background-color: green">';

						for ($i=1;$i<=10;$i++){
							echo '<th id="green"></th>';
						}

						echo '</tr>';			

					}

					echo '</table>';
				}


		// $sample_word = " ";
		// html_table($sample_word);
				$word_var = "";
				html_table($word_var);

				echo '<script type="text/javascript">openForm();</script>';

				if ($word_var == ""){
					echo '<div class="form-popup" id="myForm">  <form class="form-container"  method="post"><h1>Enter Word</h1><label for="word"><b>Word</b></label>  <input type="word" placeholder="word" name="word" required><br><button type="submit" class="btn cancel" >Enter </button></form></div>';
		

					$word_var = $_POST["word"];
					echo $word_var;
					html_table($word_var);
				}

				
					
				
		
		
		
		if ($word_var != ""){
			echo '<script type="text/javascript">closeForm();</script>';
		}

	?>
</body>
</html>