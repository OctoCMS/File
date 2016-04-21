<?php

/**
 * File model collection
 */

namespace Octo\File\Model;

use Octo;
use b8\Model\Collection;

/**
 * File Model Collection
 */
class FileCollection extends Collection
{
    /**
     * Add a File model to the collection.
     * @param string $key
     * @param File $value
     * @return FileCollection
     */
    public function addFile($key, File $value)
    {
        return parent::add($key, $value);
    }

    /**
     * @param $key
     * @return File|null
     */
    public function get($key)
    {
        return parent::get($key);
    }
}
