<?php
session_start();
foreach ($_POST as $k => $v) {
    if ((int)$v == 0 || $v < 0 || !is_numeric($v)) continue;
    if (!isset($_SESSION['cart'][$k])) {
        $_SESSION['cart'][$k] = 0;
    }
    $_SESSION['cart'][$k] += (int)$v;
}
header("Location: ../cart.php");
exit;