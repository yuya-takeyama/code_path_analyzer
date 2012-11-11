<?php
require_once dirname(__FILE__) . '/../src/Yuyat/CodePathAnalyzer/Registrar.php';

Yuyat_CodePathAnalyzer_Registrar::registerDefault(
    __FILE__,
    dirname(__FILE__) . '/output'
);

if (false) {
    // hoge
    $foo = "bar";
} else {
    foreach (range(1, 100) as $i) {
        switch ($i % 3) {
        case 0:
        case 1:
            foo();
            break;

        case 2:
            $foo = "hoga";
            break;

        case 3:
        case 4:
            $bar = "baz";
        case 5:
            $baz = "foobar";
            break;

        default:
            $foo;
        }
    }

    $foo = "bar";
}

exit;

function foo() {
    bar();

    return true;

    "hoge";
}

function bar() {
    $foo = true;

    return;
}
