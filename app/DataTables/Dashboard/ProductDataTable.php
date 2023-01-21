<?php

namespace App\DataTables\Dashboard;


use App\Models\Product;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)

            ->addColumn('action', 'Dashboard.Product.parts.action')
            ->rawColumns(['action','id']);
    }

    public function query(Product $model)
    {
        return $model->newQuery()->orderBy('created_at','desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('Product-table')
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
            Column::make('name')->title(trans('lang.name')),
            Column::make('quantity')->title(trans('lang.quantity')),
            Column::make('price')->title(trans('lang.price')),
            Column::make('action')->title(trans('lang.action')),
        ];
    }

    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
