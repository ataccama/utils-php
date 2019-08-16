<?php

    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $messenger = new \Ataccama\Utils\Messenger();

    $message = new \Ataccama\Utils\Message("Test.", \Ataccama\Utils\Message::SUCCESS, 200);
    $messenger->add($message);


    Assert::same("Test.", $messenger->getLast()->text);