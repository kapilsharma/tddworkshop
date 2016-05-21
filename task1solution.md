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

If you are not already having git installed, do it. Just google 'install git on <your OS>'. Its easy part so I'm not covering it here.

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
