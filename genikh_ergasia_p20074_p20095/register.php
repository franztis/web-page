<?php


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

		if(isset($_POST['apostolh']))
            {//QUERY SAVE


            	$name = $_POST['name'];
            	$lname = $_POST['lname'];
            	$title=$_POST['myradio'];
            	$email = $_POST['email'];
            	$num=$_POST['number'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $conf=$_POST['confirm_password'];
                if(isset($_POST['terms'])){
                	$terms="agree";
                }
               
            	else{
            		$terms="disagree";
            	}


               if (empty($name)||empty($lname)||empty($email)||empty($num)||empty($username)||empty($password)||empty($conf)|| !isset($title)) {
					

					echo "<script type='text/javascript'>alert('Συμπληρώστε όλα τα πεδία με αστερίσκο.');window.location.href='forma.html';</script>";
				}
				/*elseif ($password!=$conf) {
					
               				echo "<script type='text/javascript'alert('Πληκτρολογήστε τον σωστό κωδικό στο πεδίο confirm password!');window.location.href='forma.html';</script>";
               			}*/
						
				
				else{
               			
							$sql = " INSERT INTO `telikh` (`name`, `lname`,`title`,`email`,`number`,`username`,`password`,`terms`) VALUES ('$name','$lname','$title','$email','$num','$username','$password','$terms');";	
		
							//εκτέλεση ερωτήματος στη βάση
							$result = mysqli_query($conn, $sql);
							echo "<script type='text/javascript'>alert('Επιτυχής εγγραφή!');window.location.href='login_form.html';</script>";
		               	
           			}

			//κλείσιμο σύνδεσης
			//mysqli_close($conn);
	}

}
?>