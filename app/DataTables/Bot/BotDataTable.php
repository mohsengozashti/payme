<?php

namespace App\DataTables\Bot;

use App\Models\BotReport;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BotDataTable extends DataTable
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
            ->editColumn('amount',function (BotReport $botReport){
                return number_format($botReport->amount,2);
            })
            ->editColumn('date', function (BotReport $botReport){
                return $botReport->date?->format('Y-d-m H:i:s');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BotReport $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BotReport $model)
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
            ->setTableId('bot-table')
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
            Column::make('transaction_id')->title('Id'),
            Column::make('order_number')->title('Order No'),
            Column::make('amount')->title('Amount'),
            Column::make('bank_name')->title('Bank'),
            Column::make('date')->title('Completed At'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Bot/Bot_' . date('YmdHis');
    }
}
