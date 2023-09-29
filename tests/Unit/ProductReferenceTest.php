<?php
/**
 * User: jakoubek
 * Date: 29.09.2023
 * Time: 20:25
 */

use Jakoubek\FeragstringPhp\ProductReference;

test('Product reference default product number', function () {

    $pr = new ProductReference();

    expect(rtrim($pr->Message()))->toBe("%2450+99141001!");

});

test('Product reference product name', function () {

    $pr = new ProductReference();
    $pr->setProductName("MAINPRODUCT");
    expect(rtrim($pr->Message()))->toBe("%2450+99141001+42MAINPRODUCT                   !");

});

