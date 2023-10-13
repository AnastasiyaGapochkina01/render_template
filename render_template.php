<?php
    // Данные для подключения к базе данных
    $host = 'localhost'; // Хост базы данных
    $username = 'temp'; // Имя пользователя базы данных
    $password = '0000'; // Пароль базы данных
    $database = 'templater'; // Имя базы данных
    $table = 'templ_fields';

    $id = $_POST["id"];
    $conn = mysqli_connect($host, $username, $password, $database);
     if (mysqli_connect_errno()) {

    printf("connection failed: %s\n", mysqli_connect_error());
    exit();
    }
    $query = "select * from templ_fields where id = '$id'";
    $res = mysqli_query($conn, $query);
    if ($res) {

    $row = mysqli_fetch_assoc($res); 
    $case_category = $row["case_category"];
    $plaintiff = $row["plaintiff"];
    $defendant = $row["defendant"];
    $judge = $row["judge"];
    $court = $row["court"];
    } 
echo "
        <meta charset='UTF-8'>
        <div class='center' >
                <p align='center' ><strong>Заявление о применении сроков исковой давности</strong></p>
            </div>

            <p>В производстве {$court} находится гражданское дело по исковому заявлению  {$plaintiff} обратилось в суд с иском к {$defendant} о взыскании задолженности по кредитному договору.</p>

            <p>{$defendant} данный долг не признает и вообще не помнит о таком событии как заключении какого-либо договора с {$plaintiff}.</p>

            <p>В соответствии с со ст. 200 ГК РФ, течение срока исковой давности начинается со дня, когда лицо узнало или должно было узнать о нарушении своего права.</p>

            <div class='center'>
                <p align = 'center'><strong>ПРОШУ:</strong></p>
            </div class='center'>

            <p>1) Применить последствия пропуска истцом срока исковой давности.</p>
            <p>2) Отказать {$plaintiff} в удовлетворении иска по взысканию задолженности по кредитному договору.</p>
";
echo "
<form method='POST'>
    <label for='id'>Номер дела:</label>
    <input type='text' id='id' name='id' value='1'>
    <input type='submit' value='Найти дело'>
</form>
";
//printf("id = %s (%s)\n", $row['id'], gettype($row['id']));
//printf("case_category = %s (%s)\n", $row['case_category'], gettype($row['case_category']));
