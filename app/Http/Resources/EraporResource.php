<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EraporResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // public function toArray($request)
    // {
    //     return parent::toArray($request);
    // }
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'page' => $this->currentPage(),
                'pages'=> $this->lastPage(),
                'perpage' => $this->perPage(),
                'sort' => 'desc',
                'field' => 'id',
            ],
        ];
    }
}
