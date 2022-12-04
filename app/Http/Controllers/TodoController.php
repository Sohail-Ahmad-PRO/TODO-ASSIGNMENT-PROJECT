<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\TodoAuthorizeUserRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class TodoController
 */
class TodoController extends BaseController
{
    /**
     * @var TodoService
     */
    protected TodoService $service;

    /**
     * @param TodoService $service
     */
    public function __construct(TodoService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->jsonResponse($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateTodoRequest $request
     * @return JsonResponse
     */
    public function store(CreateTodoRequest $request): JsonResponse
    {
        return $this->jsonResponse($this->service->create($request->validated()));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateTodoRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateTodoRequest $request, int $id): JsonResponse
    {
        $request = $request->merge(['id' => $id]);
        app(UpdateTodoRequest::class);

        return $this->jsonResponse($this->service->update($request->validated(), $id));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        request()->merge(['id' => $id]);
        app(TodoAuthorizeUserRequest::class);

        return $this->jsonResponse($this->service->delete($id) ? 'Todo task is deleted successfully.' : 'Something went wrong.');
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        request()->merge(['id' => $id]);
        app(TodoAuthorizeUserRequest::class);

        return $this->jsonResponse($this->service->show($id));
    }
}
