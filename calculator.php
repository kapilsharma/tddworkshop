<?php
/*
 * This file is part of the phpreboot/tddworkshop package.
 *
 * (c) Kapil Sharma <kapil@kapilsharma.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'vendor/autoload.php';

use phpreboot\tddworkshop\Calculator;

$calculator = new Calculator();

if (!isset($argv[1])) {
    echo 'Operation missing' . PHP_EOL;
    exit(0);
}

try {
    switch ($argv[1]) {
        case 'add':
            $numbers = isset($argv[2]) ? $argv[2] : '';
            echo $calculator->add($numbers) . PHP_EOL;
            break;
        default:
            echo 'Please check the operator.' . PHP_EOL;
    }
} catch (\InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}