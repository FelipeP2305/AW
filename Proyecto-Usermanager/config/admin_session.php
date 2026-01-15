<?php
require_once 'session.php';

if ($_SESSION['user']['rol'] !== 'admin') {
    header("Location: ../dashboard.php");
    exit;
}
