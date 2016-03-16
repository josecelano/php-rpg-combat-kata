# RPG Combat Kata

More info: http://www.slideshare.net/DanielOjedaLoisel/rpg-combat-kata

## phpunit

Next, to execute the unit tests you need run this from the *php* directory

```shell
    .\bin\phpunit
```    
    
Coverage:

If your IDE doesn't handle it you can launch and visualize it from the command line. Given you are in  the *php* folder
just run

```shell
    .\bin\phpunit --coverage-text
```

If you want to visualize it from the browser you have to run PHPUnit with this parameters

```shell
    .\bin\phpunit --coverage-html report/
```

Then visualize

```shell
    .\report\index.html
```

in a browser.