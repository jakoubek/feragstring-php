<?php

namespace Tests;

use Jakoubek\FeragstringPhp\Feragstring;
use PHPUnit\Framework\TestCase;

class FeragstringTest extends TestCase
{

    function testItCreates()
    {
        $fs = new Feragstring();
        $fs->SetTitleName("BASSE36");

        $fs->titleInfo->setPublicationDate("230909");
        $fs->titleInfo->setPrintObjectColor(0);

        $expected = "%2440+40BASSE36 +95230909+9400000000!
%2441+40BASSE36 !
";
        $this->assertSame($expected, $fs->PrintOut());

//        print $fs->PrintOut();

    }

}
