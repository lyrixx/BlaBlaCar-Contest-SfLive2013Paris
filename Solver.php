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
        $min = INF;
        foreach ($datas as $data) {
            $min = min($min, call_user_func_array('min', $data));
        }

        return $min;
    }
}
