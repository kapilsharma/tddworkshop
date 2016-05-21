# PHP Reboot Test Driven Development Workshop

Hi, I'm Kapil Sharma. This repository represent notes, exercises for TDD Workshop for PHP Reboot.

> Warning: All code and notes are committed in this repository. However if you really wish to learn TDD, please do not to look up the code. Code is there to just help you out in case you are badly stuck and can't find a way out.

This file is the starting point and you must move forward as suggested in ths file.

This short course expect you have decent knowledge of PHP. However if you do not have knowledge of git, composer, PHP Unit or any other things required in this course, its basics will be covered to get you started.

# Project

Please note, we are not going to make a commercial project. Project for this course is just a learning project, that we will make with TDD approach.

So we are going to make a command line calculator. We will start with minimal functionality and with time, add other features in our command line calculator.

# Preparing the project

Well, code will be open source project, committed on github.

You are not supposed to make it open source but I strongly recommend to make it open source and at the end, let me know to check your project. As soon as I get some time, I'll check your code and let you know if there are some improvement points. To tell me about your code, just tweet

> @kapilsharmainfo @phpreboot check TDD workshop code at <Github repo URL>

(and follow me on twitter. LOL. That's not necessary.)

## Install git

If you are not already having git installed, do it. Just google 'install git on <your OS>'. Its easy part so I'm not covering it.

## Create project

Just open terminal and create a folder `tddworkshop` on desired location. We can also initiate a git repository

```bash
mkdir tddworkshop
cd tddworkshop
git init
```

This will create a folder `.git`. Also, I do not want to commit few files to git, foe example, I'm using PHP Storm which create a folder `.idea` or Netbeans create `nbproject`. This is important as these folder are necessary locally but not the part of my project. To do that, just create a file `.gitignore` and write name of file/folder, you do not want to commit. My `.gitignore` file has following content

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

If you do not know git and github, required steps can be seen at [firstcommit.md]

