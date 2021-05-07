<?php
include "autoload.php";
include "unittest.php";
$tictac = new TicTac(3);

test(
    $tictac->getMap(),
    [
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
    ]
);

test(
    $tictac->init(2)->getMap(),
    [
        ["", ""],
        ["", ""]
    ]
);

test(
    $tictac->init(3)->putCross(1, 2)->getMap(),
    [
        ["", "", ""],
        ["", "", "X"],
        ["", "", ""]
    ]
);

test(
    $tictac->init(3)->putZero(1, 2)->getMap(),
    [
        ["", "", ""],
        ["", "", "O"],
        ["", "", ""]
    ]
);
test(
    $tictac
        ->init(3)
        ->putCross(1, 1)
        ->putZero(0, 2)
        ->putCross(0, 1)
        ->putZero(2, 2)
        ->putCross(1, 2)
        ->putZero(0, 0)
        ->putCross(1, 0)
        ->getMap(),
    [
        ["O", "X", "O"],
        ["X", "X", "X"],
        ["", "", "O"]
    ]
);

test(
    $tictac
        ->init(3)
        ->putCross(1, 1)
        ->putZero(0, 2)
        ->putCross(0, 1)
        ->putZero(2, 2)
        ->putCross(1, 2)
        ->putZero(0, 0)
        ->putCross(1, 0)
        ->checkWinner(), true,
);

test(
    $tictac
        ->init(3)
        ->checkWinner(), false,
);
test(
    $tictac->setMap([
        ["O", "X", "O"],
        ["X", "X", "X"],
        ["", "", "O"]
    ])->checkWinner(),
    true
);


test(
    $tictac->setMap([
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
    ])->checkWinnerByDiagonal(),
    false
);

test(
    $tictac->setMap([
        ["X", "", ""],
        ["", "X", ""],
        ["", "", "X"]
    ])->checkWinnerByDiagonal(),
    true
);

test(
    $tictac->setMap([
        ["O", "", ""],
        ["", "O", ""],
        ["", "", "O"]
    ])->checkWinnerByDiagonal(),
    true
);

test(
    $tictac->setMap([
        ["O", ""],
        ["", "O"],
    ])->checkWinnerByDiagonal(),
    true
);

test(
    $tictac->setMap([
        ["x", "O", "O"],
        ["O", "O", "x"],
        ["O", "x", "x"]
    ])->checkWinnerByUnderDiagonal(),
    true
);
test(
    $tictac->setMap([
        ["O", "O", "x"],
        ["O", "x", "O"],
        ["x", "O", "x"]
    ])->checkWinnerByUnderDiagonal(),
    true
);

test(
    $tictac->setMap([
        ["O", "O", "O"],
        ["O", "x", "O"],
        ["x", "O", "x"]
    ])->checkWinnerByUnderDiagonal(),
    false
);

test(
    $tictac->setMap([
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
    ])->checkWinner(),
    false
);

test(
    $tictac->setMap([
        ["X", "X", "X"],
        ["", "", ""],
        ["", "", ""]
    ])->checkWinner(),
    true
);

test(
    $tictac->setMap([
        ["X", "", ""],
        ["X", "", ""],
        ["X", "", ""]
    ])->checkWinner(),
    true
);

test(
    $tictac->setMap([
        ["X", "", ""],
        ["", "X", ""],
        ["", "", "X"]
    ])->checkWinner(),
    true
);

test(
    $tictac->setMap([
        ["", "", "X"],
        ["", "X", ""],
        ["X", "", ""]
    ])->checkWinner(),
    true
);

test(
    $tictac->setMap([
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
    ])->countEmptyCells(),
    9
);

test(
    $tictac->setMap([
        ["", "", "X"],
        ["", "X", ""],
        ["", "", "X"]
    ])->countEmptyCells(),
    6
);

