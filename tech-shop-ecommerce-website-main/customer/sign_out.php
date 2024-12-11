<?php
    require_once 'includes/connect.php';
    session_destroy();
    header("Location: home.php");