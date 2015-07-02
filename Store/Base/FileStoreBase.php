<?php

/**
 * File base store for table: file
 */

namespace Octo\File\Store\Base;

use PDOException;
use b8\Cache;
use b8\Database;
use b8\Database\Query;
use b8\Database\Query\Criteria;
use b8\Exception\StoreException;
use Octo\Store;
use Octo\File\Model\File;
use Octo\File\Model\FileCollection;

/**
 * File Base Store
 */
trait FileStoreBase
{
    protected function init()
    {
        $this->tableName = 'file';
        $this->modelName = '\Octo\File\Model\File';
        $this->primaryKey = 'id';
    }
    /**
    * @param $value
    * @param string $useConnection Connection type to use.
    * @throws StoreException
    * @return File
    */
    public function getByPrimaryKey($value, $useConnection = 'read')
    {
        return $this->getById($value, $useConnection);
    }


    /**
    * @param $value
    * @param string $useConnection Connection type to use.
    * @throws StoreException
    * @return File
    */
    public function getById($value, $useConnection = 'read')
    {
        if (is_null($value)) {
            throw new StoreException('Value passed to ' . __FUNCTION__ . ' cannot be null.');
        }
        // This is the primary key, so try and get from cache:
        $cacheResult = $this->getFromCache($value);

        if (!empty($cacheResult)) {
            return $cacheResult;
        }


        $query = new Query($this->getNamespace('File').'\Model\File', $useConnection);
        $query->select('*')->from('file')->limit(1);
        $query->where('`id` = :id');
        $query->bind(':id', $value);

        try {
            $query->execute();
            $result = $query->fetch();

            $this->setCache($value, $result);

            return $result;
        } catch (PDOException $ex) {
            throw new StoreException('Could not get File by Id', 0, $ex);
        }
    }

    /**
     * @param $value
     * @param array $options Offsets, limits, etc.
     * @param string $useConnection Connection type to use.
     * @throws StoreException
     * @return int
     */
    public function getTotalForCategoryId($value, $options = [], $useConnection = 'read')
    {
        if (is_null($value)) {
            throw new StoreException('Value passed to ' . __FUNCTION__ . ' cannot be null.');
        }

        $query = new Query($this->getNamespace('File').'\Model\File', $useConnection);
        $query->from('file')->where('`category_id` = :category_id');
        $query->bind(':category_id', $value);

        $this->handleQueryOptions($query, $options);

        try {
            return $query->getCount();
        } catch (PDOException $ex) {
            throw new StoreException('Could not get count of File by CategoryId', 0, $ex);
        }
    }

    /**
     * @param $value
     * @param array $options Limits, offsets, etc.
     * @param string $useConnection Connection type to use.
     * @throws StoreException
     * @return FileCollection
     */
    public function getByCategoryId($value, $options = [], $useConnection = 'read')
    {
        if (is_null($value)) {
            throw new StoreException('Value passed to ' . __FUNCTION__ . ' cannot be null.');
        }

        $query = new Query($this->getNamespace('File').'\Model\File', $useConnection);
        $query->from('file')->where('`category_id` = :category_id');
        $query->bind(':category_id', $value);

        $this->handleQueryOptions($query, $options);

        try {
            $query->execute();
            return new FileCollection($query->fetchAll());
        } catch (PDOException $ex) {
            throw new StoreException('Could not get File by CategoryId', 0, $ex);
        }

    }

    /**
     * @param $value
     * @param array $options Offsets, limits, etc.
     * @param string $useConnection Connection type to use.
     * @throws StoreException
     * @return int
     */
    public function getTotalForUserId($value, $options = [], $useConnection = 'read')
    {
        if (is_null($value)) {
            throw new StoreException('Value passed to ' . __FUNCTION__ . ' cannot be null.');
        }

        $query = new Query($this->getNamespace('File').'\Model\File', $useConnection);
        $query->from('file')->where('`user_id` = :user_id');
        $query->bind(':user_id', $value);

        $this->handleQueryOptions($query, $options);

        try {
            return $query->getCount();
        } catch (PDOException $ex) {
            throw new StoreException('Could not get count of File by UserId', 0, $ex);
        }
    }

    /**
     * @param $value
     * @param array $options Limits, offsets, etc.
     * @param string $useConnection Connection type to use.
     * @throws StoreException
     * @return FileCollection
     */
    public function getByUserId($value, $options = [], $useConnection = 'read')
    {
        if (is_null($value)) {
            throw new StoreException('Value passed to ' . __FUNCTION__ . ' cannot be null.');
        }

        $query = new Query($this->getNamespace('File').'\Model\File', $useConnection);
        $query->from('file')->where('`user_id` = :user_id');
        $query->bind(':user_id', $value);

        $this->handleQueryOptions($query, $options);

        try {
            $query->execute();
            return new FileCollection($query->fetchAll());
        } catch (PDOException $ex) {
            throw new StoreException('Could not get File by UserId', 0, $ex);
        }

    }
}
