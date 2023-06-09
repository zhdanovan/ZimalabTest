<?php
// Подключение файлов настроек и конфигурации
require_once '../config/path.php';
require_once ROOT_PATH . '/config/config.php';
require_once '../classes/Account.php';

$error = '';

// Обработка отправленной формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $position = $_POST['position'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $phone3 = $_POST['phone3'];

    // Валидация данных
    if (empty($first_name) || empty($last_name) || empty($email)) {
        $error = 'First name, last name и email являются обязательными полями.';
    } else {
        // Создание аккаунта и добавление его в базу данных
        $account = new Account($first_name, $last_name, $email, $company_name, $position, $phone1, $phone2, $phone3);
        $account->addAccount();
        // Перенаправление на главную страницу после успешного добавления аккаунта
        header('Location: ' . BASE_URL . '/index.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/style.css">
    <title>Добавить аккаунт</title>
</head>
<body>
    <div class="container">
        <h1>Добавить аккаунт</h1>
        <?php if ($error): ?>
            <p class="error">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>
        <!-- Форма добавления аккаунта -->
        <form action="" method="post" class="form-container">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name">

            <label for="position">Position:</label>
            <input type="text" id="position" name="position">

            <label for="phone1">Phone 1:</label>
            <input type="text" id="phone1" name="phone1">

            <label for="phone2">Phone 2:</label>
            <input type="text" id="phone2" name="phone2">

            <label for="phone3">Phone 3:</label>
            <input type="text" id="phone3" name="phone3">
            <input type="submit" value="Добавить аккаунт">
            <button type="button" class="cancelbtn" onclick="window.history.back()">Отмена</button>
        </form>
    </div>
</body>
</html>