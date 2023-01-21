<?php

namespace App\DataTables\Dashboard;


use App\Models\Order;
use App\Models\RevenueWithdrawal;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($query) {
                return $query->created_at->diffForHumans();
            })
            ->addColumn('action', 'Dashboard.Customer.parts.actionOrder')
            ->rawColumns(['action']);
    }

    public function query(Order $model)
    {
        return $model->newQuery()->where('customer_id',$this->id)->orderBy('created_at','desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('Order-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->lengthMenu(
                [
                    [10, 25, 50, -1],
                    [trans('lang.10row'), trans('lang.25row'),trans('lang.50row'), trans('lang.allRows')]                ])
            ->parameters([
                'language' => [ app()->getLocale()=='en' ?'' : 'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json']

            ]);
    }

    protected function getColumns()
    {
        return [

            Column::make('created_at')->title(trans('lang.created_at')),
            Column::make('action')->title(trans('lang.action')),
        ];
    }

    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
