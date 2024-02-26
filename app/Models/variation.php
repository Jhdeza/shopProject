<?php



namespace App\Models;

use App\Enums\ProductTypeEnum;
use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Variation extends Model
{
        use HasFactory;

    // use Scopes;
    protected $guarded = ['_token'];

    // protected $casts = [
    //     'active' => 'boolean',
    //     'type' => ProductTypeEnum::class,
    // ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function definitions()
    {
        return $this->hasMany(CharacteristicVariation::class);
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class)->withPivot('value_id');
    }
    public function values()
    {
        return $this->belongsToMany(Value::class)->withPivot('characteristics_id');
    }

    public function getvnameAttribute()
    {
        $parts =  explode('', $this->name);
        if (count($parts) > 1)
            return $parts[1];
        return $this->name;
    }

    public function getHumanNameAttribute()
    {
        return str_replace('', " ", $this->name);
    }

    public function siblings()
    {
        return $this->product->variations();
    }

    public function scopeFilter(Builder $query, $term): void
    {
        $query
            ->where('products.name', 'LIKE', '%' . $term . '%')
            ->orWhere('sku', 'LIKE', '%' . $term . '%')
            //->orWhere('sub_sku', 'LIKE', '%' . $term . '%')
            ->select([
                //DB::raw("products.name value"),
                DB::raw("(CASE WHEN products.type = SIMPLE THEN products.name ELSE  v.name END) as value"),
                DB::raw("v.id as id")
            ]);
    }
}
