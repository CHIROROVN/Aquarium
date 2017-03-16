<?php namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Models\ProductModel;
use App\Http\Models\CategoryModel;
use Input;
use Session;
use Validator;

class ProductsController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /*
    |-----------------------------------
    | get view products
    |-----------------------------------
    */
    public function index() {
        $clsProductM               = new ProductModel();
        $data['title']             = 'PRODUCTS MANAGEMENT';

        $data['products']          = $clsProductM->getAllProduct();
        return view('backend.products.index',$data);
    }

    /*
    |-----------------------------------
    | get view add products
    |-----------------------------------
    */
    public function add() {
        $data['title']             = 'PRODUCTS MANAGEMENT';
        $clsCat                    = new CategoryModel();
        $data['cats']              = $clsCat->getListCat();
        return view('backend.products.add',$data);
    }

        /*
    |-----------------------------------
    | post view add products
    |-----------------------------------
    */
    public function postAdd() {

    }

        /*
    |-----------------------------------
    | get view edit products
    |-----------------------------------
    */
    public function editProduct() {
        $data['title']             = 'Xanh Tuoi';
        return view('backend.products.index');
    }

        /*
    |-----------------------------------
    | post view edit products
    |-----------------------------------
    */
    public function postEditProduct() {
        
    }


}