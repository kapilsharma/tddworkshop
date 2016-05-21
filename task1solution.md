> Warning: This is solution of task 1. I do not recommend to look solution immediately. If you come here by mistake, please go back to [Task1](README.md).

# Task 1 Problem statement

We need to make a command line utility to sum zero to two numbers. Command should be

```bash
php calculator.php sum
php calculator.php sum 1
php calculator.php sum 2,3
```

and its output must 0, 1, and 5 respectively.

# Task 1 solution

Before we jump to the code, we have following prerequisites

1. PHP 5.5+ (We assume it is already installed.)
2. Git
3. Composer

## Install git

If you are not already having git installed, do it. Just google 'install git on &lt;your OS&gt;'. Its easy part so I'm not covering it here.

## Create project

Just open terminal and create a folder `tddworkshop` on desired location. We also need to initiate a git repository

```bash
mkdir tddworkshop
cd tddworkshop
git init
```

This will create a folder `.git`. Also, I do not want to commit few files to git, foe example, I'm using PHP Storm which create a folder `.idea` or Netbeans create `nbproject` to save project specific settings. This is important as these folder are necessary locally but not the part of my project. To do that, just create a file `.gitignore` and write name of file/folder, you do not want to commit. I'm using PHP Storm so my `.gitignore` file has following content

```
.idea
```

## README file

We create a `README.md` file to explain few things about our project. Simple create `README.md` and add following text in it.

```
# TDD Workshop

My code to practice test driven developemnt.
```

This is in markdown format. Google `markdown` if you want to learn more about markdown.

## First commit

First commit should be generally a simple file like above readme file and probably `.gitignore` file. I hope you know git and can create new repo on github and commit/push files.

If you do not know git and github, required steps can be seen at [firstcommit.md](firstcommit.md)

## Composer

Composer is a tool to manage dependencies of your PHP project. We too have few dependencies on third party libraries; right now PHP unit but might have more in future. So lets first install composer.

### Installing composer

Composer website is the best source of updated composer installation steps. Please visit [linux-unix-mac](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) section for installation instructions on Linux and Mac OS. For windows, please check [windows](https://getcomposer.org/doc/00-intro.md#using-the-installer) section.

## Initializing (composer) project

Running `composer init` will initialize composer. Sample output of command is as follow:

```bash
kapil@PHPReboot:~/dev/github/phpreboot/tddworkshop$ composer init

                                            
  Welcome to the Composer config generator  
                                            


This command will guide you through creating your composer.json config.

Package name (&lt;vendor&gt;/&lt;name&gt;) [root/tddworkshop]: kapilsharma/tddworkshop
Description []: Sample code for Test Driven Development (TDD) workshop.
Author [kapilsharma &lt;kapil@kapilsharma.info&gt;, n to skip]: 
Minimum Stability []: 
Package Type []: 
License []: MIT

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no
Would you like to define your dev dependencies (require-dev) interactively [yes]? no

{
    "name": "kapilsharma/tddworkshop",
    "description": "Sample code for Test Driven Development (TDD) workshop.",
    "license": "MIT",
    "authors": [
        {
            "name": "kapilsharma",
            "email": "kapil@kapilsharma.info"
        }
    ],
    "require": {}
}

Do you confirm generation [yes]? yes
Would you like the vendor directory added to your .gitignore [yes]? 
kapil@PHPReboot:~/dev/github/phpreboot/tddworkshop$
```

Basically it will ask following question:

**Packagename (vendor/name):** I used `kapilsharma/tddworkshop`. Here `vendor` is company name or you may use your own name, for me, it was `kapilsharma`. `name` is project name, for me, it was `tddworkshop`.

**Description:** This is optional. Just enter some description of project. If you do not want to enter description, simple press `enter`.

**Author:** Obviously you. Format is `name &lt;email&gt;gt;`. For me, it was `kapilsharma &lt;kapil@kapilsharma.info&`.

**Minimum Stability, Package Type, License:** For now, leave these three fields empty by simple press enter.

**Dependency and dev dependency:** For now, enter `no` in both of these fields.

At last, enter `yes` to generate `composer.json` file. This will generate following composer.json.

```json
{
    "name": "kapilsharma/tddworkshop",
    "description": "Sample code for Test Driven Development (TDD) workshop.",
    "license": "MIT",
    "authors": [
        {
            "name": "kapilsharma",
            "email": "kapil@kapilsharma.info"
        }
    ],
    "require": {}
}
```

Congratulations, we have composer.json file ready.

## Installing PHP Unit

For Test Driven Development, we need some tool for Unit testing. PHP Unit is one of the most popular unit testing tool in PHP and we are going to use it.

Right now, PHP Unit have two active versions:

- PHP Unit 4.8 supports PHP version 5.3, 5.4, 5.5, 5.6 and 7.0
- PHP Unit 5.3 supports PHP version 5.6 and 7.0

Latest is best and PHP 5.5 is also near end of security support. So our obvious choice must be PHP Unit 5.3. However in this training, I'm going through PHP unit 4.8 as I believe few of you might not have PHP 5.6. (If you don't, its high time to update). Still purpose of this workshop is to learn TDD, not force everyone to migrate to latest PHP version.

