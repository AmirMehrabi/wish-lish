<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['ReadablePrice', 'IsReservedByCurrentUser', 'classes', 'status'];

    public function getReadablePriceAttribute()
    {
        return number_format((integer)$this->convert($this->price),0,',',',');
    }

    function convert($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
    
        return $englishNumbersOnly;
    }
    public function reserve(){
        $attributed = ['user_id' => auth()->user()->id];

        if(!$this->is_reserved) {
            $this->is_reserved = true;
            $this->reserved_by = auth()->user()->id;
            $this->save();
        } else {
            $this->is_reserved = 0;
            $this->reserved_by = 0;
            $this->save();
        }
    }

    public function getStatusAttribute()
    {
        if($this->is_reserved == 1 && $this->isReservedByCurrentUser) {
            return 'رزرو توسط شما';
        } elseif($this->is_reserved == 1) {
            return 'رزرو شده';
        } else {
            return 'رزرو نشده';
        }
    }

    public function getClassesAttribute()
    {
        if($this->is_reserved == 1 && $this->isReservedByCurrentUser) {
            return 'text-green-700 bg-green-100';
        } elseif($this->is_reserved == 1) {
            return 'text-blue-700 bg-blue-100';
        } else {
            return 'text-red-700 bg-red-100';
        }
    }

    public function getIsReservedByCurrentUserAttribute(){
        if(auth()->user()) {
            return $this->reserved_by == auth()->user()->id ? true : false;
        } else {
            return false;
        }
        
    }
}
