<?php

namespace App\DataTables\FundOut;

use App\Models\FundOut;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FundOutDataTable extends DataTable
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
            ->rawColumns(['action', 'status'])
            ->editColumn('status', function (FundOut $fundOut) {
                return '<span class="badge badge-' . ($fundOut->status ? 'success' : 'danger') . '">' . __($fundOut->status ? 'Active' : 'InActive') . '</span>';
            })
            ->editColumn('update_by', function (FundOut $fundOut) {
                return '<span class="badge badge-' . ($fundOut->update_by == 'bot' ? 'success' : 'info') . '">' . __($fundOut->update_by == 'bot' ? 'Bot' : '1001') . '</span>';
            })
            ->addColumn('amount', function (FundOut $fundOut) {
                return number_format($fundOut->amount, 2) . ' Rp';
            })
            ->editColumn('merchant_id', function (FundOut $fundOut) {
                return $fundOut->merchant->full_name;
            })
            ->addColumn('action', function (FundOut $fundIn) {
                return view('fundout.action', compact('fundIn'));
            })
            ->editColumn('completed_at', function (FundOut $fundOut) {
                return $fundOut->completed_at?->format('Y-d-m H:i:s');
            })->editColumn('created_at', function (FundOut $fundOut) {
                return $fundOut->created_at?->format('Y-d-m H:i:s');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\FundOut $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FundOut $model)
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
            ->setTableId('fund-out-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'desc')
            ->responsive(true)
            ->autoWidth(true)
            ->autoFillHorizontal(true)
            ->scrollX(true)
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
            Column::make('transaction_id')->title('Id'),
            Column::make('order_number')->title('Order No'),
            Column::make('merchant_id')->title('Merchant'),
            Column::make('account_name')->title('Account Name'),
            Column::make('account_number')->title('Account Number'),
            Column::make('customer_bank_code')->title('Bank Code'),
            Column::make('amount')->title('Amount'),
            Column::make('customer_bank_name')->title('Bank'),
            Column::make('service_charge')->title('Service Charge')->width(5),
            Column::make('status')->title('Transaction Status')->width(10),
            Column::make('update_by')->title('Updated By')->width(10),
            Column::make('completed_at')->title('Completed At'),
            Column::make('created_at')->title('Created At'),
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
        return 'FundOut_' . date('YmdHis');
    }
}
