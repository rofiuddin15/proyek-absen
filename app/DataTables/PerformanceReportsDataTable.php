<?php

namespace App\DataTables;

use App\Models\PerformanceReport;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PerformanceReportsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('#', function() {
                static $rowNumber = 0;
                return ++$rowNumber;
            })
            ->addColumn('report_description', function(PerformanceReport $performanceReport){
                return $performanceReport->report_description;
            })
            ->addColumn('file', function(PerformanceReport $performanceReport){
                $imageUrl = url('/storage/kinerja/' . $performanceReport->file->photo);
                $img = '
                <img src="'. $imageUrl . '" alt="Image broken" class="img-thumbnail rounded object-fit-fill">
                ';
                return $img;
            })
            ->addColumn('action', function(PerformanceReport $performanceReport) {
                $deleteUrl =  route('laporan-kinerja.destroy', ['laporan_kinerja' => $performanceReport->id]);
                $html = '
                    <form action="'. $deleteUrl .'" method="POST">
                        '. csrf_field() .'
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit"  class="btn btn-sm btn-outline-secondary">
                            <i class="tf-icons bx bx-trash"></i>
                        </button>
                    </form>
                ';
                return $html;
            })
            ->rawColumns(['file', 'action']);

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        $id = auth()->user()->id;
        $model = PerformanceReport::with('file')->where('user_id', $id)->orderBy("created_at","desc");
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('performancereports-table')
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
            Column::make('#'),
            Column::make('report_description'),
            Column::make('file'),
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
        return 'PerformanceReports_' . date('YmdHis');
    }
}
