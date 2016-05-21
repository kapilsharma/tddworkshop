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

## Composer

Composer is a tool to manage dependencies of your PHP project. We too have few dependencies on third party libraries. So lets first install composer.

### Installing composer

Composer website is the best source of updated composer installation steps. Please visit [linux-unix-mac](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) section for installation instructions on Linux and Mac OS. For windows, please check [windows](https://getcomposer.org/doc/00-intro.md#using-the-installer) section.

## Initializing (composer) project

Running `composer init` will initialize composer. Sample output of command is as follow:

```bash
kapil@PHPReboot:~/dev/github/phpreboot/tddworkshop$ composer init

                                            
  Welcome to the Composer config generator  
                                            


This command will guide you through creating your composer.json config.

Package name (<vendor>/<name>) [root/tddworkshop]: kapilsharma/tddworkshop
Description []: Sample code for Test Driven Development (TDD) workshop.
Author [kapilsharma <kapil@kapilsharma.info>, n to skip]: 
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

**Packagename (vendor/name):** I used `kapilsharma/tddworkshop`. Here `vendor` is company name or or you may use your own name, for me, it was `kapilsharma`. `name` is project name, for me, it was `tddworkshop`.

**Description:** This is optional. Just enter some description of project. If you do not want to enter description, simple press `enter`.

**Author:** Obviously you. Format is `name <email>`. For me, it was `kapilsharma <kapil@kapilsharma.info>`.

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

To install PHP Unit 4.8 through composer, run command `composer require --dev phpunit/phpunit:4.8`. Please not `--dev` flag. This tells composer that we need PHP Unit only on development system, not on production. Running this command will install PHP Unit and following lines in composer.json

```json
    "require-dev": {
        "phpunit/phpunit": "4.8"
    }
```

It will also create a folder `vendor`. All packages installed by composer goes in vendor directory. Hopefull it will also add `vendor` directory in your `.gitignore` file but if it do not, add `/vendor/` in .gitignore file on separate line. My .gitignore files now looks as follow:

```
.idea
/vendor/
```

We have PHP Unit installed. We will soon use it, be patient for few more minutes.

## Auto loading.

