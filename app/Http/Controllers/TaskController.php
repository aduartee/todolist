<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createNewTask(Request $request): JsonResponse
    {
        $data = $request->all();
        return response()->json([
            'message:' => 'Success',
            'data' => $data, 
        ], 200);    
    }

    public function fetchAllTasks(): array
    {
        
        return [];
    }
}
