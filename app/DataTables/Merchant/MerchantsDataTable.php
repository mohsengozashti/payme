<?php

namespace App\DataTables\Merchant;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MerchantsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->collection($query)
            ->rawColumns(['action','status'])
            ->editColumn('status',function (User $user){
                return '<span class="badge badge-'.($user->status ? 'success' : 'danger').'">' . __($user->status ? 'Active' : 'InActive') . '</span>';
            })
            ->addColumn('company',function (User $user){
                return $user->getData('company');
            })
            ->addColumn('action', function (User $user){
                return view('user.action',compact('user'));
            })
            ->editColumn('last_login', function (User $user){
                return $user->last_login->format('Y-d-m H:i:s');
            });
//            ->addColumn('action', 'merchant/merchantsdatatable.action');
    }


    public function query(User $merchant)
    {
        return User::role('merchant')->get();
//        return $merchant->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('merchants-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0,'desc')
            ->responsive(true)
            ->autoWidth(true)
            ->parameters(['scrollX' => true])
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5')
            ->initComplete(" function () {
            this.api().column(1).every(function (col) {
                var column = this;
                $('#username').on('change', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }");
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('Id'),
            Column::make('username')->title('Merchant'),
            Column::make('company')->title('Company'),
            Column::computed('merchant_type')->title('Merchant Type'),
            Column::make('balance')->title('Balance'),
            Column::make('settlement_method')->title('Settlement Method'),
            Column::make('fund_out_commission_rate')->title('Fund Out Commission Rate'),
            Column::make('fund_in_commission_rate')->title('Fund In Commission Rate'),
            Column::make('status')->title('ُStatus'),
            Column::make('action')->title('Action')

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Merchants_' . date('YmdHis');
    }
}
