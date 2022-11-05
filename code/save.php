<?php
    session_start();
	if (!empty($_SESSION['surname'])) {
		echo $_SESSION['surname'];
        echo ' ';
        echo $_SESSION['name'];
        echo ' ';
        echo $_SESSION['age'];
	}
    else {
        echo 'Недостаточно данных.';
    }
?>