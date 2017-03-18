<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'image_id';
    public $incrementing = false;
    protected $hidden=['storage'];
    protected $fillable = ['image_id', 'storage', 'image_name', 'ident', 'url', 'l_ident', 'l_url', 'm_ident', 'm_url',
        's_ident', 's_url', 'width', 'height', 'watermark', 'build_size', 'last_modified'];

    public function goods()
    {
        return $this->belongsTo(Good::class, 'image_default_id','image_id');
    }

    public function image_attachs()
    {
        return $this->belongsTo(Image_attach::class, 'image_id','image_id');
    }
}
