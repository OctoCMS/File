<?php

/**
 * File base model for table: file
 */

namespace Octo\File\Model\Base;

use DateTime;
use Block8\Database\Query;
use Octo\Model;
use Octo\Store;

use Octo\File\Store\FileStore;
use Octo\File\Model\File;
use Octo\System\Model\User;

/**
 * File Base Model
 */
abstract class FileBase extends Model
{
    protected $table = 'file';
    protected $model = 'File';
    protected $data = [
        'id' => null,
        'scope' => null,
        'filename' => null,
        'title' => null,
        'mime_type' => null,
        'extension' => null,
        'created_date' => null,
        'updated_date' => null,
        'user_id' => null,
        'size' => null,
        'meta' => null,
    ];

    protected $getters = [
        'id' => 'getId',
        'scope' => 'getScope',
        'filename' => 'getFilename',
        'title' => 'getTitle',
        'mime_type' => 'getMimeType',
        'extension' => 'getExtension',
        'created_date' => 'getCreatedDate',
        'updated_date' => 'getUpdatedDate',
        'user_id' => 'getUserId',
        'size' => 'getSize',
        'meta' => 'getMeta',
        'User' => 'getUser',
    ];

    protected $setters = [
        'id' => 'setId',
        'scope' => 'setScope',
        'filename' => 'setFilename',
        'title' => 'setTitle',
        'mime_type' => 'setMimeType',
        'extension' => 'setExtension',
        'created_date' => 'setCreatedDate',
        'updated_date' => 'setUpdatedDate',
        'user_id' => 'setUserId',
        'size' => 'setSize',
        'meta' => 'setMeta',
        'User' => 'setUser',
    ];

    /**
     * Return the database store for this model.
     * @return FileStore
     */
    public static function Store() : FileStore
    {
        return FileStore::load();
    }

    /**
     * Get File by primary key: id
     * @param string $id
     * @return File|null
     */
    public static function get(string $id) : ?File
    {
        return self::Store()->getById($id);
    }

    /**
     * @throws \Exception
     * @return File
     */
    public function save() : File
    {
        $rtn = self::Store()->save($this);

        if (empty($rtn)) {
            throw new \Exception('Failed to save File');
        }

        if (!($rtn instanceof File)) {
            throw new \Exception('Unexpected ' . get_class($rtn) . ' received from save.');
        }

        $this->data = $rtn->toArray();

        return $this;
    }


    /**
     * Get the value of Id / id
     * @return string
     */
     public function getId() : string
     {
        $rtn = $this->data['id'];

        return $rtn;
     }
    
    /**
     * Get the value of Scope / scope
     * @return string
     */
     public function getScope() : ?string
     {
        $rtn = $this->data['scope'];

        return $rtn;
     }
    
    /**
     * Get the value of Filename / filename
     * @return string
     */
     public function getFilename() : ?string
     {
        $rtn = $this->data['filename'];

        return $rtn;
     }
    
    /**
     * Get the value of Title / title
     * @return string
     */
     public function getTitle() : ?string
     {
        $rtn = $this->data['title'];

        return $rtn;
     }
    
    /**
     * Get the value of MimeType / mime_type
     * @return string
     */
     public function getMimeType() : ?string
     {
        $rtn = $this->data['mime_type'];

        return $rtn;
     }
    
    /**
     * Get the value of Extension / extension
     * @return string
     */
     public function getExtension() : ?string
     {
        $rtn = $this->data['extension'];

        return $rtn;
     }
    
    /**
     * Get the value of CreatedDate / created_date
     * @return DateTime
     */
     public function getCreatedDate() : ?DateTime
     {
        $rtn = $this->data['created_date'];

        if (!empty($rtn)) {
            $rtn = new DateTime($rtn);
        }

        return $rtn;
     }
    
    /**
     * Get the value of UpdatedDate / updated_date
     * @return DateTime
     */
     public function getUpdatedDate() : ?DateTime
     {
        $rtn = $this->data['updated_date'];

        if (!empty($rtn)) {
            $rtn = new DateTime($rtn);
        }

        return $rtn;
     }
    
    /**
     * Get the value of UserId / user_id
     * @return int
     */
     public function getUserId() : ?int
     {
        $rtn = $this->data['user_id'];

        return $rtn;
     }
    
    /**
     * Get the value of Size / size
     * @return int
     */
     public function getSize() : ?int
     {
        $rtn = $this->data['size'];

        return $rtn;
     }
    
