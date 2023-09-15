<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "telikh";

		// Δημιουργία σύνδεσης
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Έλεγχος σύνδεσης
		if (!$conn) {
			 die("Connection failed: " . mysqli_connect_error());
			}

		//ορισμός charset της σύνδεσης ώστε να παρουσιάζονται τα ελληνικά σωστά
		mysqli_set_charset($conn, "utf8");

		if(isset($_POST['login']))
            {//QUERY SAVE
                $username = $_POST['username'];
                $password = $_POST['password'];
               
               //Δημιουργία ερωτήματος
				$sql = "SELECT * FROM `telikh` WHERE `username` = '$username' AND `password`='$password'";
				//εκτέλεση ερωτήματος στη βάση
				$query = mysqli_query($conn, $sql);
              
               
               if(mysqli_num_rows($query) == 1) {
               		$_SESSION['username'] = $username;
            		$_SESSION['password'] = $password;
           			$_SESSION['userobj'] = mysqli_fetch_assoc($query);
           			echo "<script type='text/javascript'>alert('Επιτυχές Login!');window.location.href='programme.html';</script>";
            		exit;
						} 
				else {
            			echo "<script type='text/javascript'>alert('Τα στοιχεία δεν αντιστοιχούν σε χρήστη.Παρακαλώ συμπληρώστε ξανά τα πεδία Username και Password');window.location.href='login_form.html';</script>";
						}

			}

				//κλείσιμο σύνδεσης
				//mysqli_close($conn);


		}
?>