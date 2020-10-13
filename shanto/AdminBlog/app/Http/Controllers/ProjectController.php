<?php

namespace App\Http\Controllers;

use App\projectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    function showProjectPage()
    {
        return view('content/Projects');
    }

    function getProjectsList()
    {
        return projectModel::orderBy('id', 'desc')->get();
    }

    function populateProjectData(Request $request)
    {
        return projectModel::where('id', '=', $request->id)->first();
    }

    function updateProjectData(Request $request)
    {
        $id = $request->input('id');
        $projectnameId = $request->input('projectnameId');
        $projectdesId = $request->input('projectdesId');
        $projectLinkId = $request->input('projectLinkId');


        if ($request->hasFile('Updatefiles')) {
            $array = array();
            foreach ($request->file('Updatefiles') as $file) {
                $allFiles = $file->store('public');
                $fileName = (explode('/', $allFiles))[1];
                $host = $_SERVER['HTTP_HOST'];
                $filesLink = 'http://' . $host . '/storage/' . $fileName;
                array_push($array, $filesLink);
            }

            return DB::table('projects')->where('id', '=', $id)->update([
                'project_name' => $projectnameId,
                'project_des' => $projectdesId,
                'project_link' => $projectLinkId,
                'project_image' => $array[0],
                'project_image1' => $array[1],
                'project_image2' => $array[2],
                'project_image3' => $array[3],
                'project_image4' => $array[4],
                'project_image5' => $array[5],
                'project_image6' => $array[6],
                'project_image7' => $array[7],
                'project_image8' => $array[8],
                'project_image9' => $array[9],
                'project_image10' => $array[10]

            ]);
        }
    }


    function deleteService(Request $request)
    {
        return projectModel::where('id', '=', $request->id)->delete();
    }

    function addProject(Request $request)
    {
        $addProjectName = $request->input('addProjectName');
        $addProjectDes = $request->input('addProjectDes');
        $addProjectLink = $request->input('addProjectLink');


        if ($request->hasFile('files')) {
            $array = array();
            foreach ($request->file('files') as $file) {
                $files = $file->store('public');
                $fileName = (explode('/', $files))[1];
                $host = $_SERVER['HTTP_HOST'];
                $projectImage = 'http://' . $host . '/storage/' . $fileName;
                array_push($array, $projectImage);
            }

            return DB::table('projects')->insert([
                'project_name' => $addProjectName,
                'project_des' => $addProjectDes,
                'project_link' => $addProjectLink,
                'project_image' => $array[0],
                'project_image1' => $array[1],
                'project_image2' => $array[2],
                'project_image3' => $array[3],
                'project_image4' => $array[4],
                'project_image5' => $array[5],
                'project_image6' => $array[6],
                'project_image7' => $array[7],
                'project_image8' => $array[8],
                'project_image9' => $array[9],
                'project_image10' => $array[10]
            ]);
        }
    }
}





