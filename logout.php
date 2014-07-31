<?php

$pagina = $_GET['p'];
session_start();
session_destroy();

echo'<script> location.href="'.$pagina.'" </script>';

