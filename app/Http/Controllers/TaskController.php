<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use Dotenv\Exception\ValidationException;

class TaskController extends Controller
{
    const email = 'arthurduartealves99@gmail.com';
    public function createNewTask(Request $request): JsonResponse
    {
        error_log($request);

        try {
            $dataValidate = $request->validate(
                [
                    'name' => 'required|string|max:255'
                ]
            );

            Task::create($dataValidate);

            return response()->json([
                'message' => 'success',
                'requestData' => $dataValidate
            ], 200);

        } catch (ValidationException $validationException) {
            return response()->json([
                'title' => 'error',
                'message' => 'Error to register a new task. Review the fields and try again.'
            ], 422);
        }
    }

    public function fetchAllTasks(): JsonResponse
    {
        $dataFromDatabase = Task::all();
        if ($dataFromDatabase->isEmpty()) {
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
