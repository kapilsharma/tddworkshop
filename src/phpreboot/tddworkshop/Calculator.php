<?php
/*
 * This file is part of the PHPReboot/Stopwatch package.
 *
 * (c) Kapil Sharma <kapil@phpreboot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace phpreboot\tddworkshop;

class Calculator
{
    public function add($numbers = '')
    {
        if (empty($numbers)) {
            return 0;
        }

        return intval($numbers);
    }
}