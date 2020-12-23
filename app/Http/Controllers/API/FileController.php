<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class FileController extends Controller
{
    public function store(FileRequest $request)
    {
        $project = Project::findOrFail($request->project_id);
        $this->authorize('upload',$project);
        $image = $request->file('image');
        $file_name = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('/public/projects', $file_name);
        $project->image = $file_name;
        $project->save();
        return new ProjectResource($project);
    }
}