    /**
     * Get the value of Meta / meta
     * @return array
     */
     public function getMeta() : ?array
     {
        $rtn = $this->data['meta'];

        $rtn = json_decode($rtn, true);

        if ($rtn === false) {
            $rtn = null;
        }

        return $rtn;
     }
    
    
    /**
     * Set the value of Id / id
     * @param $value string
     * @return File
     */
    public function setId(string $value) : File
    {

        if ($this->data['id'] !== $value) {
            $this->data['id'] = $value;
            $this->setModified('id');
        }

        return $this;
    }
    
    /**
     * Set the value of Scope / scope
     * @param $value string
     * @return File
     */
    public function setScope(?string $value) : File
    {

        if ($this->data['scope'] !== $value) {
            $this->data['scope'] = $value;
            $this->setModified('scope');
        }

        return $this;
    }
    
    /**
     * Set the value of Filename / filename
     * @param $value string
     * @return File
     */
    public function setFilename(?string $value) : File
    {

        if ($this->data['filename'] !== $value) {
            $this->data['filename'] = $value;
            $this->setModified('filename');
        }

        return $this;
    }
    
    /**
     * Set the value of Title / title
     * @param $value string
     * @return File
     */
    public function setTitle(?string $value) : File
    {

        if ($this->data['title'] !== $value) {
            $this->data['title'] = $value;
            $this->setModified('title');
        }

        return $this;
    }
    
    /**
     * Set the value of MimeType / mime_type
     * @param $value string
     * @return File
     */
    public function setMimeType(?string $value) : File
    {

        if ($this->data['mime_type'] !== $value) {
            $this->data['mime_type'] = $value;
            $this->setModified('mime_type');
        }

        return $this;
    }
    
    /**
     * Set the value of Extension / extension
     * @param $value string
     * @return File
     */
    public function setExtension(?string $value) : File
    {

        if ($this->data['extension'] !== $value) {
            $this->data['extension'] = $value;
            $this->setModified('extension');
        }

        return $this;
    }
    
    /**
     * Set the value of CreatedDate / created_date
     * @param $value DateTime
     * @return File
     */
    public function setCreatedDate($value) : File
    {
        $this->validateDate('CreatedDate', $value);

        if ($this->data['created_date'] !== $value) {
            $this->data['created_date'] = $value;
            $this->setModified('created_date');
        }

        return $this;
    }
    
    /**
     * Set the value of UpdatedDate / updated_date
     * @param $value DateTime
     * @return File
     */
    public function setUpdatedDate($value) : File
    {
        $this->validateDate('UpdatedDate', $value);

        if ($this->data['updated_date'] !== $value) {
            $this->data['updated_date'] = $value;
            $this->setModified('updated_date');
        }

        return $this;
    }
    
    /**
     * Set the value of UserId / user_id
     * @param $value int
     * @return File
     */
    public function setUserId(?int $value) : File
    {

        // As this column is a foreign key, empty values should be considered null.
        if (empty($value)) {
            $value = null;
        }


        if ($this->data['user_id'] !== $value) {
            $this->data['user_id'] = $value;
            $this->setModified('user_id');
        }

        return $this;
    }
    
    /**
     * Set the value of Size / size
     * @param $value int
     * @return File
     */
    public function setSize(?int $value) : File
    {

        if ($this->data['size'] !== $value) {
            $this->data['size'] = $value;
            $this->setModified('size');
        }

        return $this;
    }
    
    /**
     * Set the value of Meta / meta
     * @param $value array
     * @return File
     */
    public function setMeta($value) : File
    {
        $this->validateJson($value);

        if ($this->data['meta'] !== $value) {
            $this->data['meta'] = $value;
            $this->setModified('meta');
        }

        return $this;
    }
    

    /**
     * Get the User model for this  by Id.
     *
     * @uses \Octo\System\Store\UserStore::getById()
     * @uses User
     * @return User|null
     */
    public function getUser() : ?User
    {
        $key = $this->getUserId();

        if (empty($key)) {
           return null;
        }

        return User::Store()->getById($key);
    }

    /**
     * Set User - Accepts an ID, an array representing a User or a User model.
     * @throws \Exception
     * @param $value mixed
     * @return File
     */
    public function setUser($value) : File
    {
        // Is this a scalar value representing the ID of this foreign key?
        if (is_scalar($value)) {
            return $this->setUserId($value);
        }

        // Is this an instance of User?
        if (is_object($value) && $value instanceof User) {
            return $this->setUserObject($value);
        }

        // Is this an array representing a User item?
        if (is_array($value) && !empty($value['id'])) {
            return $this->setUserId($value['id']);
        }

        // None of the above? That's a problem!
        throw new \Exception('Invalid value for User.');
    }

    /**
     * Set User - Accepts a User model.
     *
     * @param $value User
     * @return File
     */
    public function setUserObject(User $value) : File
    {
        return $this->setUserId($value->getId());
    }
}
