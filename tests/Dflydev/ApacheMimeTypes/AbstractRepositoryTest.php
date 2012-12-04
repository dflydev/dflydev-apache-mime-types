<?php

/*
 * This file is a part of dflydev/apache-mime-types.
 *
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dflydev\ApacheMimeTypes;

/**
 * Flat Repository Test
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
abstract class AbstractRepositoryTest extends \PHPUnit_Framework_TestCase
{
    abstract protected function createDefaultRepository();
    abstract protected function createRepository();

    public function testDefaultCss()
    {
        $repository = $this->createDefaultRepository();

        $this->assertEquals('text/css', $repository->findType('css'));

        $extensions = $repository->findExtensions('text/css');
        $this->assertCount(1, $extensions);
        $this->assertEquals('css', $extensions[0]);
    }

    public function testDefaultHtml()
    {
        $repository = $this->createDefaultRepository();

        $this->assertEquals('text/html', $repository->findType('html'));
        $this->assertEquals('text/html', $repository->findType('htm'));

        $extensions = $repository->findExtensions('text/html');
        $this->assertCount(2, $extensions);
        $this->assertEquals('html', $extensions[0]);
        $this->assertEquals('htm', $extensions[1]);
    }

    public function testDefaultMissing()
    {
        $repository = $this->createDefaultRepository();

        $this->assertTrue(is_array($repository->findExtensions('foobar/missing')));
        $this->assertEmpty($repository->findExtensions('foobar/missing'));
        $this->assertNull($repository->findType('shouldnotexist'));
    }

    public function testMissing()
    {
        $repository = $this->createRepository();

        $this->assertTrue(is_array($repository->findExtensions('foobar/missing')));
        $this->assertEmpty($repository->findExtensions('foobar/missing'));
        $this->assertNull($repository->findType('shouldnotexist'));
    }

    public function testFabricated()
    {
        $repository = $this->createRepository();

        $extensions = $repository->findExtensions('dflydev/apache-mime-types');
        $this->count(2, $extensions);
        $this->assertEquals('dflydevamt', $extensions[0]);
        $this->assertEquals('ddevamt', $extensions[1]);
    }

    public function testDump()
    {
        $repository = $this->createRepository();

        $dump = $repository->dump();

        $this->assertCount(2, array_keys($dump));
        $this->assertArrayHasKey('dflydev/apache-mime-types', $dump);
        $this->assertArrayHasKey('dflydev/yet-another-mime-type', $dump);
    }
}
