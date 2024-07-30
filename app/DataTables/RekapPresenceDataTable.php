<?php

namespace App\DataTables;

use App\Models\Presence;
use App\Models\RekapPresence;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RekapPresenceDataTable extends DataTable
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
            ->addColumn('Tanggal', function(Presence $presence){
                $formattedDate = $presence->created_at->translatedFormat('d F Y');
                return $formattedDate;
            })
            ->addColumn('Nama', function(Presence $presence){
                $nd = $presence->user_profile->first_name !== null ? $presence->user_profile->first_name : '';
                $nb = $presence->user_profile->last_name !== null ? $presence->user_profile->last_name : '';
                return $nd . ' ' . $nb;
            })
            ->addColumn('Jam Masuk', function(Presence $presence){
                $status = $presence->status == "late" ? "Telat" : '';
                
                $html = '
                    '. $presence->checkin . ' 
                    <span class="badge bg-warning">
                        ' .  $status  .'
                    </span>
                ';
                return $html;
            })
            ->addColumn('Jam Pulang', function(Presence $presence){
                return $presence->checkout;
            })
            ->rawColumns([ 'Jam Masuk']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        $model = Presence::with(['user_profile'])->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc');
        
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('rekappresence-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdfHtml5'),
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
            Column::make('Tanggal'),
            Column::make('Nama'),
            Column::make('Jam Masuk'),
            Column::make('Jam Pulang'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RekapPresence_' . date('YmdHis');
    }
}
