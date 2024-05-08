<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_detail extends Model
{
    protected $table = 'sale_details';
    protected $primaryKey = 'sdt_id';
    protected $fillable = ['sdt_quantity', 'sdt_saleprice', 'sdt_totalprice', 'sl_id', 'iv_id'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function input_details()
    {
        return $this->belongsTo(Input_detail::class);
    }
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
    use HasFactory;
}
