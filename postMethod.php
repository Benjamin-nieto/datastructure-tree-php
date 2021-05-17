<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['name'];
    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo "Valor que llego: ".$name;
      error_log("Valor que llego: ".$name);
    }
  }

?>