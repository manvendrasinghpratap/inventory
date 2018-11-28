<?php
namespace App\Http\Controllers;

use App\Product;
use App\Categories;
use App\BankDetails;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $breadcrumb = array('/products'=>'Products','/addProduct'=>'Add New Product');
    protected $listing = array('/addProduct'=>'Add New Product');
    protected $page_title = 'Product';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::select('*')->orderBy('id', 'desc')
                        ->paginate($this->rowPerPage);
        //$this->p($products); //die();
                return view('admin.product.index')
                        ->with('page_title',$this->page_title)
                        ->with('products',$products)
                        ->with('listing',$this->listing)
                        ->with('breadcrumb',$this->breadcrumb);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create')
                ->with('page_title',$this->page_title)
                ->with('listing',$this->listing)
                ->with('breadcrumb',$this->breadcrumb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $sizeArray = array();
        $data = $request->all();
        $products = new Product;
        $products->name         =   $request->name;
        $products->gst          =   $request->gst;
        $products->hsn          =   $request->hsn;
        $products->status       =   '1';
        $products->save();
        $lastProductId          =   $products->id;
        /* Inserting data in to another table  start*/
        
        $sizes = $request->get('size');
        $prices = $request->get('price');
        $i=0;
        foreach($sizes as $size){
            $subCategory   =   new Categories;
            $subCategory->name = $size;
            $subCategory->product_id = $lastProductId;
            $subCategory->rate = $prices[$i];
            $subCategory->save();
            $i++;
        }
        /* Inserting data in to another table  End */
        
        $request->session()->flash('alert-success', trans('message.productaddsuccess'));
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!empty($id)) {
            $id = \App\Helpers\Common::decodeParam($id);
            $productdetails = Product::select('*')->where('id', $id)->first();
            $categorydetails = Categories::select('*')->where('product_id', $id)->get();
            //$this->p($categorydetails); die();
            return view('admin.product.view')
                ->with('page_title',$this->page_title)
                ->with('breadcrumb',$this->breadcrumb)
                ->with('listing',$this->listing)
                ->with('productdetails',$productdetails)
                ->with('categorydetails',$categorydetails);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!empty($id)) {
            $id = \App\Helpers\Common::decodeParam($id);
            $productdetails = Product::select('*')->where('id', $id)->first();
            $categorydetails = Categories::select('*')->where('product_id', $id)->get();
            //$this->p($categorydetails); die();
            return view('admin.product.edit')
                ->with('page_title',$this->page_title)
                ->with('breadcrumb',$this->breadcrumb)
                ->with('listing',$this->listing)
                ->with('productdetails',$productdetails)
                ->with('categorydetails',$categorydetails);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request)
    {
        $id = $request->id;
        if(!empty($id)) {
            $products = Product::find($id);
            Categories::where('product_id', '=', $id)->delete();
            $products->name         =   $request->name;
            $products->hsn          =   $request->hsn;
            $products->gst          =   $request->gst;
            $products->save();
            
            $sizes = array_filter($request->get('size'));
            $prices = array_filter($request->get('price'));
            $this->p($sizes);
            $this->p($prices);
            $i=0;
            foreach($sizes as $size){
                $subCategory   =   new Categories;
                $subCategory->name = $size;
                $subCategory->product_id = $id;
                $subCategory->rate = $prices[$i];
                $subCategory->save();
                $i++;
            }           
            
            $request->session()->flash('alert-success', trans('message.productupdatedsuccess'));
            return redirect('products');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
