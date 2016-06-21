<?php

/**
 * File base store for table: file

 */

namespace Octo\File\Store\Base;

use Octo\Store;
use Octo\File\Model\File;
use Octo\File\Model\FileCollection;

/**
 * File Base Store
 */
class FileStoreBase extends Store
{
    protected $table = 'file';
    protected $model = 'Octo\File\Model\File';
    protected $key = 'id';

    /**
    * @param $value
    * @return File|null
    */
    public function getByPrimaryKey($value)
    {
        return $this->getById($value);
    }


    /**
     * Get a File object by Id.
     * @param $value
     * @return File|null
     */
    public function getById(string $value)
    {
        // This is the primary key, so try and get from cache:
        $cacheResult = $this->cacheGet($value);

        if (!empty($cacheResult)) {
            return $cacheResult;
        }

        $rtn = $this->where('id', $value)->first();
        $this->cacheSet($value, $rtn);

        return $rtn;
    }

    /**
     * Get all File objects by UserId.
     * @return \Octo\File\Model\FileCollection
     */
    public function getByUserId($value, $limit = null)
    {
        return $this->where('user_id', $value)->get($limit);
    }

    /**
     * Gets the total number of File by UserId value.
     * @return int
     */
    public function getTotalByUserId($value) : int
    {
        return $this->where('user_id', $value)->count();
    }
}
