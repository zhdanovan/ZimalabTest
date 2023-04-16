<?php
// Подключение файлов настроек и конфигурации
require_once 'config/path.php';
require_once ROOT_PATH . '/config/config.php';
// Подключение файла класса Account
require_once ROOT_PATH . '/classes/Account.php';

// Установка количества элементов на странице
$items_per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($page - 1) * $items_per_page;

// Обработка формы поиска
$search_param = isset($_GET['search_param']) ? $_GET['search_param'] : '';
$search_value = isset($_GET['search_value']) ? $_GET['search_value'] : '';

if (!empty($search_param) && !empty($search_value)) {
    $accounts = Account::searchAccounts($search_param, $search_value);
    $search_results = true;
} else {
    // Получение списка аккаунтов с заданным смещением и количеством элементов на странице
    $accounts = Account::getAccounts($offset, $items_per_page);
    $search_results = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Список аккаунтов</title>
</head>

<body>
    <div class="container">
        <!-- Заголовок и ссылка для добавления аккаунта -->
        <h1>Список аккаунтов</h1>
        <a href="actions/add_account.php" class="add-account">Добавить аккаунт</a>
        <!-- Форма поиска -->
        <form action="" method="GET" class="search-form">
            <label for="search_param">Параметр поиска:</label>
            <select name="search_param" id="search_param">
                <option value="first_name">First Name</option>
                <option value="last_name">Last Name</option>
                <option value="email">Email</option>
                <option value="company_name">Company Name</option>
                <option value="position">Position</option>
                <option value="phone1">Phone 1</option>
                <option value="phone2">Phone 2</option>
                <option value="phone3">Phone 3</option>
            </select>
            <label for="search_value">Значение:</label>
            <input type="text" name="search_value" id="search_value" value="<?= htmlspecialchars($search_value) ?>"
                required>
            <input type="submit" value="Поиск">
            <button type="button" class="reset-search" onclick="location.href='index.php';">Сбросить поиск</button>
        </form>
        <!-- Таблица для отображения списка аккаунтов -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Position</th>
                    <th>Phone 1</th>
                    <th>Phone 2</th>
                    <th>Phone 3</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td>
                            <?= $account['id'] ?>
                        </td>
                        <td>
                            <?= $account['first_name'] ?>
                        </td>
                        <td>
                            <?= $account['last_name'] ?>
                        </td>
                        <td>
                            <?= $account['email'] ?>
                        </td>
                        <td>
                            <?= $account['company_name'] ?>
                        </td>
                        <td>
                            <?= $account['position'] ?>
                        </td>
                        <td>
                            <?= $account['phone1'] ?>
                        </td>
                        <td>
                            <?= $account['phone2'] ?>
                        </td>
                        <td>
                            <?= $account['phone3'] ?>
                        </td>
                        <!-- Ссылки на действия с аккаунтом (редактирование и удаление) -->
                        <td>
                            <a href="actions/edit_account.php?id=<?= $account['id'] ?>" class="edit-btn">Редактировать</a>
                            <a href="actions/delete_account.php?id=<?= $account['id'] ?>" class="delete-btn" onclick="return confirm('Вы уверены, что хотите удалить этот аккаунт?')">Удалить</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <!-- Выводим список аккаунтов -->
        </table>
        <?php
        // Получение общего количества аккаунтов
        $total_accounts = $conn->query('SELECT COUNT(*) FROM accounts')->fetchColumn();
        // Вычисление общего количества страниц
        $total_pages = ceil($total_accounts / $items_per_page);
        // Отображение пагинации, если количество страниц больше одной
        if ($total_pages > 1) {
            echo '<div class="pagination">';
            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . '">Prev</a>';
            }
            // Вывод номеров страниц
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i === $page) {
                    echo '<span class="current">' . $i . '</span>';
                } else {
                    echo '<a href="?page=' . $i . '">' . $i . '</a>';
                }
            }
            // Отображение ссылки "Next", если текущая страница не последняя
            if ($page < $total_pages) {
                echo '<a href="?page=' . ($page + 1) . '">Next</a>';
            }
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>