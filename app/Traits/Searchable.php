<?php

namespace App\Traits;

trait Searchable
{
    public function scopeSingleSearch($query, $searchInputName = 'search')
    {
        if (request()->has($searchInputName)) {
            $searchQuery = request()->get($searchInputName);

            foreach($this->searchableColumns as $index=>$name)
            {
                if ($index === 0) {
                    $query->where($name, 'LIKE', '%' . $searchQuery . '%');
                    continue;
                }
            }
                    $query->orWhere($name, 'LIKE', '%' . $searchQuery . '%');               
        }
        
            return $query;
    }
}