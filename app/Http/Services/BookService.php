<?php

namespace App\Http\Services;


use App\Http\Resources\BookResource;
use App\Models\Book;
use Error;
use Illuminate\Http\JsonResponse;
use Mockery\Exception;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class BookService
{
    /**
     * Add a new book to the library
     *
     * @param $data
     * @return JsonResponse
     */
   public function create($data): JsonResponse
   {
       $book = Book::create($data);

       return response()->json([
           'data' => new BookResource($book),
           'message' => 'Book has been added to the library successfully'
       ]);
   }

    /**
     * Update a Book
     *
     * @param $data
     * @param int $id
     * @return JsonResponse
     */
    public function update($data, int $id): JsonResponse
    {
        $book = Book::where('id', $id)->update($data);

        return response()->json([
            'data' => new BookResource($book),
            'message' => 'Book has been updated successfully'
        ]);
    }

    /**
     * Delete a book
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        try{
            Book::where('id', $id)->delete();
        }catch (Exception $e){
            throw new Error($e->getMessage());
        }
        return response()->json([
            'message' => 'Book has been deleted successfully'
        ]);
    }

    /**
     * @return JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function read(): JsonResponse
    {
        $perPage = request()->get('perPage', 10);
        $filter = request()->get('filter', 'id');
        $direction = request()->get('direction', 'asc');

        try{

            $allowedColumns = ['id', 'title', 'author', 'availability', 'created_at'];
            $filter = in_array($filter, $allowedColumns) ? $filter : 'id';

            $direction = in_array(strtolower($direction), ['asc', 'desc']) ? $direction : 'asc';

            $books = Book::orderBy($filter, $direction)
                ->simplePaginate($perPage);
        }catch (Error $e){
            throw new Exception($e->getMessage());
        }

        return response()->json([
            'data' => BookResource::collection($books),
        ]);
    }
    /**
     * Get a book by ID
     *
     * @param $id
     * @return JsonResponse
     */
    public function readABook($id): JsonResponse
    {
        try{
            $book = Book::where('id', $id)->firstOrFail();
        }catch (\Exception $e){
            throw new Error($e->getMessage());
        }

        return response()->json([
            'data' => new BookResource($book)
        ]);
    }


}