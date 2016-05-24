# PHP Reboot Test Driven Development Workshop

This is task 4 of Test driven development workshop and will just extend task 3. If you have not seen earlier tasks, [click here](README.md) to go back to task 1.

## Task 4

Support different delimiters

Add method should allow to define what delimiter is used to separate numbers. Format `\\[delimiter]\\numbers`. To make it easy, `\` will never be a part of delimiter.

Thus, following command is possible.

```bash
php calculator.php add \\;\\3;4;5
```

and its output will be `12`.