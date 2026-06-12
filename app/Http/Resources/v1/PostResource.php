<?php

namespace App\Http\Resources\v1;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->when(Route::currentRouteName() == 'posts.show', $this->content),
            'category_title' => $this->category->title,
            'created' => $this->created_at->toDateTimeString(),
            'updated' => $this->updated_at->toDateTimeString(),
        ];
    }
}
