<?php

namespace Admin\ResourceTools\Comments;

use InWeb\Admin\App\ResourceTool;

class Comments extends ResourceTool
{
    public $component = 'comments-tool';

    public function name()
    {
        return __('Комментарии');
    }
}
