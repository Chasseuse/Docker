<?php
    session_start();
    echo "<ul>";
	if (!empty($_SESSION['data'])) {
		foreach($_SESSION['data'] as &$data) {
            echo "<li>".$data."</li>";
        }
	}
    else {
        echo 'Недостаточно данных.';
    }
    echo "</ul>";
?>