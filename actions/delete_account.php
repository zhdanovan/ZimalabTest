<?php
require_once '../config/path.php';
require_once ROOT_PATH . '/config/config.php';
require_once '../classes/Account.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (!$id) {
    die("ID аккаунта не указан.");
}

$account = new Account("", "", "");
$account->deleteAccount($id);

header('Location: ' . BASE_URL . '/index.php');
exit;
?>
