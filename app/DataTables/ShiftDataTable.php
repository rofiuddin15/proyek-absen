<?php

namespace App\DataTables;

use App\Models\ShiftPresence;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ShiftDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function(ShiftPresence $shif){
                $editUrl =  route('shift-absen.edit', ['shift_absen' => $shif->id]);
                $html = '<div class="btn-group">
                        <a href="' . $editUrl .'" class="btn btn-sm btn-outline-secondary">
                            <i class="tf-icons bx bx-pencil"></i>
                        </a>
                        <button onclick="hapus('.$shif->id.')" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modal-delete">
                            <i class="tf-icons bx bx-trash"></i>
                        </button>
                        </div>';
                return $html;
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ShiftPresence $model): QueryBuilder
    {
        // $model = DB::table('shift_presences')->select('id', 'name as nama_shift', 'start_time as waktu_mulai', 'end_time as waktu_selesai')->get();
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('shift-table')
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
            Column::make('name')->title('Nama Shift'),
            Column::make('start_time')->title('Waktu Mulai'),
            Column::make('end_time')->title('Waktu Berakhir'),
            Column::make('range_open_presence')->title('Durasi Absen'),
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
        return 'Shift_' . date('YmdHis');
    }
}
