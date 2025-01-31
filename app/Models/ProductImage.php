<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {
  use HasFactory;
  use HasUuids;

  protected $guarded = ['id'];
  protected $with = ['product'];

  public function product() {
    return $this->belongsTo(Product::class);
  }
}
