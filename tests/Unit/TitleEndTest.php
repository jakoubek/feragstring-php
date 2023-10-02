<?php
/**
 * User: jakoubek
 * Date: 29.09.2023
 * Time: 20:20
 */

use Jakoubek\Feragstring\TitleEnd;

test('Title end name', function () {

    $te = new TitleEnd();
    $te->setTitleName('TITEL23');
    expect(rtrim($te->Message()))->toBe('%2441+40TITEL23 !');

});
