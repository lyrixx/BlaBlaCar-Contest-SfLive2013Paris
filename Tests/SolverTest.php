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

            array(
                array(
                    'size' => 4,
                    'nb'   => 112,
                ),
                array(
                    array(16,16,20),
                    array(8, 8, 8),
                    array(12,8, 16),
                )
            ),

            array(
                array(
                    'size' => 3,
                    'nb'   => 64772,
                ),
                array(
                    array(60,84, 72),
                    array(12,24, 12),
                    array(12,6,  66),
                    array(66,54, 36),
                    array(90,90, 90),
                    array(54,36, 30),
                    array(78,75, 78),
                    array(18,18, 18),
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
