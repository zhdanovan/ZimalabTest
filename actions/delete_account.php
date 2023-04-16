<?php
// Подключение файлов настроек и конфигурации
require_once '../config/path.php';
require_once ROOT_PATH . '/config/config.php';
require_once '../classes/Account.php';

// Получение ID аккаунта
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (!$id) {
    die("ID аккаунта не указан.");
}

$account = new Account("", "", "");
// Удаление аккаунта по ID
$account->deleteAccount($id);

// Перенаправление на главную страницу после успешного удаления аккаунта
header('Location: ' . BASE_URL . '/index.php');
exit;
?>