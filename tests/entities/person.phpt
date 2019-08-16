<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $person = new \Ataccama\Environment\Entities\Base\Person(1, new \Ataccama\Utils\Name("Miroslav Stolfa"),
        new \Ataccama\Utils\Email("miroslav.stolfa@ataccama.com"));

    Assert::same("ataccama.com", $person->email->domain);

    Assert::same("Miroslav", $person->name->first);

    Assert::same("Stolfa", $person->name->last);

    Assert::same("Miroslav Stolfa", $person->name->full);

    Assert::same("1", $person->id);