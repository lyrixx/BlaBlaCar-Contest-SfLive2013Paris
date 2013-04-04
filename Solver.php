<?php

class Solver
{
    public function solve($datas)
    {
        $max = $this->getMaxSize($datas);

        $nb = 0;
        foreach ($datas as $data) {
            $volume = 1;
            foreach ($data as $size) {
                $volume *= $size;
            }
            $nb += $volume / pow($max,3);
        }

        return array('size' => $max, 'nb' => $nb);
    }

    private function getMaxSize($datas)
    {
        $pgcd = INF;
        foreach ($datas as $data) {
            foreach ($data as $size) {
                $pgcd = min($pgcd, $this->pgcd($pgcd, $size));
            }
        }

        return $pgcd;
    }

    /**
     * @see http://www.phpsources.org/scripts224-PHP.htm
     */
    private function pgcd($n1,$n2)
    {
       while ($n1>1) {
            $reste = $n1 % $n2;

            if ($reste == 0) {
                break;
            }

            $n1=$n2;
            $n2=$reste;
        }

        return $n2;
    }
}
