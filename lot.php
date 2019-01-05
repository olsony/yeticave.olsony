<?php
    require_once('functions.php');
	require_once('lots_db.php');

    $lot_id = null;

    if (isset($_GET["id"])) {
        $lot_id = intval($_GET["id"]);
        }
    else {
        http_response_code(404);
    };

    foreach ($lots as $key => $item) {
    if ($key == $lot_id) {
        $lots_id[] = $lots[$key];
        break;}
    }

    if (!$lots_id) {
    http_response_code(404);
    }

    //print_r($lots_id);

    $page_content = render_template('templates/index.php', [
        "categories" => $categories,
        'lots' => $lots_id,
    ]);

    $layout_content = render_template("templates/layout.php", [
        "content" => $page_content,
        "categories" => $categories,
        "title" => 'Лот',
    ]);

    print($layout_content);

