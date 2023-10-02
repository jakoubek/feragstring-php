# feragstring-php

feragstring-php is a PHP library for creating a FERAG string file ("TSL file") programmatically from PHP code. This is the PHP equivalent to my Go package [feragstring](https://github.com/jakoubek/feragstring).

Again: If you don't know what FERAG (the company) or a FERAG string/TSL file is you probably don't need this package ;-)

## Usage

```php
// create a FERAG string object
$fs = new Feragstring();
$fs->SetTitleName("EDITION1");

// set title parameters
$fs->titleInfo->setPrintObjectName("EDITION1A");

...

// get the FERAG string (the write it to a file...) 
$fileContent = $fs->PrintOut();
```
