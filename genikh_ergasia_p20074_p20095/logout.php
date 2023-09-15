<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['password'])&&($_SESSION['userobj'])){
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['userobj']);
	echo "<script type='text/javascript'>alert('Επιτυχές Logout!');window.location.href='login_form.html';</script>";
	}
else{
	echo "<script type='text/javascript'>alert('Πρέπει να συνδεθείτε πρώτα για να κάνετε  Logout!');window.location.href='login_form.html';</script>";


}
?>