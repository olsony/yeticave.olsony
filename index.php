<?php
	require_once('functions.php');
	require_once('lots_db.php');

    $page_content = render_template('templates/index.php', [
        "categories" => $categories,
        "lots" => $lots,
    ]);

    $layout_content = render_template("templates/layout.php", [
        "content" => $page_content,
        "categories" => $categories,
        "title" => 'Главная страница',
    ]);

    print($layout_content);