<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Dotenv\Exception\ValidationException;

class TaskController extends Controller
{
    protected const email = 'arthurduartealves99@gmail.com';

    /**
     * Mount the correct data to send inside of a response
     * @param <int, Task> $taskFromModel
     * 
     * @return array|mixed
     */
    private function mounTaskData($taskFromModel) {
        return $taskFromModel->map(function ($task) {
            return [
                'id' => $task->id,
                'name' => $task->name,
                'description' => $task->description,
                'completed' => $task->completed
            ];
        });
    }

    public function createNewTask(TaskRequest $request): JsonResponse
    {
        try {
            $dataValidate = $request->validated();

            // error_log(print_r($dataValidate, true));
            $taskInstance = Task::create($dataValidate);
            EmailJob::dispatch(TaskController::email, $taskInstance)->onQueue('email');

            return response()->json([
                'message' => 'success',
                'requestData' => $taskInstance
            ], 200);

        } catch (ValidationException $validationException) {
            return response()->json([
                'title' => 'error',
                'message' => 'Error to register a new task. Review the fields and try again.'
            ], 422);
        }
    }

    /**
     * fetch All tasks from database, without any filter or condicion.
     * @return JsonResponse|mixed
     */
    public function fetchAllTasks(): JsonResponse
    {
        $dataFromDatabase = Task::orderBy('created_at', 'desc')->get();
        if ($dataFromDatabase->isEmpty()) {
            return response()->json([
                'message' => 'error',
                'tasks' => []
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'tasks' => $this->mounTaskData($dataFromDatabase),
        ], 200);
    }
}
