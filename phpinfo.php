<?php

$to = "claire88veiniere@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: claire88veiniere@gmail.com";

mail($to,$subject,$txt,$headers);

phpinfo();
?>