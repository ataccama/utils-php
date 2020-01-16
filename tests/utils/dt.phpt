<?php

    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $dtStart = "2000-01-01 12:00:00";
    $dtEnd = "2000-01-01 14:05:00";

    Assert::same("2 hours 5 minutes",
        \Ataccama\Common\Utils\Transformer::dtiToStr(new \Ataccama\Common\Utils\DateRange(\Nette\Utils\DateTime::from($dtStart), \Nette\Utils\DateTime::from($dtEnd))));
