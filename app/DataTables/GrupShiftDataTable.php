<?php

namespace App\DataTables;

use App\Models\ShiftGrup;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GrupShiftDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function(ShiftGrup $shif){
                $editUrl =  route('shift-grup.edit', ['shift_grup' => $shif->id]);
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
            ->addColumn('shift_name', function(ShiftGrup $shif){
                return $shif->shift_presence->name;
            })
            ->addColumn('shift_time', function(ShiftGrup $shif){
                return $shif->shift_presence->start_time . " - " . $shif->shift_presence->end_time;
            })
            ->rawColumns(['shift_name', 'shift_time', 'action'])
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ShiftGrup $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('grupshift-table')
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
            Column::make('name')->title('Nama Grup'),
            Column::make('shift_name')->title('Nama Shift'),
            Column::make('shift_time')->title('Jam Shift'),
            Column::make('day')->title('Hari'),
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
        return 'GrupShift_' . date('YmdHis');
    }
}
