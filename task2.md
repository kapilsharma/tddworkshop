# PHP Reboot Test Driven Development Workshop

This is task 2 of Test driven development workshop and will just extend task 1. If you have not seen task 1, [click here](README.md) to go back to task 1.

## Task 2

Handle multiple numbers in add method.

**Details**

In task 1, we were handling 0, 1 or 2 parameters. Now we need to add capability of handling multiple numbers so that all following commands work correctly.

```bash
php calculator.php add
php calculator.php add 1
php calculator.php add 2,3
php calculator.php add 4,5,6
php calculator.php add 2,3,4,5
php calculator.php add 4,7,3,4,7,3,5,6,7,4,3,2,5,7,5,3,4,6,7,8,9,5,5,5,4,3,2
```

Obviously, its output should be:

```bash
0
1
5
15
14
133
```

In short, it should be able to take multiple numbers and should add them.

**Hints**

Well program is able to do that, all you need is to add test cases. There will be a new concept of data-providers.