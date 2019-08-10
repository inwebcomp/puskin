<?php

namespace Admin\ResourceTools\Comments;

use App\Models\ClassModel;
use App\Models\Teacher;
use App\Models\Comments;
use InWeb\Admin\App\Http\Controllers\Controller;
use InWeb\Admin\App\Http\Requests\AdminRequest;
use InWeb\Admin\App\Http\Requests\ResourceDetailRequest;

class CommentsController extends Controller
{
    /**
     * @param ResourceDetailRequest $request
     * @return array
     */
    public function index(ResourceDetailRequest $request)
    {
        /** @var ClassModel $model */
        $model = $request->findModelOrFail();

        return $model->comments()->latest()->get();
    }
}
