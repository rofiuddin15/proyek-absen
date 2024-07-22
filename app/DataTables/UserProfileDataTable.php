<?php

namespace App\DataTables;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserProfileDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function(UserProfile $user) {
                $deleteUrl =  route('karyawan.destroy', ['karyawan' => $user->user_id]);
                $editUrl =  route('karyawan.edit', ['karyawan' => $user->user_id]);

                $html = '
                    <form action="'. $deleteUrl .'" method="POST">
                        '. csrf_field() .'
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="btn-group">
                        <a href="' . $editUrl .'" class="btn btn-sm btn-outline-secondary">
                            <i class="tf-icons bx bx-pencil"></i>
                        </a>
                        <button type="submit"  class="btn btn-sm btn-outline-secondary">
                            <i class="tf-icons bx bx-trash"></i>
                        </button>
                        </div>
                    </form>
                ';
                return $html;
            })
            ->rawColumns([ 'action'])
            ->addColumn('nama_depan', function(UserProfile $user){
                return $user->first_name;
            })
            ->addColumn('nama_belakang', function(UserProfile $user){
                return $user->last_name;
            })
            ->addColumn('jenis_kelamin', function(UserProfile $user){
                return $user->gender == 'L' ? 'Laki-Laki' : 'Perempuan';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(UserProfile $model): QueryBuilder
    {
        // $model = UserProfile::with('user')->get();
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('userprofile-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('nama_depan'),
            Column::make('nama_belakang'),
            Column::make('jenis_kelamin'),
            Column::make('phone'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'UserProfile_' . date('YmdHis');
    }
}
