<?php

namespace App\Traits;

trait Sortable
{
    /**
     * Sort posts
     *
     * @param Illuminate\Database\Query\Builder $builder
     * @return void
     */
    public function scopeSort($builder)
    {
        return $builder->orderBy(request()->get('sort_by') ?? 'id', request()->get('direction') ?? 'desc');
    }
}