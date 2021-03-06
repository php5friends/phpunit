--TEST--
phpunit FatalTest --process-isolation ../_files/FatalTest.php
--SKIPIF--
<?php
if (PHP_VERSION_ID >= 80000) die('Skipped: xdebug_disable() is obsolete in PHP8 or later'); ?>
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--process-isolation';
$_SERVER['argv'][3] = 'FatalTest';
$_SERVER['argv'][4] = dirname(dirname(__FILE__)) . '/_files/FatalTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit_TextUI_Command::main();
?>
--EXPECTF--
PHPUnit48 %s by Sebastian Bergmann and contributors.  (modified by php5friends)

E

Time: %s, Memory: %s

There was 1 error:

1) FatalTest::testFatalError
%s

FAILURES!
Tests: 1, Assertions: 0, Errors: 1.
