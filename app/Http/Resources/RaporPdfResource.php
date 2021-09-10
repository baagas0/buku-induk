<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RaporPdfResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
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
                'sort' => 'asc',
                'field' => 'id',
            ],
        ];
    }
}
