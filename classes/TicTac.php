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
    public function setMap(array $map): static
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
    public function init(int $size): static
    {
        $this->map = [];
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $this->map[$i][$j] = "";
            }
        }
        return $this;
    }

    /** put Cross
     * @param int $i
     * @param int $j
     * @return $this
     */
    public function putCross(int $i, int $j): static
    {
        if (isset($this->map[$i]) && isset($this->map[$i][$j]) && $this->map[$i][$j] == "") {
            $this->map[$i][$j] = "X";
        }
        return $this;
    }

    /** put Zero
     * @param int $i
     * @param int $j
     * @return $this
     */
    public function putZero(int $i, int $j): static
    {
        if (isset($this->map[$i]) && isset($this->map[$i][$j]) && $this->map[$i][$j] == "") {
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
        return $this->checkWinnerByRow($this->map) or $this->checkWinnerByCol();
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
            for ($i = 1; $i < count($this->map); $i++) {
                if ($this->map[$i][$i] !== $this->map[$i - 1][$i - 1]) {
                    $winner = false;
                }
            }
            return $winner;
        }
        return false;
    }

    public function checkWinnerBySideDiagonal(): bool
    {
        if ($this->map[count($this->map) - 1][0] !== "" && $this->map[0][count($this->map) - 1] !== "") {
            $winner = true;
            for ($i = 1; $i < count($this->map); $i++) {
                if ($this->map[$i][$i] !== $this->map[count($this->map) - 1][$i]) {
                    $winner = false;
                } else {
                    $winner = true;
                }
            }
            return $winner;
        }
        return false;
    }

}