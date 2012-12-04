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
 * Abstract Repository
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
abstract class AbstractRepository implements RepositoryInterface
{
    protected $typeToExtensions;
    protected $extensionToType;

    /**
     * Set from map
     *
     * @param array $map
     */
    protected function setFromMap(array $map)
    {
        $this->typeToExtensions = $map;

        $this->extensionToType = array();
        foreach ($this->typeToExtensions as $type => $extensions) {
            foreach ($extensions as $extension) {
                if (!isset($this->extensionToType[$extension])) {
                    $this->extensionToType[$extension] = $type;
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function dump()
    {
        return $this->typeToExtensions;
    }

    /**
     * {@inheritdoc}
     */
    public function findExtensions($type)
    {
        if (isset($this->typeToExtensions[$type])) {
            return $this->typeToExtensions[$type];
        }

        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function findType($extension)
    {
        if (isset($this->extensionToType[$extension])) {
            return $this->extensionToType[$extension];
        }

        return null;
    }
}
