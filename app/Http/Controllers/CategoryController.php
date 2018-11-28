<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Product;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $breadcrumb = array('/categories'=>'Categories','/addCategory'=>'Add New Category');
    protected $listing = array('/addCategory'=>'Add New Category');
    protected $page_title = 'Category';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
        {     
            $categories = categories::select('*')->with('productDetails')->orderBy('id', 'desc')
                        ->paginate($this->rowPerPage);
        //$this->p($categories[0]->productDetails);
                return view('admin.category.index')
                        ->with('page_title',$this->page_title)
                        ->with('categories',$categories)
                        ->with('listing',$this->listing)
                        ->with('breadcrumb',$this->breadcrumb);

            //
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productArray = Product::pluck('name','id')->all();
        return view('admin.category.create')
            ->with('page_title',$this->page_title)
            ->with('listing',$this->listing)
            ->with('products',$productArray)
            ->with('breadcrumb',$this->breadcrumb);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $subCategory                =   new Categories;
        $subCategory->name          =   $request->name;
        $subCategory->product_id    =   $request->product_id;
        $subCategory->rate          =   $request->rate;
        $subCategory->save();
        $request->session()->flash('alert-success', trans('message.designationaddsuccess'));
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $categorydetails = Categories::select('*')->where('id', $id)->first();
           $productArray = Product::pluck('name','id')->all();
            return view('admin.category.edit')
                ->with('page_title',$this->page_title)
                ->with('breadcrumb',$this->breadcrumb)
                ->with('listing',$this->listing)
                ->with('products',$productArray)
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
    public function update(CategoryRequest $request)
    { $id = $request->id;
        if(!empty($id)) {
            $category               =   Categories::find($id);
            $category->name         =   $request->name;
            $category->product_id   =   $request->product_id;
            $category->rate         =   $request->rate;
            $category->save();
            $request->session()->flash('alert-success', trans('message.categoriesupdatedsuccess'));
            return redirect('categories');
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
