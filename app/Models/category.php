<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [ "id"];
    public $timestamps = false;
    protected $table = "categories";
    const urlImageEmpty = 'path/to/empty/image.jpg';
    public function getRouteKeyName(): string
{
    return 'slug';
}

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function imageUrl(){
        return $this->image_url;
    }

    public function getImageUrlAttribute(){
        if($this->image)
            return $this->image->url;
        return self::urlImageEmpty;
    }

    public static function selectHtmlTreeMode($obj = null){
        $cats = Category::leftJoin('categories as c',  'c.parent_id', '=', 'categories.id')->select('categories.id', 'categories.name', 'categories.parent_id')
        ->distinct('id')->get();
        $cats = Self::orderCategories($cats);
        return self::htmlTreeMode($cats, $obj);
    }

    public static function htmlTreeMode($cats, $obj = null){
        if($obj)
            $obj = $obj->category_id.($obj->sub_category_id?'-'.$obj->sub_category_id:'');

        $html =' <select id="category_id" name="category_id" class="form-control select2-tree" required="" aria-required="true">
        <option value="">' .__('main.Select'). '</option>';
        foreach($cats as $key => $row){
            $id = $row->id;
            if($row->parent_id)
                $id .= '-'.$row->parent_id;
            $html .= '<option '. ($obj == $id?'selected="selected" ':' ') . ($row->parent_id?'class="sub"':"" ) .' value="' .$id. '">' .$row->name. '</option>';
        }
        $html .= '</select>';
        return $html;
    }


    public static function orderCategories($categories) {
        $parents = new Collection();
        $sons = $categories->filter(function($el){
            return $el->parent_id != null;
        });

        $categories->map(function($cat) use ($sons, $parents){
            if($cat->parent_id== null)
            {
                $parents->push($cat);
                $sons->map(function ($elemento, $index) use ($cat, $parents, $sons) {
                    if($elemento->parent_id == $cat->id){
                        $parents->push($elemento);
                        $sons->forget($index);
                    }

                 });
            }
       });
       return $parents;
    }

}