Thus I'm going with PHP Unit 4.8 but I highly recommend others to go with PHP Unit 5.3.

To install PHP Unit 4.8 through composer, run command `composer require --dev phpunit/phpunit:4.8`. Please note `--dev` flag. This tells composer that we need PHP Unit only on development system, not on production. Running this command will install PHP Unit and following lines in composer.json

```json
    "require-dev": {
        "phpunit/phpunit": "4.8"
    }
```

It will also create a folder `vendor`. All packages installed by composer goes in vendor directory. Also add `/vendor/` in .gitignore file on separate line, if it was not already done with `composer init`. My .gitignore files now looks as follow:

```
.idea
/vendor/
```

We have PHP Unit installed. We will soon use it, be patient for few more minutes.

## Auto loading.

I hope you are aware with namespaces, auto loading your PHP classes through composer auto loader. If yes, you can skip this section and move to next section.

For others, you must be aware of statements like `include`, `include_once`, `require`, `require_once`. Before PHP 5.3, they were commonly used to include one php file in another php file. With namespaces and PSR-0/PSR-4. PSR-0 and PSR-4 are auto loading standards, defined by [PHP-FIG](http://www.php-fig.org). Composer also create a class named `vendor/autoload.php`. We just need to include that class in our front controller (initial script) and rest classes installed through composer can be automatically loaded.

However there is a problem, classes downloaded through composer can be automatically loaded but what about classes we created? Well composer takes care of them as well. We just need to tell composer where our classes are.

For this project, we will have following structure

```bash
tddworkshop
 |
 |- src
 |   |
 |   `- phpreboot (namespace phpreboot)
 |       |
 |       `- tddworkshop (namespace phpreboot\tddworkshop)
 `- tests
     |
     `- phpreboot (namespace phpreboot)
         |
         `- tddworkshop (namespace phpreboot\tddworkshop)
```

We need to tell composer that whenever we say namespace `phpreboot`, it should look folder `src/phpreboot` or `tests/phpreboot`. However `tests` folder contains only test so it will be needed only while development, but not on production. Fot this, we need to add following in our `composer.json` file.

```json
  "autoload": {
    "psr-4": {"Phpreboot\\": "src/Phpreboot"}
  },
  "autoload-dev": {
    "psr-4": {"Phpreboot\\": "tests/Phpreboot"}
  },
```

I guess above changes are pretty clear to read. We are using PSR-4 autoloading. This is enough for now but I recommend reading more about composer. With these changes, my final `composer.json` file looks like following.

```json
{
    "name": "kapilsharma/tddworkshop",
    "description": "Sample code for Test Driven Development (TDD) workshop.",
    "license": "MIT",
    "authors": [
        {
            "name": "kapilsharma",
            "email": "kapil@kapilsharma.info"
        }
    ],
    "autoload": {
      "psr-4": {"Phpreboot\\": "src/Phpreboot"}
    },
    "autoload-dev": {
      "psr-4": {"Phpreboot\\": "tests/Phpreboot"}
    },
    "require": {},
    "require-dev": {
        "phpunit/phpunit": "4.8"
    }
}
```

As final step, run `composer install` on terminal for changes to take effect.

## Tests

We are going to do Test Driven Development. This simply means first write test; obviously that will fail but no problem. Let our test fail and then write code to make that test successful. Lets write our first test.

### Test 1: Calculator class exists.

As per our structure, lets create folders to hold our test class.

```
mkdir tests
cd tests
mkdir phpreboot
cd phpreboot
mkdir tddworkshop
cd tddworkshop
touch CalculatorTest.php
```

Now open `CalculatorTest.php` and write following code in it.

```php
<?php
namespace phpreboot\tddworkshop;

use phpreboot\tddworkshop\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function tearDown()
    {
        $this->calculator = null;
    }

    public function testAddReturnsAnInteger()
    {
        $result = $this->calculator->add();

        $this->assertInternalType('integer', $result, 'Result of `add` is not an integer.');
    }
}
```

Let me explain this code a bit. Since we are using namespace, first line of code must define namespace. Although namespace in tests are not mandatory but it might be handy in few conditions so its always good idea to define namespace.

Next line suggest we want to use class `Calculator`. Obviously that class still do not exist but in TDD, we do not worry about actual status but expected status and we expect that class Calculator must be existing.

Then we have Test class. Name of all PHP Unit test class should end with `Test`. Thus we generally name it as `<classname>Test`. Here we are supposed to test `Calculator` class so obvious name is `CalculatorTest`. Also all test classes must extend `\PHPUnit_Framework_TestCase` so that we can get benefit of methods defined by PHP Unit.

Next we defined a property $calculator and two methods `setUp` and `tearDown`. For testing Calculator class, we must create its instance and we will save that instance in class variable `$calculator`.

At broader level, we can consider `setup` and `tearDoan` as constructor and destructor respectively but not exactly. In PHP Unit, these two methods are called before and after every test. For each test, we need new instance of Calculator so we do it in `setUp` method. Once test is finished, we no longer need Calculator instance so we make it null. Another reason of making it null is, I don't want one test impact another test in any way. Thus making calculator null ensure it.

And finally we have a test `testAddReturnsAnInteger`. All test methods must have a `test` prefix (And class have `Test` suffix). Our Calculator class must have an `add` function (first command line argument) which should return an integer. So in our first test, we are testing `add` method must return an integer. You may be little surprised with name of function but we will soon come to that. For now, just believe it is a good name.

First line of test `testAddReturnsAnInteger` is pretty clear, we are calling `add` method without any parameters. Second line starts with `$this->assertInternalType`. php unit provide several `assert***` methods to test different conditions. `assertInternalType`, checks if we have particular primitive type of a variable. Like most `assert***` methods, it take three parameters; expected value, actual value and optional message to display in case test fails. We should write test message carefully as once you have several thousand tests, you should be able to identify exact test which failed. We will discuss more about it shortly.

### PHP Unit configuration

This section is about `phpunit.xml` file. If you are aware about PHP Unit configuration, please skip this section.

Now we have PHP Unit installed and a Test written, its time to run tests. But wait, we need some settings. We need to define `phpunit.xml` file. In `phpunit.xml` file, we define some common configuration for PHP Unit like which classes should be tested, how do we want result to be saved/displayed or some initialization tasks. So lets create a file `phpunit.xml` at project root

```bash
cd ../../..
touch phpunit.xml
```

and add following code

```xml
<?xml version="1.0" encoding="UTF-8"?>

