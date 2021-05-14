<?php


class AI
{
    protected TicTac $tictac;

    public function __construct(TicTac $tictac)
    {
        $this->tictac = $tictac;
    }

    private function randomMove(): array
    {
        $n = count($this->tictac->getMap()) - 1;

        do {
            $i = random_int(0, $n);
            $j = random_int(0, $n);

        } while (!$this->tictac->checkAccess($i, $j) && $this->tictac->countEmptyCells() > 0);

        return ["i" => $i, "j" => $j];
    }

    public function moveCross()
    {
//        $random = $this->randomMove();
//        $this->tictac->putCross($random["i"], $random["j"]);
        $this->tictac->putCross(...$this->randomMove());
    }

    public function moveZero()
    {
//        $random = $this->randomMove();
//        $this->tictac->putZero($random["i"], $random["j"]);
//        $this->tictac->putZero(...$random);
        $this->tictac->putZero(...$this->randomMove());
    }


}