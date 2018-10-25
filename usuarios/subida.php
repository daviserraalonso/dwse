<?php

require('../upload/upload.php');
$archivo = new Upload('archivo');
$archivo->setPolicy(Upload::POLICY_KEEP);
$archivo->setTarget('./../../../privado/');
$archivo->setName($_POST['nombre']);
$r = $archivo->upload();

$url = 'index.php';
header('Location: ' . $url);