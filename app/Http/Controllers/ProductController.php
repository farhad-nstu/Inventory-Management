<?php

namespace App\Http\Controllers;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    //Add Product
    public function AddProduct()
    {
    	return view('add_product');
    }
    public function InsertProduct(Request $request)
    {
    	$validatedData = $request->validate([
	        'product_name' => 'required|max:255',
	        'product_code' => 'required|unique:products|max:255',
	        'product_image' => 'required',
    	  ]);
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_code'] = $request->product_code;
    	$data['category_id'] = $request->category_id;
    	$data['supplier_id'] = $request->supplier_id;
    	$data['product_garage'] = $request->product_garage;
    	$data['product_route'] = $request->product_route;
    	$data['buying_date'] = $request->buying_date;
    	$data['expire_date'] = $request->expire_date;
    	$data['buying_price'] = $request->buying_price;
    	$data['selling_price'] = $request->selling_price;
    	$image=$request->file('product_image');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                $product=DB::table('products')
                         ->insert($data);
              if ($product) {
                 $notification=array(
                 'messege'=>'Successfully product Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.product')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }
    public function AllProduct()
    {
    	$allProduct = DB::table('products')->get();
    	return view('all_product',compact('allProduct'));
    }


    public function DeleteProduct($id)
    {
        //$single = Product::findorfail($id);
        $delete = DB::table('products')
                ->where('id',$id)
                ->first();
        $photo = $delete->product_image;
        unlink($photo);
        $dltproduct = DB::table('products')
                ->where('id',$id)
                ->delete();
        if ($dltproduct) {
             $notification=array(
             'messege'=>'Successfully Product Deleted ',
             'alert-type'=>'success'
              );
            return Redirect()->route('all.product')->with($notification);                      
         }else{
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
         }      
    }
    public function ViewProduct($id)
    {
    	$viewProduct = DB::table('products')
			    	   ->join('suppliers','products.supplier_id','suppliers.id')
			    	   ->join('categories','products.category_id','categories.id')
			    	   ->select('products.*','categories.cat_name','suppliers.name')
			    	   ->where('products.id',$id)
			    	   ->first();
		return view('view_product')->with('viewProduct',$viewProduct);
    }
    public function EditProduct($id)
    {
    	$editProduct = DB::table('products')
    				   ->where('id',$id)
    				   ->first();
    	return view('edit_product')->with('editProduct',$editProduct);
    }
    public function UpdateProduct(Request $request,$id)
    {
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_code'] = $request->product_code;
    	$data['category_id'] = $request->category_id;
    	$data['supplier_id'] = $request->supplier_id;
    	$data['product_garage'] = $request->product_garage;
    	$data['product_route'] = $request->product_route;
    	$data['buying_date'] = $request->buying_date;
    	$data['expire_date'] = $request->expire_date;
    	$data['buying_price'] = $request->buying_price;
    	$data['selling_price'] = $request->selling_price;
    	$image=$request->file('product_image');
    	if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                $delete = DB::table('products')
                          ->where('id',$id)
                          ->first();
                $photo = $delete->product_image;
                unlink($photo);
                $product=DB::table('products')
                        ->where('id',$id)
                         ->update($data);
              if ($product) {
                 $notification=array(
                 'messege'=>'Successfully Product Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.product')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
              
            }
        }else{
            $old_photo=$request->old_product_image;
            if ($old_photo) {
                $data['product_image']=$old_photo;
                $product=DB::table('products')
                        ->where('id',$id)
                        ->update($data);
              if ($product) {
                 $notification=array(
                 'messege'=>'Successfully Product Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.product')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }
        }
    }
     //PRODUCT IMPORT AND EXPORT
     public function ImportProduct()
     {
         return view('import_product');
     }
     public function export() 
     {
         return Excel::download(new ProductsExport, 'products.xlsx');
     }
     public function import(Request $request)
     {
         $import = Excel::import(new ProductsImport, $request->file('import_file'));
         if ($import) {
                  $notification=array(
                  'messege'=>'Successfully Product Imported ',
                  'alert-type'=>'success'
                   );
                 return Redirect()->route('all.product')->with($notification);                      
              }else{
               $notification=array(
                  'messege'=>'error ',
                  'alert-type'=>'success'
                   );
                  return Redirect()->back()->with($notification);
              }    
     }

    
}



    

