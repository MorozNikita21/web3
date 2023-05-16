<?php
header('Content-Type: text/html; charset=UTF-8');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (!empty($_GET['save'])) {

    print('Результаты были сохранены');
  }

  include('form.php');

  exit();
}

$errors = FALSE;
if (empty($_POST['name'])) {
  print('Как вас зовут? <br/>');
  $errors = TRUE;
}

if (empty($_POST['birthdayear']) || !is_numeric($_POST['birthdayear']) || !preg_match('/^\d+$/', $_POST['birthdayear'])) {
  print('В каком году вы родились? <br/>');
  $errors = TRUE;
}

if (empty($_POST['email']) || !preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u',$_POST['email'])) {
  print('Напишить свой e-mail <br/>');
  $errors = TRUE;
}

if (empty($_POST['gen']) || ($_POST['gen']!='m' && $_POST['gen']!='w')) {
  print('Какого вы пола? <br/>');
  $errors = TRUE;
}
if (empty($_POST['body']) || ($_POST['body']!='5' && $_POST['body']!='4' && $_POST['limbs']!='0' )) {
  print('Сколько у вас конечностей? <br/>');
  $errors = TRUE;
}

if (empty($_POST['biographiya']) || !preg_match('/^([0-9a-zA-Zа-яА-Я\,\.\s]{1,})$/', $_POST['biographiya']) ){
  print('Напишите про себя <br/>');
  $errors = TRUE;
}

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (!empty($_GET['save'])) {

    print('Результаты были сохранены');
  }

  include('form.php');

  exit();
}

$errors = FALSE;
if (empty($_POST['name'])) {
  print('Как вас зовут? <br/>');
  $errors = TRUE;
}

if (empty($_POST['birthdayear']) || !is_numeric($_POST['birthdayear']) || !preg_match('/^\d+$/', $_POST['birthdayear'])) {
  print('В каком году вы родились? <br/>');
  $errors = TRUE;
}

if (empty($_POST['email']) || !preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u',$_POST['email'])) {
  print('Напишите свой e-mail <br/>');
  $errors = TRUE;
}

if (empty($_POST['gen']) || ($_POST['gen']!='m' && $_POST['gen']!='w')) {
  print('Какого вы пола? <br/>');
  $errors = TRUE;
}
if (empty($_POST['body']) || ($_POST['body']!='0' && $_POST['body']!='5' && $_POST['body']!='4')) {
  print('Сколько у вас конечностей? <br/>');
  $errors = TRUE;
}

if (empty($_POST['biographiya']) || !preg_match('/^([0-9a-zA-Zа-яА-Я\,\.\s]{1,})$/', $_POST['biographiya']) ){
  print('Напишите про себя <br/>');
  $errors = TRUE;
}
if (empty($_POST['ability'])) {
  print('Какие бы вы хотели суперспособности? <br/>');
  $errors = TRUE;
}

if ($errors) {
  exit();
}

$user = 'u54409';
$pass = '3113126';
$db = new PDO('mysql:host=localhost;dbname=u54409', $user, $pass, [PDO::ATTR_PERSISTENT => true]);

try {
  $stmt = $db->prepare("INSERT INTO forma SET name = ?, email=?, birthday=?, sex=?, biographiya=?, limbs=?");
 # var_dump($_POST);
  $stmt -> execute([$_POST['name'], $_POST['email'],$_POST['birthdayear'],$_POST['gen'], $_POST['biographiya'],$_POST['body'] ]);
  $app_id = $db->lastInsertId();
  $stmt = $db->prepare("INSERT INTO abforma SET a_id= ?, app_id=?");
  foreach ($_POST['ability'] as $ability) {
    $stmt->execute([$ability, $app_id]);
  }
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

header('Location: ?save=1');