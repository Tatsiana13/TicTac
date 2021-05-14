<?php


class Map
{
    protected array $map = [];

    public function __construct(array $map = [])
    {
        $this->setMap($map);
    }

    public function setMap(array $map): static
    {
        $this->map = $map;
        return $this;
    }

    public function getHtmlTable(): string
    {
        $html = "<table class='tictac'>";

        foreach ($this->map as $row) {

            $html .= "<tr>";
            foreach ($row as $cell) {
                if ($cell == 'X') {
                    $html .= "<td>❌</td>";
                } elseif ($cell == 'O') {
                    $html .= "<td>⭕</td>";
                } else {
                    $html .= "<td></td>";
                }
//                $html .= "<td>$cell</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</table>";

        return $html;
    }

}