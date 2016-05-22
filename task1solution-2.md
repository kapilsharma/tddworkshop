> Warning: This is solution of task 1. I do not recommend to look solution immediately. If you come here by mistake, please go back to [Task1](README.md).

This is Page 2 of solution of Task 1. If you are not coming from page 1, please [click here to go to Page 1 of Task 1 solution](test1solution.md).

# Task 1 Problem statement

Just to remind, in task 1, we need to make a command line utility to sum zero to two numbers. Command should be

```bash
php calculator.php sum
php calculator.php sum 1
php calculator.php sum 2,3
```

and its output must 0, 1, and 5 respectively.

# What we did till now

On page 1 of solution for task 1:

- we first installed required tools like Git, composer.
- Then we created a git repository locally and added remote on github and learned how to commit our project and push it to remote.
- We then initialize composer and setup project
- We later installed PHP Unit through composer
- After that, we learned about auto loading, decided project folder structure and auto loaded files through composer.
- Then we write our first PHP Unit test
- We then configure PHP Unit and run our first test.
- Our test failed so we write code to make it pass.

At the end, we simply have a Calculator class with a dummy `add` method.

Now we have all setup ready so we can now focus on completing task 1.

# Next problem

Now we have add method. If we check our required command

```bash
php calculator.php sum
php calculator.php sum 1
php calculator.php sum 2,3
```

There is a case when there is no parameter supplied. In that case, we should return 0. We have actually achieved that but lets write a test to confirm that.

## Test add without parameter returns zero.

To test it, lets add following test at the end of CalculatorTest class.

```php
    public function testAddWithoutParameterReturnsZero()
    {
        $result = $this->calculator->add();
        $this->assertSame(0, $result, 'Empty string on add do not return 0');
    }
```

First line of test is pretty clear, we are just calling `add` method and saving result in `$result` variable.

In second line, which is actually a test, we used PHP Unit's `assertSame` method. I recommend to go through PHP Unit documentations to know about all `assert***` methods. In short, `assertSame` and `assertEquals` check if expected and actual result are same? Difference, assertEquals check `expected == actual` and assertSame check `expected === actual`.

As prerequisite of this course, I expect you know difference between `==` and `===`. If no, you must first learn a bit more about PHP.

In short, assertSame check value as well as type so ideally two tests for me. Now lets run the test. If you forgot, command is `vendor/bin/phpunit` in project root. Output of test is `OK (2 tests, 2 assertions)`, everything passing.

## Reviewing testdox.html

Before we go ahead, lets first check generated docs. Please open `log/testdoc.html` in a browser (double click it in explorer).

Its output should be like

> # phpreboot\tddworkshop\Calculator
>
>   - Add returns an integer
>   - Add without parameter returns zero

As you can see our HTML report is readable even by non-technical person. If you check closely, message is actually the name of our test function, without `test` prefix. Hope now it is clear why we selected strange names for our test function. Name should be human readable in English but at the same time, it must not be a whole sentence. While naming tests, always think a short and simple line to exactly define your test.

## Next problem

`sum` method is supposed to accept 0 or 1 parameter. If there is one string parameter, there are two cases:

- Either it is a single number. In that case, we need to return same number.
- It could also be a string of two numbers, separated by comma. In that case, we need to add these numbers and return its sum.

Lets write test to confirm single parameter with single number returns same number. My test is:

```php
    public function testAddWithSingleNumberReturnsSameNumber()
    {
        $result = $this->calculator->add('3');
        $this->assertSame(3, $result, 'Add with single number do not returns same number');
    }
```

Obviously, our test is supposed to fail

```bash
There was 1 failure:

1) phpreboot\tddworkshop\CalculatorTest::testAddWithSingleNumberReturnsSameNumber
Add with single number do not returns same number
Failed asserting that 0 is identical to 3.

/home/kapil/dev/github/phpreboot/tddworkshop/tests/phpreboot/tddworkshop/CalculatorTest.php:44

FAILURES!
Tests: 3, Assertions: 3, Failures: 1.
```

Lets fix calculator to make this test pass. New `add` function is

