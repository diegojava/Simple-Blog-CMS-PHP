<?php

$connect = mysqli_connect("localhost", "pltcmthz_igualagob", "Iguala!123.") or die("Could not connect to server!");
mysqli_select_db($connect, "pltcmthz_igualagob") or die("Could not connect to database!");

$BASE_URL = "http://iguala.gob.mx/admin/";
?>