<phpunit bootstrap="vendor/autoload.php" colors="true">
    <testsuites>
        <testsuite name="TDDWorkshop">
            <directory>tests/phpreboot/</directory>
        </testsuite>
    </testsuites>

    <filter>
        <whitelist>
            <directory suffix=".php">src/Phpreboot/</directory>
        </whitelist>
    </filter>

    <logging>
        <log type="coverage-html" target="./log/codeCoverage" charset="UTF-8"
             yui="true" highlight="true"
             lowUpperBound="50" highLowerBound="80"/>
        <log type="testdox-html" target="./log/testdox.html" />
    </logging>
</phpunit>
```

First line is simple xml declaration. Second line define xml root tag and have two attributes. First attribute `bootstrap` tells PHP Unit how to initialize our application for testing purpose. It essentially is a script to initialize all classes and settings needed so that test can execute successfully. In our case, we need to autoload classes as if you remember, we didn't included `Calculator` class in our test but using it. since composer provide us a good autoloader, we are using it to bootstrap our PHP Unit. Second attribute just tell we need colourful output in our terminal, if supported.

Next block `testsuites` define our testsuite. Testsuite is a collection of few test cases. We want to execute all tsts under `tests/phpreboot` folder so we simply added that directory. We also defined name of the testsuite. Here we are having only one test suite but if we have multiple test suites, with name, we can execute only one test suite at a time. This is specially important when we have huge product with several thousands of tests; we will obviously wont like to run them all.

Next block is `filters`. PHP Unit can also create code completion reports. It need xdebug to be installed on the system. If you have xdebug installed, you can actually see code completion reports once you executed tests. Code completion report just tell how much part of your code is covered by PHP Unit tests, which is very handy at times. This block contains `whitelist`. In whitelist, we define classes/folders for which we want to generate code completion report. Lets generate report for our whole src folder, but only for php files.

Next section `logging` defines how do we want to save test reports. IT contains two log tags, one for code coverage report and other testdox. We will check testdox shortly in details.

So we have `phpunit.xml` file. However it is not a good idea to commit `phpunit.xml` on git. First reason, we do not run tests on production so we will not need it there and second, every developer may have different need from PHP unit. If you have huge product with many developers working on several modules and have several thousand test cases, a developer might want to edit phpunit.xml locally to run tests of only his module. Lets follow best practices and make a copy of `phpunit.xml`. Run command `cp phpunit.xml phpunit.xml.dist`. This will create a copy of phpunit.xml with name `phpunit.xml.dist` and we will commit dist file. Also do not forget to add phpunit.xml in `.gitignore` file.

### Running first test.

Now we are all set to run our first test. Open terminal, go to project root and run following command

```bash
vendor/bin/phpunit
```

As expected, running this test will give following fatal error

```bash
PHP Fatal error:  Class 'phpreboot\tddworkshop\Calculator' not found in /home/kapil/dev/github/phpreboot/tddworkshop/tests/phpreboot/tddworkshop/CalculatorTest.php on line 20
```

We do not have `Calculator class and we are trying to create its instance in `setUp` method. Lets fix this issue and make Calculator class. Run following commands from project root.

