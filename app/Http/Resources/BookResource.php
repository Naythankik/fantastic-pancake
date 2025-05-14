<?php

namespace App\Http\Resources;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'author' => Str::ucfirst($this->author),
            'description' => $this->description,
            'availability' => Book::PROGRESS_STATUSES_READABLE[$this->availability],
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
