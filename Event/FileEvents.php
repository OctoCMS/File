<?php

namespace Octo\File\Event;

use b8\Config;
use Octo\Event\Listener;
use Octo\Event\Manager;

class FileEvents extends Listener
{
    /**
     * @var string
     */
    protected $localPath;

    public function registerListeners(Manager $manager)
    {
        $this->localPath = APP_PATH . '/public/uploads/';

        $manager->registerListener('GetFile', array($this, 'getFile'), true);
        $manager->registerListener('PutFile', array($this, 'putFile'), true);
    }

    public function getFile(array &$file, &$continue)
    {
        $path = $this->localPath . $file['id'] . '.' . $file['extension'];

        if (is_file($path)) {
            $continue = false;
            $file['data'] = file_get_contents($path);
        }

        return true;
    }

    public function putFile(array &$file)
    {
        $path = $this->localPath . $file['id'] . '.' . $file['extension'];

        if (is_dir($this->localPath) && is_writable($this->localPath)) {
            file_put_contents($path, $file['data']);
        }

        return true;
    }
}
