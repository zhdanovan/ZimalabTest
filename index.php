<?php
require_once 'config.php';
require_once 'Account.php';

$items_per_page = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($page - 1) * $items_per_page;

$accounts = Account::getAccounts($offset, $items_per_page);
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
        <h1>Список аккаунтов</h1>
        <a href="add_account.php">Добавить аккаунт</a>
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
                        <td><?= $account['id'] ?></td>
                        <td><?= $account['first_name'] ?></td>
                        <td><?= $account['last_name'] ?></td>
                        <td><?= $account['email'] ?></td>
                        <td><?= $account['company_name'] ?></td>
                        <td><?= $account['position'] ?></td>
                        <td><?= $account['phone1'] ?></td>
                        <td><?= $account['phone2'] ?></td>
                        <td><?= $account['phone3'] ?></td>
                        <td>
                            <a href="edit_account.php?id=<?= $account['id'] ?>">Edit</a> |
                            <a href="delete_account.php?id=<?= $account['id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        // Generate pagination links
        $total_accounts = $conn->query('SELECT COUNT(*) FROM accounts')->fetchColumn();
        $total_pages = ceil($total_accounts / $items_per_page);
        if ($total_pages > 1) {
            echo '<div class="pagination">';
            if ($page > 1) {
                echo '<a href="?page='.($page - 1).'">Prev</a>';
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i === $page) {
                    echo '<span class="current">'.$i.'</span>';
                } else {
                    echo '<a href="?page='.$i.'">'.$i.'</a>';
                }
            }
            if ($page < $total_pages) {
                echo '<a href="?page='.($page + 1).'">Next</a>';
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
