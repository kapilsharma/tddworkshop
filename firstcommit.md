## First commit

First commit should be generally a simple file like above readme file. This is important in case you want to see the diff of your first real commit for code review purpose.

Just go to terminal and type `git status`. You should see only two files; .gitignore and README.md. Run following commands to commit them.

```
git add .gitignore
git add README.md
git commit -m "First commit"
```

First two lines instruct git that we want to add given file in next commit. In git terms, we are staging it; Stage to commit. If you do not already know git, learn about it, you will love it.

Third line is actually committing both files. However git is distributed version control system that means even if you committed files, they are still saved locally. We definitely want to save (push in git terms) it to a central server from where others may get them. We will use github for this purpose.

## Creating github account

I hope we all have github account but if you do not, please go to github.com and register.

## Creating github repository

A repository is a central place, where different developers of a team may connect to get each others code. Please note, this wil open source your code so that you can ask me to review your code, once done. If you do not want to open source your learning code, to not perform this step.

Once you have github account, you can create a new repository for your code. Login to github.com. On top-right, you will see a `+` icon. Click on it and select `New repository`.

On next screen, enter repository name `tddworkshop` and click `Create repository` button.

Next page will suggest how to push your code. Since we already created local repository, block `or push an existing repository from the command line` apply to us. Run two suggested commands (Not copy my commands as repo URL are different) like

```bash
git remote add origin https://github.com/kapilsharma/tddworkshop.git
git push -u origin master
```

Second command will ask your github user name and password.