<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\GeneralController;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    protected $viewPath = 'Dashboard.Product';
    protected $model = 'Product';
    protected $path = 'product';
    private $route = 'products';




    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.Product.index');
    }

    public function create()
    {
        return view('Dashboard.Product.create');
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();

            Product::create($request->validated());

            DB::commit();
            Alert::success('',  trans('lang.created'));
            return redirect()->route($this->route);

        } catch (\Exception $e) {
            DB::rollback();
            Alert::warning('',trans('lang.wrong'));
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('Dashboard.Product.edit', compact('data'));
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = Product::findOrFail($id);
            $data->update($request->validated());
            DB::commit();
            Alert::success('',  trans('lang.updated'));
            return redirect()->route($this->route);
        } catch (\Exception $e) {
            DB::rollback();
            Alert::warning('',trans('lang.wrong'));
            return redirect()->back();
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = Product::findOrFail($id);
            $data->delete();
            DB::commit();
            Alert::success('', trans('lang.deleted'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::warning('',trans('lang.wrong'));
            return redirect()->back();
        }
    }
}
