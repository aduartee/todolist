<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function createNewTask(Request $request): JsonResponse
    {   
        error_log($request->get('name'));
        
        return response()->json([
            'message', 'teste',
            'testField' => $request
        ], 200);
    }

    public function fetchAllTasks(): JsonResponse
    {
        $dataFromDatabase = Task::all();
        if($dataFromDatabase->isEmpty()) {
            return response()->json([
                'message' => 'error',
                'data' => []
            ], 404);
        }
        
        return response()->json([
            'message' => 'success',
            'data' => $dataFromDatabase, 
        ], 200);
    }
}