```php
    public function add($numbers = '')
    {
        if (empty($numbers)) {
            return 0;
        }

        return intval($numbers);
    }
```

Now to speed up workshop, I'm assuming you can easily understand above PHP code. From here on, I'm not going to explain PHP code. If you have any doubt, please go through PHP manual or stack overflow or if no thing works, tweet your question as `@kapilsharmainfo #TDDWorkshop <question>` and I'll reply ASAP.

## Handling two parameters

Next task, parameters could also be a string of two numbers, separated by comma. In that case, we need to add these numbers and return its sum.

So lets write the test first.

```php
    public function testAddWithTwoParametersReturnsTheirSum()
    {
        $result = $this->calculator->add('2,4');

        $this->assertSame(6, $result, 'Add with two parameter do not returns correct sum');
    }
```

obviously, it will fail

```bash
There was 1 failure:

1) phpreboot\tddworkshop\CalculatorTest::testAddWithTwoParametersReturnsTheirSum
Add with two parameter do not returns correct sum
Failed asserting that 2 is identical to 6.

/home/kapil/dev/github/phpreboot/tddworkshop/tests/phpreboot/tddworkshop/CalculatorTest.php:51

FAILURES!
Tests: 4, Assertions: 4, Failures: 1.
```
Lets fix it. My new add method is:

```php
    public function add($numbers = '')
    {
        if (empty($numbers)) {
            return 0;
        }

        $numbersArray = explode(",", $numbers);

        return array_sum($numbersArray);
    }
```

and now test is passing.

## Task 1 done?

Is task 1 done? Well not actually. We need to make a command line script and our Calculator class is not a command line script.

Lets make `calculator.php` at root of the project with following code.

```php
<?php

require_once 'vendor/autoload.php';

use phpreboot\tddworkshop\Calculator;

$calculator = new Calculator();

if (!isset($argv[1])) {
    echo 'Operation missing.' . PHP_EOL;
    exit(0);
}

switch ($argv[1]) {
    case 'add':
        $numbers = isset($argv[2]) ? $argv[2] : '';
        echo $calculator->add($numbers) . PHP_EOL;
        break;
    default:
        echo 'Please check the operator.' . PHP_EOL;
}
```

I guess, above code if familiar for every one. However some of you, using composer for first time, might be surprised with first line, why we need to include `autoload.php`.

If you remember, we added `autoload` section in `composer.json`. Based on that section, composer generates `autoload.php` file, which can load all the classes within given namespace. In our case, we are auto-loading `Calculator.php`.

Now try following commands

```bash
php calculator.php
php calculator.php add
php calculator.php add 1
php calculator.php add 2,3
```

So we completed Task 1, right? If you think yes, try following commands

```bash
php calculator add a
php calculator add p,q
php calculator add ,
```

Answer is always `0`, is it expected? Well no, in that case, we are supposed to give proper error message.

## Happy testing

We are say, till now, we did happy testing that is assuming everything will be normal. Our tests didn't check if our program is behaving correctly in case input is not valid. Lets write first test to check invalid parameter. To be valid, it must

  - be a string.
  - must contains only numbers and comma.
 
If input parameter is not valid, our `add` method must throw an exception, `InvalidArgumentException` to be precise. Lets write test for it.
 
 ```php
     /**
      * @expectedException \InvalidArgumentException
      */
     public function  testAddWithNonStringParameterThrowsException()
     {
         $this->calculator->add(5, 'Integer parameter do not throw error');
     }
 ```
 
 In this test, we do not have any assertion but just calling `add` method with integer parameter. However we have a test, please note doc-block, which have `@expectedException \InvalidArgumentException`. PHP Unit can read this doc-block and assume this method must throw InvalidArgumentException. If exception is not thrown, test will fail, Lets test it and we have one failed test
 
 ```bash
 There was 1 failure:
 
 1) phpreboot\tddworkshop\CalculatorTest::testAddWithNonStringParameterThrowException
 Failed asserting that exception of type "\InvalidArgumentException" is thrown.
 
 FAILURES!
 Tests: 5, Assertions: 5, Failures: 1.
```

