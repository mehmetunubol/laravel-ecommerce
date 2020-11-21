<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;

class ProductAttributeController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadAttributes()
    {
        $attributes = Attribute::all();

        return response()->json($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function productAttributes(Request $request)
    {
        $product = Product::findOrFail($request->id);
        foreach($product->attributes as $pa) {
            $attribute = Attribute::findOrFail($pa->attribute_id);
            $pa['attribute'] = $attribute;
        }
        return response()->json($product->attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadValues(Request $request)
    {
        $attribute = Attribute::findOrFail($request->id);

        return response()->json($attribute->values);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::create($request->data);
        if ($productAttribute) {
            return response()->json(['message' => 'Ürün özelliği eklendi.']);
        } else {
            return response()->json(['message' => 'Bir sorun oluştu, Tekrar dener misin ?']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttribute(Request $request)
    {
        $productAttribute = ProductAttribute::findOrFail($request->id);
        $productAttribute->delete();

        return response()->json(['status' => 'success', 'message' => 'Ürün özelliği silindi']);
    }
}