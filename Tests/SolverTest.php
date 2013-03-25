<?php

namespace Tests;

use Solver;

class SolverTest extends \PHPUnit_Framework_TestCase
{
    private $solver;

    public function setUp()
    {
        $this->solver = new Solver();
    }

    public function getSolveTests()
    {
        return array(
            array(
                array(
                    'size' => 1,
                    'nb'   => 17,
                ),
                array(
                    array(4, 2, 2),
                    array(1, 1, 1),
                )
            ),

            array(
                array(
                    'size' => 2,
                    'nb'   => 4,
                ),
                array(
                    array(4, 4, 2),
                )
            ),

            array(
                array(
                    'size' => 1,
                    'nb'   => 36,
                ),
                array(
                    array(1, 1, 1),
                    array(2, 2, 2),
                    array(3, 3, 3),
                )
            ),
        );
    }

    /**
     * @dataProvider getSolveTests
     */
    public function testSolve($expected, $datas)
    {
        $this->assertSame($expected, $this->solver->solve($datas));
    }

    public function tearDown()
    {
        $this->solver = null;
    }
}
