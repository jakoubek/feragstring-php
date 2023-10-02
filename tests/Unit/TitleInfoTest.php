<?php
/**
 * User: jakoubek
 * Date: 29.09.2023
 * Time: 20:09
 */

use Jakoubek\Feragstring\TitleInfo;

test('Title name padded', function () {

    $ti = new TitleInfo();
    $ti->setTitleName('SIEBEN');
    expect(trim($ti->Message()))->toBe("%2440+40SIEBEN  !");

});

test('Title name stripped', function () {

    $ti = new TitleInfo();
    $ti->setTitleName('SIEBENERX');
    expect(trim($ti->Message()))->toBe("%2440+40SIEBENER!");

});

