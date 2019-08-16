<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $pair = new \Ataccama\Environment\Pair("abc", "xyz");

    Assert::same("abc", $pair->key);

    Assert::same("xyz", $pair->value);

    $pairArray = new \Ataccama\Environment\PairArray([$pair]);

    $pairArray->add($pair);

    Assert::same(2, count($pairArray));

    Assert::same("xyz", $pairArray->tryToGetPairByKey("abc")->value);

    // toArray() unified
    Assert::same(1, count($pairArray->toArray()));

    Assert::same("xyz", $pairArray->toArray()["abc"]);