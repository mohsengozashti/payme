<?php

namespace App\DataTables\FundIn;

use App\Models\FundIn;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FundInDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['action','status','update_by'])
            ->editColumn('status',function (FundIn $fundIn){
                switch ($fundIn->status){
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
            ->editColumn('update_by',function (FundIn $fundIn){
                return '<span class="badge badge-'.($fundIn->update_by == 'bot' ? 'success' : 'info').'">' . __($fundIn->update_by == 'bot' ? 'Bot' : 'Manual') . '</span>';
            })
            ->addColumn('requested_amount',function (FundIn $fundIn){
                return number_format($fundIn->requested_amount,2);
            })
            ->addColumn('fund_in_commission',function (FundIn $fundIn){
                return $fundIn->fund_in_commission;
            })
            ->editColumn('merchant_id',function (FundIn $fundIn){
                return $fundIn->merchant->full_name;
            })
            ->addColumn('action', function (FundIn $fundIn){
                return view('fundin.action',compact('fundIn'));
            })
            ->editColumn('completed_at', function (FundIn $fundIn){
                return $fundIn->completed_at?->format('Y-d-m H:i:s');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param FundIn $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FundIn $model): \Illuminate\Database\Eloquent\Builder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html(): Builder
    {
        return $this->builder()
            ->setTableId('fund-in-table')
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
    protected function getColumns(): array
    {
        return [
            Column::make('id')->title('No'),
            Column::make('transaction_id')->title('Id'),
            Column::make('order_number')->title('Order No'),
            Column::make('merchant_id')->title('Merchant'),
            Column::make('customer_bank_code')->title('Bank Code'),
            Column::make('requested_amount')->title('RequestedAmount'),
            Column::make('customer_bank_name')->title('Bank'),
            Column::make('fund_in_commission')->title('Fund In Commission'),
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
    protected function filename(): string
    {
        return 'FundIn_' . date('YmdHis');
    }
}
