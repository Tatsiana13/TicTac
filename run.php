<?php
session_start();
include "autoload.php";

if (isset($_GET['newgame'])) {
    unset($_SESSION['map']);
    unset($_SESSION['message']);
}

$tictac = new TicTac(3);
$ai = new AI($tictac);

if (isset($_SESSION['map'])) {
    $tictac->setMap($_SESSION['map']);
}

//while ($tictac->countEmptyCells() > 0 && !$tictac->checkWinner()) {
if (isset($_GET['i']) && isset($_GET['j'])) {
    if (!$tictac->checkWinner()) {
        $tictac->putCross($_GET['i'], $_GET['j']);
        if ($tictac->checkWinner()) {
            $_SESSION['message'] = "Выиграли крестики!";
        }
    }

//    $ai->moveCross();
    if (!$tictac->checkWinner()) {
        $ai->moveZero();
        if ($tictac->checkWinner()) {
            $_SESSION['message'] = "Выиграли нолики!";
        }
    }
}

if (!$tictac->checkWinner() && $tictac->countEmptyCells() == 0) {
    $_SESSION['message'] = "Ничья!";
}
$_SESSION['map'] = $tictac->getMap();
//}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="?newgame">Новая Игра</a>
<h1><?= $_SESSION['message'] ?? "" ?></h1>
<?= (new Map($tictac->getMap()))->getHtmlTable() ?>
</body>
</html>
