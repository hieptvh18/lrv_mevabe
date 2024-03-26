<?php
use App\Models\Category;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Cart;

// func lay thuoc tinh san pham tu danh muc
if (!function_exists('getAttrByCate')) {
    function getAttrByCate($cateId){
        $result = Category::select('attributes.name')
        ->join('cate_attributes','cate_attributes.cate_id','categories.id')
        ->join('attributes','attributes.id','cate_attributes.attr_id')
        ->where('categories.id',$cateId)->get();
        return $result;
    }
}


// get child cate
if(!function_exists('getChildCategories')){
    function getChildCategories(&$listData,$parentId=0,$level=0){
        // default truyen $parentId = null vi no la cap 0;
        // note $parentID = sub_categories_id
        $arr = array();
        foreach($listData as $key=>$val){

            // logic: find all parent -> find child of child ==> continue
            // level se la so cap bac de co the dung str_repeat lap
            $val['level'] = $level;
            if($val['parent_id'] == $parentId){
                $arr[] = $val;
            
                // callback
                $menuChild = getChildCategories($listData,$val['id'],$level+1);
                $arr = array_merge($arr,$menuChild);
            }
        }
        return $arr;
    }
}


// get info attr_value
if(!function_exists('getAttributeValue')){
    function getAttributeValue($id){
        $result = AttributeValue::where('id',$id)->first();

        return $result;
    }
}

// formated cart Data
if(!function_exists('formatCartData')){
    function formatCartData(){
        
        $carts = session('carts') ?? [];

        if(auth()->check()){
            $carts = Cart::where('user_id',auth()->id())->get()->toArray();
        }

        $resp = [];
        $totalPrice = 0;
        if(!empty($carts)){
            foreach($carts as $key=>$cart){
                $product = Product::find($cart['product_id']);
                $resp[$key]['product_id'] = $cart['product_id'];
                $resp[$key]['product_name'] = $product->name;
                $resp[$key]['product_price'] = $product->price;
                $resp[$key]['product_discount'] = $product->discount;
                $resp[$key]['product_slug'] = $product->slug;
                $resp[$key]['product_avatar'] = asset('uploads').'/'.$product->avatar;
                $resp[$key]['quantity'] = $cart['quantity'];
                $resp[$key]['product_color'] = AttributeValue::find($cart['color_id'])->name;
                $resp[$key]['product_size'] = AttributeValue::find($cart['size_id'])->name;
                $resp[$key]['final_price'] = ($product->price - $product->discount) * (int)$cart['quantity'];
                
                $totalPrice += $resp[$key]['final_price'];
            }
        }   
        
        return [
            'cartData'=>$resp,
            'totalPrice'=>$totalPrice,
            'totalItems'=>count($resp)
        ];
    }
}

