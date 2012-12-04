<?php

/*
 * This file is a part of dflydev/apache-mime-types.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__.'/../vendor/autoload.php';

$map = Dflydev\ApacheMimeTypes\Parser::parse(__DIR__.'/../src/Dflydev/ApacheMimeTypes/Resources/mime.types');
file_put_contents(__DIR__.'/../src/Dflydev/ApacheMimeTypes/Resources/mime.types.json', json_encode($map));

$fixturesMap = Dflydev\ApacheMimeTypes\Parser::parse(__DIR__.'/../tests/Dflydev/ApacheMimeTypes/Fixtures/mime.types');
file_put_contents(__DIR__.'/../tests/Dflydev/ApacheMimeTypes/Fixtures/mime.types.json', json_encode($fixturesMap));

