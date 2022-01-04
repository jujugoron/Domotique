<?php
//$formation = json_decode(file_get_contents("http://192.168.1.81/api/93C230E27A/sensors/4/"));
$formation = json_decode(file_get_contents("http://192.168.137.49/api/93C230E27A/sensors/4/"));
print_r($formation);

ob_start();
?>

<h1> Welcome </h1>
<?php
$content = "<h1> test </h1>";
require_once("template.php");
