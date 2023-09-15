<?php 
session_start();
if(isset($_SESSION['username'])) {
 header('Location:programme.html');
}
else{
	echo "<script type='text/javascript'>window.location.href='login_form.html';alert('Κάντε login για να έχετε πρόσβαση στη σελίδα του προγράμματος του συνεδρίου.');</script>";
}
?>