# Slack

A thin wrapper around Slack API

## Install packages from Github

Edit */composer.json* in your project root folder

```json
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/64kbytes/slack"
        }
    ]
```
> Requiring a package from Github we need to require also it's dependencies. Please refer to [Why can't Composer load repositories recursively?](https://getcomposer.org/doc/faqs/why-can%27t-composer-load-repositories-recursively.md)

Then edit */config/app.php*
```php
'providers' => [
    Baytree\Slack\SlackServiceProvider::class
]
```

## Install for developing
Here is how I do it:

Provided a fresh Laravel installation in */workbench/laravel*:
1. Clone this repo in */workbench/packages/baytree/\<package-name\>*
2. cd to */workbench/laravel/packages/baytree*
3. ``` $ ln -s ../../packages/<package-name> <package-name> ```
4. cd to */workbench/packages/\<package-name\>*

## Documentation

In package root folder, run ``` $ composer update ``` in order to install phpDocumentor, then run ``` $ composer makedoc ```

Built docs will be available in */docs* at package root folder. Open */docs/index.html* with a browser. 


