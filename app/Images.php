<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Images extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function validateLogoData()
    {
        return request()->validate([
            'path' => 'file|required',
            'product_id'=>'required|numeric'
        ]);
    }

    public function hasLogo($value)
    {
        if ($value == null) {
            return null;
        } else {
            return $value;
        }
    }

    public function getLogoPath($value)
    {
        if ($value == null) {
            return null;
        } else {
            $path = Storage::putFile('images/', $value);
            return $value->storeAs("public", $path);
        }
    }

    public function LogoData()
    {

        $data = $this->validateLogoData();
        if (\request()->path == null) {
            return $data + ['product_id' => $data['product_id']];
        } else {
            $result = $this->hasLogo($data['path']);
            $value = $this->getLogoPath($result);
            return   array('path' => $value, 'product_id' =>$data['product_id']);
        }


    }

    public function updatelogo($id, $path)
    {
        Images::whereId($id)->update(['path' => $path]);
    }

}
