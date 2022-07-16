<?php

namespace App\DataTables\Settlement;

use App\Models\Settlement;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SettlementDataTable extends DataTable
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
            ->eloquent($query)
            ->rawColumns(['action','status','update_by'])
            ->editColumn('status',function (Settlement $settlement){
                switch ($settlement->status){
                    case 0 : {
                        return '<span class="badge badge-danger">Reject</span>';
                    }
                    case 1 : {
                        return '<span class="badge badge-success">Accept</span>';
                    }
                    case 2 : {
                        return '<span class="badge badge-info">Pending</span>';
                    }
                    default : {
                        return '<span class="badge badge-warning">Unknown</span>';
                    }
                }
            })
            ->editColumn('update_by',function (Settlement $settlement){
                return '<span class="badge badge-'.($settlement->update_by == 'bot' ? 'success' : 'info').'">' . __($settlement->update_by == 'bot' ? 'Bot' : '1001') . '</span>';
            })
            ->addColumn('amount',function (Settlement $settlement){
                return number_format($settlement->amount,2);
            })
            ->editColumn('merchant_id',function (Settlement $settlement){
                return $settlement->merchant->full_name;
            })
            ->addColumn('action', function (Settlement $settlement){
                return view('settlement.action',compact('settlement'));
            })
            ->editColumn('completed_at', function (Settlement $settlement){
                return $settlement->completed_at?->format('Y-d-m H:i:s');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Settlement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Settlement $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('settlement-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0,'desc')
            ->responsive(true)
            ->autoWidth(true)
            ->parameters(['scrollX' => true])
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->title('No'),
            Column::make('transaction_id')->title('Transaction Id'),
            Column::make('settlement_id')->title('Settlement Id'),
            Column::make('order_number')->title('Order No'),
            Column::make('merchant_id')->title('Merchant'),
            Column::make('customer_bank_code')->title('Bank Code'),
            Column::make('customer_bank_name')->title('Bank'),
            Column::make('account_name')->title('Account Name'),
            Column::make('account_number')->title('Account Number'),
            Column::make('amount')->title('Amount'),
            Column::make('remark')->title('Remark'),
            Column::make('status')->title('Transaction Status'),
            Column::make('update_by')->title('Updated By'),
            Column::make('completed_at')->title('Completed At'),
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
        return 'Settlement_' . date('YmdHis');
    }
}
