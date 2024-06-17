<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
    'title',
    'body',
];


/* @param int $limitPerPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginateByLimit($limitPerPage = 10)
    {
        return $this->orderBy('created_at', 'desc')->paginate($limitPerPage);
    }
}
