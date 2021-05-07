<?php


class TicTac
{
    protected array $map;

    public function __construct($size)
    {
        $this->init($size);
    }

    /** set map
     * @param array $map
     * @return $this
     */
    public function setMap(array $map)
    {
        $this->map = $map;
        return $this;
    }

    /** return map
     * @return array
     */
    public function getMap(): array
    {
        return $this->map;
    }

    /** map initialization
     * @param int $size
     * @return $this
     */
    public function init(int $size)
    {
        $this->map = [];
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $this->map[$i][$j] = "";
            }
        }
        return $this;
    }

    public function checkAccess(int $i, int $j)
    {
        return isset($this->map[$i]) && isset($this->map[$i][$j]) && $this->map[$i][$j] == "";

    }

    public function countEmptyCells()
    {
        $count = 0;
        foreach ($this->map as $row) {
            foreach ($row as $cells) {
                if ($cells == "") {
                    $count++;


                }
            }
        }
        return $count;

    }

    /** put Cross
     * @param int $i
     * @param int $j
     * @return $this
     */
    public function putCross(int $i, int $j)
    {
        if ($this->checkAccess($i, $j)) {
            $this->map[$i][$j] = "X";
        }
        return $this;
    }

    /** put Zero
     * @param int $i
     * @param int $j
     * @return $this
     */
    public function putZero(int $i, int $j)
    {
        if ($this->checkAccess($i, $j)) {
            $this->map[$i][$j] = "O";
        }
        return $this;
    }

    /**
     * @param $map
     * @return bool
     */
    public function checkWinnerByRow($map): bool
    {
        foreach ($map as $row) {
            if ($row[0] !== "") {
                $winner = true;
                for ($j = 1; $j < count($row); $j++) {
                    if ($row[$j] !== $row[$j - 1]) {
                        $winner = false;
                    }
                }
                if ($winner) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function checkWinner(): bool
    {
        return $this->checkWinnerByRow($this->map) or
            $this->checkWinnerByCol() or
            $this->checkWinnerByDiagonal() or
            $this->checkWinnerByUnderDiagonal();
    }

    /**
     * @return bool
     */
    public function checkWinnerByCol(): bool
    {
        $map = array_map(null, ...$this->map);
        return $this->checkWinnerByRow($map);
    }

    /**
     * @return bool
     */
    public function checkWinnerByDiagonal(): bool
    {

        if ($this->map[0][0] !== "") {
            $winner = true;
            $n = count($this->map);
            for ($i = 1; $i < $n; $i++) {
                if ($this->map[$i][$i] !== $this->map[$i - 1][$i - 1]) {
                    $winner = false;
                }
            }
            return $winner;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function checkWinnerByUnderDiagonal(): bool
    {
        $n = count($this->map);

        if ($this->map[0][$n - 1] !== "") {
            for ($i = 1; $i < $n; $i++) {
                if ($this->map[$i][$n - 1 - $i] !== $this->map[$i - 1][$n - $i]) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }


}