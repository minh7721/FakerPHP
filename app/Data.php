<?php

namespace App;
use Faker\Factory as Faker;
use Faker\Provider as FakerProvider;
use Faker\Generator as FakerGenerator;
class Data
{
    protected $faker;

    public function __construct()
    {
        $faker = Faker::create();
        $this->faker = $faker;
        return $this->faker;
    }

    public function info()
    {
        echo $this->faker->name();
        echo "<br>";
        echo $this->faker->email();
        echo "<br>";
        echo $this->faker->text();
        echo "<br>";
        echo $this->faker->password();
        echo "<br>";
        // Random Local IP v4
        echo $this->faker->localIpv4();
        echo "<br>";
        echo $this->faker->ipv6();
    }

    public function randNumber()
    {
        $faker = $this->faker;
        // Random trong khoang duoc cho san
        $number = $faker->optional()->passthrough(mt_rand(5, 15));
        echo $number;
        echo "<br>";
        // Random so tu 0 den 9
        echo $faker->randomDigit();
        echo "<br>";
        //In ra cac so tru so trong ham randomDigitNot
        echo $faker->randomDigitNot(2);
        echo "<br>";
        echo $faker->randomDigitNotNull();
        echo "<br>";
        // Random so co 5 chu so, neu true thi chi tra ve so co 5 chu so, false thi tra ve cac so co nhieu nhat la 5 chu so
        echo $faker->randomNumber(5, true);
    }

    public function time()
    {
        echo $this->faker->date('d/m/Y');
    }

    public function modifiers()
    {
        $faker = $this->faker;
        $values = [];
        for ($i = 0; $i < 10; $i++) {
            $values [] = $faker->unique()->randomDigit();
        }
        print_r($values);

        $values = [];
        try {
            for ($i = 0; $i < 10; $i++) {
                $values [] = $faker->unique()->randomDigitNotNull();
            }
        } catch (\OverflowException $e) {
            echo "There are only 9 unique digits not null, Faker can't generate 10 of them!";
        }

        $faker->unique($reset = true)->randomDigitNotNull();
        $values = [];
        for ($i = 0; $i < 10; $i++) {
            $values [] = $faker->optional()->randomDigit();
        }
        print_r($values);

        $faker->optional($weight = 0.1)->randomDigit();
        $faker->optional($weight = 0.9)->randomDigit();

        $faker->optional($weight = 10)->randomDigit;
        $faker->optional($weight = 100)->randomDigit;

        $faker->optional($weight = 0.5, $default = false)->randomDigit();
        $faker->optional($weight = 0.9, $default = 'abc')->word();

        $values = [];
        $evenValidator = function ($digit) {
            return $digit % 2 === 0;
        };
        for ($i = 0; $i < 10; $i++) {
            $values [] = $faker->valid($evenValidator)->randomDigit();
        }
        print_r($values);

        $values = [];
        try {
            $faker->valid($evenValidator)->randomElement([1, 3, 5, 7, 9]);
        } catch (\OverflowException $e) {
            echo "Can't pick an even number in that set!";
        }
    }

    public function localization()
    {
        $faker = Faker::create('ko_KR');
        for ($i = 0; $i < 3; $i++) {
            echo $faker->name() . "\n";
            echo $faker->email()."\n";
        }
    }

    public function seeding(){
        $faker = $this->faker;
        $faker->seed(5);
        echo $faker->name();
    }

    public function internals(){
        $faker = new FakerGenerator();
        $faker->addProvider(new FakerProvider\en_US\Person($faker));
        $faker->addProvider(new FakerProvider\en_US\Address($faker));
        $faker->addProvider(new FakerProvider\en_US\PhoneNumber($faker));
        $faker->addProvider(new FakerProvider\en_US\Company($faker));
        $faker->addProvider(new FakerProvider\Lorem($faker));
        $faker->addProvider(new FakerProvider\Internet($faker));
        return $faker;
    }
}


