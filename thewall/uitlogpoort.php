<?php

if (!isset($_COOKIE['userid'])) {
    header('Location: indexinlog.php');
}

setcookie('userid','',time() - 3600);
setcookie('hash','',time() - 3600);
header('Location: indexinlog.php');
?>