```bash
mkdir src
cd src
mkdir phpreboot
cd phpreboot
mkdir tddworkshop
cd tddworkshop
touch Calculator.php
```

Now open `Calculator.php` and add following code:

```php
<?php
namespace phpreboot\tdddevelopment;

class Calculator
{

}
```

We created the class, lets run our test again. We still get fatal error but this time, its different error.

```bash
PHP Fatal error:  Call to undefined method phpreboot\tddworkshop\Calculator::add() in /home/kapil/dev/github/phpreboot/tddworkshop/tests/phpreboot/tddworkshop/CalculatorTest.php on line 30
```

Obvious, we are trying to call `add` method on Calculator, which do not exist. Lets make it.

```php
    public function add()
    {
    }
```

and run test again. This time we do not have any error but our test failed with message

```bash
There was 1 failure:

1) phpreboot\tddworkshop\CalculatorTest::testAddReturnsAnInteger
Result of `add` is not an integer.
Failed asserting that null is of type "integer".

/home/kapil/dev/github/phpreboot/tddworkshop/tests/phpreboot/tddworkshop/CalculatorTest.php:32
```

We are expecting `add` method should return an integer but it returned nothing (null) and thus our test failed. LEts return `0` for now. Add `return 0;` in the method and run test again.

And finally, we got our test passing.

```bash
.

Time: 69 ms, Memory: 4.00MB

OK (1 test, 1 assertion)
```

Before we commit our files, please note, there is a new `log` folder. If you remember, in `phpunit.xml` we asked two reports in `logging` section. However we do not want to commit reports so lets put `log` in `.gitignore` and commit.