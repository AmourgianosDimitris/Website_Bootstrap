<!DOCTYPE html>
<html>
<head>
	<title>Φόρμα Καταχώρησης Κρατήσεων</title>
	<!-- Αμουργιανός Δημήτρης - Π16003 -->

	<meta charset="utf-8">

	<link rel="stylesheet" href="css/style.css">

</head>
<body>

	<br>
	<form action="lab6-p16003.php" method="post">
	<fieldset style="border-radius: 5px; background-color: #f2f2f2; padding: 30px; width: 50%; margin:auto;">

		<legend style="background-color: grey; color: white;"> Φόρμα Καταχώρησης Κρατήσεων </legend>

		<label for="firstname"> Ονοματεπώνυμο (Εισάγετε ΜΟΝΟ λατινικούς χαρακτήρες): </label>
   		<input type="text" id="fullname" name="fullname" pattern="^[A-Za-z]+$" class="input_style"><br>

   		<label for="username"> Username (Εισάγετε ΜΟΝΟ λατινικούς χαρακτήρες): </label>
   		<input type="text" id="username" name="username" pattern="^[A-Za-z]+$" class="input_style"><br>

   		<label for="password"> Password (Εισάγετε ΜΟΝΟ λατινικούς χαρακτήρες): </label>
   		<input type="password" id="user_password" name="user_password" pattern="^[A-Za-z]+$" class="input_style"><br>

   		<label> E-mail: </label> 
		<input placeholder="example@unipi.gr" type="email" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}"  class="input_style"><br>

		<label> Ημερομηνία Γέννησης: </label>
		<input type="date" name="bday" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" class="input_style, date_input">

		
		<label> Ηλικία: </label>
		<select name="age" id="age">
			<?php 

				for($i=1;$i<=100;$i++){					
					echo '<option value="'.$i.'">'.$i.'</option>';
	 			};

			?>

  		</select><br>
		
		<label> Διεύθυνση: </label> 
		<input placeholder="Karaoli & Dimitriou 80 Pireas, 18534" type="address" name="address" id="address" class="input_style" pattern="[A-Za-z0-9\s,-&]+,\s[0-9]{5}"><br>

		
		<label> Τρόπος Πληρωμής: </label><br>
		<input type="radio" name="payment" id="payment" value="pay_on_delivery" class="payment" > Αντικαταβολή <br>
		<input type="radio" name="payment" id="payment" value="credit_card" class="payment" > Πιστωτική / Χρεωστική <br>
		<input type="radio" name="payment" id="payment" value="paypal" class="payment" > PayPal <br>
	 
		<label> Σχόλια: </label> 
		<textarea placeholder="Γράψτε εδώ τα σχόλια σας..." type="question" name="comments" id="comments" rows="3" cols="30"></textarea><br>

		<input type="submit" name="insert" value="Αποστολή" class="button_style" /> 
		<input type="submit" name="select" value="Εμφάνιση" class="button_style" >
		<button type="reset" value="Καθαρισμός" class="button_style" > Καθαρισμός </button> 
		

	</fieldset>
	</form>

	<?php		

		function Insert() {

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "p16003";

			// Δημιουργίασύνδεσης
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			// Έλεγχοςσύνδεσης
			if (!$conn) {

				die("Connection failed: " . mysqli_connect_error());
			}


			$fullname = $username = $user_password = $email = $bday = $age = $address = $payment = $comments = "";

			$fullname = $_POST['fullname'];
			$username = $_POST['username'];
			$user_password = $_POST['user_password'];
			$email = $_POST['email'];
			$bday = $_POST['bday'];
			$age = $_POST['age'];
			$address = $_POST['address'];
			$payment = $_POST['payment'];
			$comments = $_POST['comments'];

			$sql = "INSERT INTO payment_form (fullname, username, user_password, email, birthday, age, address, payment, comments) 
			VALUES ('".$fullname."', '".$username."', '".$user_password."', '".$email."', '".$bday."', '".$age."', '".$address."', '".$payment."', '".$comments."')";

			if ($conn->query($sql) === TRUE) {
	    		echo '<br>
						<form>
							<fieldset style="border-radius: 5px; background-color: #f2f2f2; padding: 30px; width: 50%; margin:auto;"><h2>New record created successfully</h2> </fieldset> </form>';
			} else {
	    		echo "<h2>Error: " . $sql . "<h2><br>" . $conn->error;
			}

			$fullname = $username = $user_password = $email = $bday = $age = $address = $payment = $comments = "";

		}

		function Select(){

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "p16003";

			// Δημιουργία σύνδεσης
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			// Έλεγχος σύνδεσης
			if (!$conn) {

				die("Connection failed: " . mysqli_connect_error());
			}

			$result = $row = $username = $email = "";

			$username = $_POST['username'];
			$email = $_POST['email'];

			if ($username != "") {
				$sql = "SELECT * FROM payment_form WHERE username = '".$username."'";
				$result = $conn->query($sql);
			} elseif ($email != "") {
				$sql = "SELECT * FROM payment_form WHERE email = '".$email."'";
				$result = $conn->query($sql);
			} else {
				echo '<br>
						<form>
							<fieldset style="border-radius: 5px; background-color: #f2f2f2; padding: 30px; width: 50%; margin:auto;"><h2> Δεν έχετε βάλει στοιχεία για αναζήτηση! </h2> </fieldset> </form>';
			}

			// $sql = "SELECT * FROM payment_form WHERE username = '".$username."'";
			
			if ($result != "") {
				
				if ($result-> num_rows > 0) {
				echo '<br>
						<form>
							<fieldset style="border-radius: 5px; background-color: #f2f2f2; padding: 30px; width: 50%; margin:auto;">
							<table align="center">';
				echo '<tr>
						<th>fullname</th>
						<th>Username</th>
						<th>User Password</th>
						<th>E-mail</th>
						<th>Birthday</th>
						<th>Age</th>
						<th>Address</th>
						<th>Payment</th>
						<th>Comments</th></tr>';

				while ($row = $result-> fetch_assoc()) {
					echo "<tr><td>".$row["fullname"]."</td><td>".$row["username"]."</td><td>".
						$row["user_password"]."</td><td>".
						$row["email"]."</td><td>".
						$row["birthday"]."</td><td>".
						$row["age"]."</td><td>".
						$row["address"]."</td><td>".
						$row["payment"]."</td><td>".
					    $row["comments"]."</td></tr>";
					
				}
				echo "</table> </fieldset> </form>";
			} else {
				echo '<br>
						<form>
							<fieldset style="border-radius: 5px; background-color: #f2f2f2; padding: 30px; width: 50%; margin:auto;"><h2> Δεν υπάρχει καμία καταχώριση με αυτά τα στοιχεία! </h2> </fieldset> </form>';
			}

		}

			}
			

		if ( isset($_POST['insert']) ) { Insert(); }

		if ( isset($_POST['select']) ) { Select(); }
		
		

	?>
	
</body>
</html>
