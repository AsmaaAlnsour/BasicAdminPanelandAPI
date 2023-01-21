<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CustomerRequest;
 use App\DataTables\CustomerDataTable;
use App\Models\Order;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\GeneralController;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class CustomerController extends Controller
{
    protected $viewPath = 'Dashboard.Customer';
    protected $model = 'Customer';
    protected $path = 'customer';
    private $route = 'customers';




    public function index(CustomerDataTable $dataTable)
    {

        return $dataTable->render('Dashboard.Customer.index');
    }

    public function orders($id,OrderDataTable $dataTable)
    {

        return $dataTable->with('id',$id)->render('Dashboard.Customer.orders');
    }
    public function order($id)
    {

        $order=Order::with('products')->first();
        return view('Dashboard.Customer.order',compact('order'));
    }
    public function create()
    {
        return view('Dashboard.Customer.create');
    }

    public function store(CustomerRequest $request)
    {
        try {
            DB::beginTransaction();

            Customer::create($request->validated());

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
        $data = Customer::findOrFail($id);
        return view('Dashboard.Customer.edit', compact('data'));
    }

    public function update(CustomerRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = Customer::findOrFail($id);
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
            $data = Customer::findOrFail($id);
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
