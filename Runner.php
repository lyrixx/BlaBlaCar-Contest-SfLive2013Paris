<?php

class Runner
{
    public function run()
    {
        $stdin = fopen('php://stdin', 'r');
        $stdout = fopen('php://stdout', 'w');

        $datas = '';
        while ($buffer = fread($stdin, 1024)) {
            $datas .= $buffer;
        }

        $datas = explode("\n", $datas);
        unset($datas[0]);


        $datas = array_filter($datas, function($v) {
            return 0 !== preg_match('/^\d+;\d+;\d+$/', $v);
        });

        $datas = array_map(function($v) { return explode(';', $v); }, $datas);

        $solver = new Solver();
        $solution = $solver->solve($datas);

        fwrite($stdout, sprintf('%s;%s', $solution['size'],$solution['nb']));

        fclose($stdout);
        fclose($stdin);
    }
}
