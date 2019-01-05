<?php
require_once('functions.php');
require_once('lots_db.php');

    $errors = [];
    $dicts = [];
    $lot = [];
    $categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lot = $_POST["lot"];
    $required = [
        "name",
        "category",
        "desc",
        "initial_price",
        "step_rate",
        "completion_date"
    ];
    $dicts = [
        "name" => "Название лота",
        "category" => "Категория лота",
        "desc" => "Описание лота",
        "img_src" => "Изображение",
        "initial_price" => "Начальная цена",
        "step_rate" => "Шаг ставки",
        "completion_date" => "Дата завершения торгов"
    ];
    foreach ($required as $key) {
        if (empty($lot[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
        };
    };

    if ($lot["category"] === "Выберите категорию") {
        $errors["category"] = "Выберите категорию из списка";
    }

    if (!is_numeric($lot['initial_price']) || $lot["initial_price"] < '1') {
        $errors["initial_price"] = "Введите целое положительно число";
    }

    if (!is_numeric($lot['step_rate']) || $lot["step_rate"] < '1') {
        $errors["step_rate"] = "Введите целое положительно число";
    }

    if (strtotime($lot['completion_date']) <= strtotime('now')) {
        $errors['completion_date'] = 'Введите дату не ранее завтрашнего дня';
    }

    if ($_FILES["img_src"]["name"] && !empty($_FILES["img_src"]["name"])) {
        $tmp_name = $_FILES["img_src"]["tmp_name"];
        $path = uniqid() . '.jpg';
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if (!in_array($file_type, ["image/jpg", "image/jpeg", "image/png"])) {
            $errors["img_src"] = "Загрузите изображение в формате jpg/jpeg или png";
        }
    } else {
        $errors["img_src"] = 'Вы не загрузили изображение';
    }

    if (empty($errors)) {
        move_uploaded_file($tmp_name, 'img/' . $path);
        $lot["img_src"] = "img/" . $path;


    }
    }



$page_content = render_template("templates/add_lot.php", [
    "lot" => $lot,
    "errors" => $errors,
    "dicts" => $dicts,
    "categories" => $categories
]);

$layout_content = render_template("templates/layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => 'Добавления лота',
]);

print($layout_content);
