<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    public function getContent(){
        return optional($this->category)->content;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function scopeKeywordSearch($query, array $filters)
    {
        return $query
            ->when(!empty($filters['name_email']), function ($q) use ($filters) {
                $q->where(function ($sub) use ($filters) {
                    $sub->where('first_name', 'like', "%{$filters['name_email']}%")
                        ->orWhere('email', 'like', "%{$filters['name_email']}%");
                });
            })
            ->when(!empty($filters['gender']), fn($q) => $q->where('gender', $filters['gender']))
            ->when(!empty($filters['category_id']), fn($q) => $q->where('category_id', $filters['category_id']))
            ->when(!empty($filters['date']), fn($q) => $q->whereDate('created_at', $filters['date']));
    }
}
