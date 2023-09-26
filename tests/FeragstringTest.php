<?php

namespace Tests;

use Jakoubek\FeragstringPhp\Feragstring;
use PHPUnit\Framework\TestCase;

class FeragstringTest extends TestCase
{

    function testItCreates()
    {
        $fs = new Feragstring();
        $fs->SetTitleName("DEMO2009");

        $fs->titleInfo->setPrintObjectName("EDITION1A");
        $fs->titleInfo->setPublicationDate("2023-09-09");
        $fs->titleInfo->setIssueReference("20191005");
        $fs->titleInfo->setCountryCode("13");
        $fs->titleInfo->setPrintObjectColor("00000000");


        $expected = "%2440+93EDITION1A+40DEMO2009!
%2441+40DEMO2009!
";
        $this->assertEquals($expected, $fs->PrintOut());

        print $fs->PrintOut();

    }

}
