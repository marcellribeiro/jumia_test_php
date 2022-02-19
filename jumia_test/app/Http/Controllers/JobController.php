<?php 

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\QueueController;
use Illuminate\Http\Request;

use App\User;
use App\Job;

class JobController extends Controller
{
    public function list()
    {
        //list
        $jobs_list = Job::get()
        ->sortBy('created_at');

        return response()->json($jobs_list, 201);
    }

    public function create(Request $request)
    {
        if (request()->wantsJson()) {
            foreach ($request->json()->all() as $parameter => $value) {
                $request->$parameter = $value;
            }
        }
        $queue_controller = new QueueController;

        //db
        $title = $request->title; 
        $description = $request->description; 
        $job = new Job;
        $job->title = $title;
        $job->description = $description;
        $job->save();        

        //notify
        $queue_controller->send("A new job was created! Title: ".$title);

        return response()->json(['message' => "the new job [$title] was successfully created"], 200);
    }
}
