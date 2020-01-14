<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $array = new \Ataccama\Common\Env\BaseArray();

    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 5;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 1;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 1;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 40;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 10;
        }
    });

    $array->sort();

    Assert::same(1, $array->get(0)
        ->getValue());
    Assert::same(1, $array->get(1)
        ->getValue());
    Assert::same(5, $array->get(2)
        ->getValue());
    Assert::same(10, $array->get(3)
        ->getValue());
    Assert::same(40, $array->get(4)
        ->getValue());

    $array->sort(\Ataccama\Common\Utils\Comparator\Sorter::DESC);

    Assert::same(1, $array->get(4)
        ->getValue());
    Assert::same(1, $array->get(3)
        ->getValue());
    Assert::same(5, $array->get(2)
        ->getValue());
    Assert::same(10, $array->get(1)
        ->getValue());
    Assert::same(40, $array->get(0)
        ->getValue());

    $array = new \Ataccama\Common\Env\BaseArray();
    $array->add(1);
    $array->add(2);
    $array->add(3);

    Assert::same(false, $array->sort());

    $array_2 = new \Ataccama\Common\Env\BaseArray();
    $array_2->add(10)
        ->add(20)
        ->add(30);
    $array_2->insert($array);

    Assert::count(6, $array_2);

    Assert::same(30, $array_2->get(2));

    $array_2->remove(2);

    Assert::same(1, $array_2->get(2));