<?php

/**
 *
 * Function code for the complex theta() function
 *
 * @package Complex
 * @copyright  Copyright (c) 2013-2015 Mark Baker (https://github.com/MarkBaker/PHPComplex)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
namespace Complex;

/**
 * Returns the theta of a complex number.
 *   This is the angle in radians from the real axis to the representation of the number in polar coordinates.
 *
 * @param     Complex|mixed    $complex    Complex number or a numeric value.
 * @return    \real            The theta value of the complex argument.
 * @throws    \Exception       If argument isn't a valid real or complex number.
 */
function theta(Complex $complex)
{
    $complex = Complex::validateComplexArgument($complex);

    if ($complex->getReal() == 0.0) {
        if ($complex->getImaginary() == 0.0) {
            return 0.0;
        } elseif ($complex->getImaginary() < 0.0) {
            return M_PI / -2;
        }
        return M_PI / 2;
    } elseif ($complex->getReal() > 0.0) {
        return \atan($complex->getImaginary() / $complex->getReal());
    } elseif ($complex->getImaginary() < 0.0) {
        return -(M_PI - \atan(\abs($complex->getImaginary()) / \abs($complex->getReal())));
    }

    return M_PI - \atan($complex->getImaginary() / \abs($complex->getReal()));
}