<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private static $cloudinary_link = 'https://res.cloudinary.com/hoadaica/image/upload/';

    //start hiện 1 ảnh
    public function getSmallPhotoAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return 'https://thanhtra.com.vn/image/images/noimages.png';
        }
        $photos = explode(',', $this->thumbnail);
        return self::$cloudinary_link . 'w_100,c_scale/' . $photos[0] . '.jpg';
    }

    public function getLargePhotoAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return 'https://thanhtra.com.vn/image/images/noimages.png';
        }
        $photos = explode(',', $this->thumbnail);
        return self::$cloudinary_link . $photos[0] . '.jpg';
    }
    //end

    //start hiện nhiều ảnh
    public function getSmallPhotosAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return array('https://thanhtra.com.vn/image/images/noimages.png');
        }
        $list_photos = array();
        $photos = explode(',', $this->thumbnail);
        foreach ($photos as $p) {
            if (strlen($p) > 0 && sizeof($list_photos) <2) {
                array_push($list_photos, self::$cloudinary_link . 'w_100,c_scale/' . $p . '.jpg');
            }
        }
        return $list_photos;
    }
    public function getSmallsPhotosAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return array('https://thanhtra.com.vn/image/images/noimages.png');
        }
        $list_photos = array();
        $photos = explode(',', $this->thumbnail);
        foreach ($photos as $p) {
            if (strlen($p) > 0 && $p != $photos[0]) {
                array_push($list_photos, self::$cloudinary_link . 'w_100,c_scale/' . $p . '.jpg');
            }
        }
        return $list_photos;
    }
    public function getLargesPhotosAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return array('https://thanhtra.com.vn/image/images/noimages.png');
        }
        $list_photos = array();
        $photos = explode(',', $this->thumbnail);
        foreach ($photos as $p) {
            if (strlen($p) > 0 && $p != $photos[0]) {
                array_push($list_photos, self::$cloudinary_link . $p . '.jpg');
            }
        }
        return $list_photos;
    }

    public function getLargePhotosAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return array('https://thanhtra.com.vn/image/images/noimages.png');
        }
        $list_photos = array();
        $photos = explode(',', $this->thumbnail);
        foreach ($photos as $p) {
            if (strlen($p) > 0) {
                array_push($list_photos, self::$cloudinary_link . $p . '.jpg');
            }
        }
        return $list_photos;
    }
    //end

    public function getPreviewPhotosAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return array('https://thanhtra.com.vn/image/images/noimages.png');
        }
        $list_photos = array();
        $photos = explode(',', $this->thumbnail);
        foreach ($photos as $p) {
            if (strlen($p) > 0) {
                array_push($list_photos, self::$cloudinary_link . 'c_limit,h_60,w_90/' . $p . '.jpg');
            }
        }
        return $list_photos;
    }

    public function getPhotoIdsAttribute()
    {
        if ($this->thumbnail == null || strlen($this->thumbnail) == 0) {
            return array();
        }
        $list_ids = array();
        $photos = explode(',', $this->thumbnail);
        foreach ($photos as $p) {
            if (strlen($p) > 0) {
                array_push($list_ids, $p);
            }
        }
        return $list_ids;
    }
// xem lại size giầy
    public function getPreviewSizesAttribute()
    {
        if ($this->size == null || strlen($this->size) == 0) {
            return array('');
        }
        $list_sizes = array();
        $sizes = explode(',', $this->size);
        foreach ($sizes as $p) {
            if (strlen($p) > 0) {
                array_push($list_sizes,$p);
            }
        }
        return $list_sizes;
    }




    public function category(){
        return $this->belongsTo('App\Category', 'category_id','id');
    }
    public function brand(){
        return $this->belongsTo('App\Brand', 'brand_id','id');
    }
    public function review(){
        return $this->hasMany('App\Review', 'product_id','id');
    }
}
