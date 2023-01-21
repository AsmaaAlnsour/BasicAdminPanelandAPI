<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    const PARENT = 1;
    const CHILD = 2;
    const TYPE = [self::PARENT , self::CHILD];
    protected $appends = ['name','type'];

    public function getNameAttribute()
    {
        return getLang($this, 'name');
    }


    public function getTypeAttribute()
    {
        if (!$this->parent_id)
        {
            return trans('lang.parentCategory') ;
        }else
        {
            return trans('lang.childCategory') ;
        }
    }



    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(self::class ,'parent_id');
    }
}
