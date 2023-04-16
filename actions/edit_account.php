<?php
// Подключаем файлы конфигурации и класс Account
require_once '../config/path.php';
require_once ROOT_PATH . '/config/config.php';
require_once '../classes/Account.php';

// Получаем ID аккаунта из запроса
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (!$id) {
    die("ID аккаунта не указан.");
}

if (isset($_POST['submit'])) {
    // Получаем данные из формы
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $position = $_POST['position'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $phone3 = $_POST['phone3'];

    // Создаем новый объект аккаунта с полученными данными
    $account = new Account($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
    // Редактируем аккаунт
    $account->editAccount($id);
    // Перенаправляем на главную страницу
    header('Location: ' . BASE_URL . '/index.php');
    exit;
}

$sql = "SELECT * FROM accounts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->execute();
$account = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$account) {
    die("Аккаунт не найден.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/style.css">
    <title>Редактировать аккаунт</title>
</head>

<body>
    <div class="container">
        <h1>Редактировать аккаунт</h1>
        <form action="" method="post">
            <!-- Выводим поля формы с предзаполненными данными аккаунта -->
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" value="<?= $account['first_name'] ?>" required>
            <br>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" value="<?= $account['last_name'] ?>" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $account['email'] ?>" required>
            <br>
            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" id="company_name" value="<?= $account['company_name'] ?>">
            <br>
            <label for="position">Position:</label>
            <input type="text" name="position" id="position" value="<?= $account['position'] ?>">
            <br>
            <label for="phone1">Phone 1:</label>
            <input type="text" name="phone1" id="phone1" value="<?= $account['phone1'] ?>">
            <br>
            <label for="phone2">Phone 2:</label>
            <input type="text" name="phone2" id="phone2" value="<?= $account['phone2'] ?>">
            <br>
            <label for="phone3">Phone 3:</label>
            <input type="text" name="phone3" id="phone3" value="<?= $account['phone3'] ?>">
            <br>
            <button type="submit" name="submit">Сохранить изменения</button>
            <button type="button" onclick="window.history.back()">Отмена</button>
        </form>
    </div>
</body>

</html>