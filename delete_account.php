<?php
require_once 'config.php';
require_once 'Account.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (!$id) {
    die("ID аккаунта не указан.");
}

$account = new Account("", "", "");
$account->deleteAccount($id);

header("Location: index.php");
exit;
?>
