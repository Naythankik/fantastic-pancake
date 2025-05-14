<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\BookService;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function __construct(private BookService $bookService)
    {
    }

    public function create(CreateBookRequest $request): JsonResponse
    {
        return $this->bookService->create($request->validated());
    }

    public function update(UpdateBookRequest $request, $id): JsonResponse
    {
        return $this->bookService->update($request->validated(), $id);
    }

    public function delete($id): JsonResponse
    {
        return $this->bookService->delete($id);
    }

    public function readAllBooks()
    {
        return $this->bookService->read();
    }

    public function readABook($id): JsonResponse
    {
        return $this->bookService->readABook($id);
    }
}
