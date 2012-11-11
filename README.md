CodePathAnalyzer
================

Analyze code path of specified file using XDebug.

Synopsis
--------

Put below code on first of code you want to analyze as much as possible.

```php
<?php
require_once '/path/to/Yuyat/CodePathAnalyzer/Registrar.php';

Yuyat_CodePathAnalyzer_Registrar::registerDefault(
    array(__FILE__),      // You can specify more files you want to analyze
                          // If you want to analyze all files, just specify null
    '/path/to/save_path', // Analysis result is output here
);
```

License
-------

The MIT License

Author
------

Yuya Takeyama
