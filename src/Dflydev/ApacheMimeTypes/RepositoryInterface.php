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
 * Repository
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
interface RepositoryInterface
{
    /**
     * Dump extension to content type map
     *
     * @return array
     */
    public function dump();

    /**
     * Find all extensions for a type
     *
     * @param string $type
     *
     * @return array
     */
    public function findExtensions($type);

    /**
     * Find a type for an extension
     *
     * @param string $extension
     *
     * @return string
     */
    public function findType($extension);
}
