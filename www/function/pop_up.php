<?php
	function pop_up($message) {
		echo "<div class='container' id='alert' style='display: block;'><div class='row'><div class='col-sm alert bg-dark text-warning' role='alert'><i class='fas fa-info-circle'></i> " . $message . "<i class='far fa-times-circle text-danger float-right mt-1' style='cursor: pointer;' onclick='close_pop_up();'></i></div></div></div>";
	}
?>
