<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NilaiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'page' => $this->currentPage(),
                'pages'=> $this->lastPage(),
                'perpage' => $this->perPage(),
                'sort' => 'asc',
                'field' => 'id',
            ],
        ];
    }
}
