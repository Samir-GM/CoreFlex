<?php
session_start();
session_destroy();
header("Location: /CoreFlex/index.php");
exit();
