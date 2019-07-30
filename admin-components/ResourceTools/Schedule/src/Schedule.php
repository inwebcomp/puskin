<?php

namespace Admin\ResourceTools\Schedule;

use InWeb\Admin\App\ResourceTool;

class Schedule extends ResourceTool
{
    public $component = 'schedule-tool';

    public function name()
    {
        return __('Расписание');
    }
}
