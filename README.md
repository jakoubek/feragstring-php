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

## Supported messages

- Title Info (%2440)
- Product Reference (%2450)
- Route List Entry (%2401)
- Route Info (%2402)
- Production Drop (%2403)
- Topsheet Data for TSL (%2414)
- Route End (%2406)
- Title End (%2441)

## Installation

Installation gets done with Composer:

```bash
composer require jakoubek/feragstring-php
``` 

## Need commercial support?

I offer commercial support for newspaper companies who want to setup their own FERAG string/TSL file generation.

See https://www.jakoubek.net/ferag-string-erzeugen (German) or write an email to <a href="mailto:info@jakoubek.net">info@jakoubek.net</a>.


