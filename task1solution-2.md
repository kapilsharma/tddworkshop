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

sum method is supposed to accept 0 or 1 parameter. If there is one string parameter, there are two cases:

- Either it is a single number. In that case, we need to return same number.
- It could also be a string of two numbers, separated by comma. In that case, we need to add these numbers and return its sum.

There is a case when there is no parameter supplied. In that case, we should return 0. We have actually achieved that but lets write a test to confirm that.

## Test sum without parameter returns zero.

To test it, lets add following test at the end of CalculatorTest class.

```php
    public function testSumWithoutParameterReturnsZero()
    {
        $result = $this->calculator->add();
        $this->assertSame(0, $result, 'Empty string on add do not return 0');
    }
```

First line of test is pretty clear, we are just calling `add` method and saving result in `$result` variable.

In second line, which is actually a test, we used PHP Unit's `assertSame` method. I recommend to go through PHP Unit documentations to know about all `assert***` methods. In short, `assertSame` and `assertEquals` check if expected and actual result are same? Difference, assertEquals check `expected == actual` and assertSame check `expected === actual`.

As prerequisite of this course, I expect you know difference between `==` and `===`. If no, you must first learn a bit more about PHP.

In short, assertSame check value as well as type so ideally two tests for me. Now lets run the test. If you forgot, command is `vendor/bin/phpunit` in project root. Output of test is `OK (2 tests, 2 assertions)`, everything passing. 