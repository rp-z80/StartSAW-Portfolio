<?php

	$conn = new mysqli("localhost", "S4675079", "scooby-doo90210", "S4675079");

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);

?>