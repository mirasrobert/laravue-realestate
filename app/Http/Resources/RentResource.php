<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'features' => $this->features,
            'location' => $this->location,
            'price' => $this->price,
            'discount' => $this->discount,
            'is_sold' => $this->is_sold,
            'created_at' => $this->created_at,
            'reviews_avg_rating' => !$this->reviews_avg_rating ? 0 : floatval($this->reviews_avg_rating),
            'user' => new UserResource($this->user),
            'images' => ImageResource::collection($this->images),
            'reviews' => ReviewResource::collection($this->reviews),
        ];
    }
}
