<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Телефонный справочник</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    body {
        background-color: #fff767;
    }
</style>

<body>
<h1 class="text-success ms-3">Телефонный справочник</h1>

<form class="ms-3" action="functions.php" method="POST">
    <input class="form-control w-25 mb-3" type="text" id="name" name="name" placeholder="Имя" required>

    <input class="form-control w-25 mb-3" type="text" id="phone" name="phone" placeholder="Телефон" required>

    <button class="btn btn-primary" type="submit">Добавить</button>
</form>

<hr>

<h2 class="text-success ms-3">Список контактов</h2>
<ul class="list-group d-inline-block">
    <?php
    $contacts = getContacts();
    if (empty($contacts)) {
        echo "<p class='ms-4 text-danger display-6'>
                  <strong>Контакт не добавлен, добавьте их сверху!!!</strong>
              </p>";
    } else {
        foreach ($contacts as $index => $contact) {
            echo "
            <div class='mb-3 ms-3'>
                <li class='list-group-item d-inline-block rounded-5'>
                    <p class='d-inline-block text-danger'>Имя: </p> {$contact['name']} - 
                    <p class='d-inline-block text-danger'>Телефон</p>{$contact['phone']}
                </li> 
                <a href='functions.php?delete={$index}' class='btn btn-danger d-inline-block mt-3'>Удалить</a>
            </div> 
        ";
        }
    }
    ?>
</ul>
</body>
</html>