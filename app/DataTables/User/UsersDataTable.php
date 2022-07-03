<?php

namespace App\DataTables\User;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->eloquent($query)->rawColumns(['action','status'])
            ->editColumn('status',function (User $user){
                return '<span class="badge badge-'.($user->status ? 'success' : 'danger').'">' . __($user->status ? 'Active' : 'InActive') . '</span>';
            })
            ->addColumn('action', function (User $user){
                return view('user.action',compact('user'));
            })
            ->addColumn('role', function (User $user){
                if ($user->hasRole('manager')){
                    return 'Manager';
                }else if($user->hasRole('merchant')){
                    return 'Merchant';
                } else if($user->hasRole('finance')){
                    return 'Finance';
                }
                else if($user->hasRole('payout')){
                    return 'Payout';
                }
                if ($user->hasRole('user')){
                    return 'User';
                }else{
                    return 'Undefined';
                }
            })
            ->editColumn('last_login', function (User $user){
                return $user->last_login->format('Y-d-m H:i:s');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $user)
    {
        return $user->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
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
            Column::make('username')->title('Username'),
//            Column::computed('merchant')->title('Merchant'),
            Column::make('first_name')->title('First Name'),
            Column::make('last_name')->title('Last Name'),
            Column::make('role')->title('User Role'),
            Column::make('last_login')->title('Last Login'),
            Column::make('last_login_from')->title('Last Login From'),
            Column::make('status')->title('ُStatus'),
            Column::make('action')->title('Action')->orderable(false)

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
