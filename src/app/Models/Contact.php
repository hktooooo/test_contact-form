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

    public function scopeKeywordSearch($query, $name_email = null, $gender = null, $category_id = null, $date = null)
    {
        if (!empty($name_email)) {
            $query->where(function ($q) use ($name_email) {
                $q->where('first_name', 'like', "%{$name_email}%")
                ->orWhere('last_name', 'like', "%{$name_email}%")
                ->orWhere('email', 'like', "%{$name_email}%");
            });
        }

        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }

        if (!empty($gender)) {
            $query->where('gender', $gender);
        }

        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }
}
