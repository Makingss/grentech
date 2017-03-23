<?php

namespace App\Admin\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Spec_value extends Model implements Sortable
{
    use SortableTrait;
    protected $table='spec_values';
    protected $fillable=['spec_id','spec_value','alias','spec_image','p_order'];
    protected $primaryKey='spec_value_id';

    public function specifications(){
        return $this->belongsTo(Specification::class,'spec_id');
    }
}
