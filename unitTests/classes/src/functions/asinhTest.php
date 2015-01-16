<?php

namespace Complex;
include_once __DIR__ . '/baseFunctionTest.php';

class asinhTest extends baseFunctionTest
{
    protected static $functionName = 'asinh';

    /**
     * @dataProvider providerASinh
     */
	public function testAsinh()
	{
		$args = func_get_args();
		$complex = new Complex($args[0]);
		$result = asinh($complex);

        $this->complexNumberAssertions($args[1], $result);
        // Verify that the original complex value remains unchanged
        $this->assertEquals(new Complex($args[0]), $complex);
	}

    /*
     * Results derived from Wolfram Alpha using
     *  N[ArcSinH[<VALUE>], 18]
     */
    public function providerASinh()
    {
		$expectedResults = array(
			3.17978543769987883,
			3.20803471193308126,
            0.123138570086713762,
			'3.33919098410634349+0.50173508518006698i',
			'3.33919098410634349-0.50173508518006698i',
			'2.60315288151023098+1.55241410847789368i',
			'2.60315288151023098-1.55241410847789368i',
			'0.165478818945828958+0.733817735529149511i',
            '0.165478818945828958-0.733817735529149511i',
            -2.98585849455176960,
            -0.872613800611903604,
            '-3.07233418755286186+0.41084011937288351i',
            '-3.07233418755286186-0.41084011937288351i',
            '-0.906185270744662449+0.304882778123071105i',
            '-0.906185270744662449-0.304882778123071105i',
            '1.81152627246085311+1.57079632679489662i',
            '-1.81152627246085311-1.57079632679489662i',
            '1.57079632679489662i',
            '-1.57079632679489662i',
            '0.123312275191871996i',
            '-0.123312275191871996i',
		);

		return $this->formatOneArgumentTestResultArray($expectedResults);
	}

}