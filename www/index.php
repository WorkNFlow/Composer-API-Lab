<?php session_start(); ?>

<?php if(isset($_SESSION['name'])): ?>
    <p>Данные из сессии:</p>
    <ul>
        <li>Имя: <?= $_SESSION['name'] ?></li>
        <li>Email: <?= $_SESSION['email'] ?></li>
    </ul>
<?php else: ?>
    <p>Данных пока нет.</p>
<?php endif; ?>

<a href="index.html">Заполнить форму</a> |
<a href="view.php">Посмотреть все данные</a>

<?php if(isset($_SESSION['errors'])): ?>
    <ul style="color:red;">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['api_data'])): ?>
    <h3>Данные из API:</h3>
    <pre><?= print_r($_SESSION['api_data'], true) ?></pre>
<?php endif; ?>


