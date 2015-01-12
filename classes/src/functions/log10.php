<?php

/**
 *
 * Function code for the complex log10() function
 *
 * @package Complex
 * @copyright  Copyright (c) 2013-2015 Mark Baker (https://github.com/MarkBaker/PHPComplex)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
namespace Complex;

/**
 * Returns the common logarithm (base 10) of a complex number.
 *
 * @param     Complex|mixed    $complex    Complex number or a numeric value.
 * @return    Complex          The common logarithm (base 10) of the complex argument.
 * @throws    \Exception       If argument isn't a valid real or complex number.
 * @throws    \InvalidArgumentException  If the real and the imaginary parts are both zero
 */
function log10($complex)
{
    $complex = Complex::validateComplexArgument($complex);

    if (($complex->getReal() == 0.0) && ($complex->getImaginary() == 0.0)) {
        throw new \InvalidArgumentException();
    } elseif (($complex->getReal() > 0.0) && ($complex->getImaginary() == 0.0)) {
        return new Complex(\log10($complex->getReal()), 0.0, $complex->getSuffix());
    }

    return ln($complex)
        ->multiply(\log10(Complex::EULER));
}