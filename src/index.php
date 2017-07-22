<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: poroszkaiattila
 * Date: 2017.07.20.
 * Time: 14:33
 */

//require '../vendor/autoload.php';
//
//use Convert\Convert;

require 'Convert.php';

$convert = new Convert();
$convert->setString((isset($_POST['string'])) ? $_POST['string'] : '');
$convert->execute();
$result = $convert->getResult();


require 'template/cover.phtml';
?>
