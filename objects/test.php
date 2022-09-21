<?php
$out[] = json_decode(file_get_contents('php://input'));
$out[] = 100;
$out[] = $_POST;
echo json_encode($out);