<?php


class AI
{
    protected TicTac $tictac;

    public function __construct(TicTac $tictac)
    {
        $this->tictac = $tictac;
    }

    public function moveCross()
    {
        $n = count($this->tictac->getMap()) - 1;

        do {
            $i = random_int(0, $n);
            $j = random_int(0, $n);

        } while (!$this->tictac->checkAccess($i, $j) && $this->tictac->countEmptyCells() > 0);

        $this->tictac->putCross($i, $j);
    }

    public function moveZero()
    {
        $n = count($this->tictac->getMap()) - 1;
        do {
            $i = random_int(0, $n);
            $j = random_int(0, $n);

        } while (!$this->tictac->checkAccess($i, $j) && $this->tictac->countEmptyCells() > 0);

        $this->tictac->putZero($i, $j);
    }


}