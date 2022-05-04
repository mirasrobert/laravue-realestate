<?php

namespace App\Http\Resources;

use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'profession' => $this->profession,
            'company' => $this->company,
            'about_me' => $this->about_me,
            'mobile_number' => $this->mobile_number,
            'language' => $this->language,
            'user' => new UserResource($this->user),
            'image' => new ImageResource($this->image),
        ];
        
    }
}
