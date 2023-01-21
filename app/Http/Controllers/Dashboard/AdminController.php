<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    protected $viewPath = 'Dashboard.admin.';
    protected $path = 'admins';
    private $route = 'admins';
    private $model = 'Admin';

    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('Dashboard.admin.index');
    }

    public function create()
    {

        return view( $this->viewPath . 'create');
    }

    public function store(AdminRequest $request)
    {
        $inputs = $request->validated();
        $admin = Admin::create($inputs);
        Alert::success('', 'تم الاضافه بنجاح');
        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $data = Admin::findorfail($id);
        return view( $this->viewPath . 'edit' , compact('data'));
    }

    public function update(AdminRequest $request, $id)
    {
        $data = Admin::findOrfail($id);
        $inputs = $request->validated();
        $data->update($inputs);
        Alert::success('', 'تم التعديل بنجاح');
        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        $data = Admin::findOrfail($id);
        if ($data->id == 1) {
            Alert::warning('', 'لا يمكن حذف مدير الموقع');
            return redirect()->route($this->route);
        }
        $data->delete();
        Alert::success('', 'تم الحذف بنجاح');
        return redirect()->route($this->route);
    }
}
