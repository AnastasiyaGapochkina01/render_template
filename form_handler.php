<?php
// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Данные для подключения к базе данных
    $host = 'localhost'; // Хост базы данных
    $username = 'temp'; // Имя пользователя базы данных
    $password = '0000'; // Пароль базы данных
    $database = 'templater'; // Имя базы данных
    $table = 'templ_fields';

    // Подключение к базе данных
    $connection = mysqli_connect($host, $username, $password, $database);

    // Проверка на ошибку подключения
    if (!$connection) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    // Получение данных из формы
    $id = $_POST["id"];
    $case_category = $_POST["case_category"];
    $plaintiff = $_POST["plaintiff"];
    $defendant = $_POST["defendant"];
    $judge = $_POST["judge"];
    $court = $_POST["court"];

    // Подготовка SQL-запроса для добавления записи
    $insertQuery = "INSERT INTO templ_fields (id, case_category, plaintiff, defendant, judge, court) VALUES ('$id', '$case_category', '$plaintiff', '$defendant', '$judge', '$court')";

    // Выполнение запроса
    if (mysqli_query($connection, $insertQuery)) {
	    echo "<p>Новая запись успешно добавлена в таблицу.</p>";
	    echo '<a href="render_template.php">Сгенерировать заявление</a>';

    } else {
        echo "Ошибка при добавлении записи: " . mysqli_error($connection);
    }

    // Закрытие соединения с базой данных
    mysqli_close($connection);
} else {
    // Если форма не была отправлена, перенаправьте пользователя на страницу с формой
    header("Location: index.html");
    exit;
}
?>
