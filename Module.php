<?php

namespace Octo\File;

use Octo;

class Module extends Octo\Module
{
    protected function getName()
    {
        return 'File';
    }

    protected function getPath()
    {
        return dirname(__FILE__) . '/';
    }
}
