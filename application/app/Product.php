<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function imageUrl()
    {
        $url = 'default.png';
        foreach ($this->images as $image){
            $url = $image->ImageUrl;
            break;
        }
        return $url;
    }
    public function category()
    {
        $resultCategory = '';
        foreach ($this->categories as $category){
            $resultCategory = $category->CategoryName.', ';
        }
        return rtrim($resultCategory,', ');
    }

    public function url()
    {
        return url('product/'.$this->ProductSlug.'/'.$this->id);

    }
    public function price()
    {
        if($this->ProductSalePrice > 0){
            return $this->ProductSalePrice;
        }else{
            return $this->ProductRegularPrice;
        }
    }
    public function htmlPrice()
    {
        if($this->ProductSalePrice > 0){
            return ' <div class = "product-price"><span class = "text-accent">৳ '.number_format($this->ProductSalePrice).'</span>
                            <del class = "font-size-sm text-muted">৳ '.number_format($this->ProductRegularPrice).'</del>
                        </div>';
        }else{
            return  '  <div class = "product-price"><span class = "text-accent">৳ '.number_format($this->ProductRegularPrice).'</span></div>';

        }
    }
}
