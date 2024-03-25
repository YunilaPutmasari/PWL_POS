<?php
namespace App\DataTables;

use App\Models\LevelModel; // Ubah referensi model
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LevelDataTable extends DataTable // Ubah nama kelas
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($level) { // Ubah variabel $user menjadi $level
                return
                    '<a href="' . route('level.edit', $level->level_id) . '" class="btn btn-success btn-sm"><i
        class="fas fa-pencil-alt"></i> Edit</a>' . // Ubah route('user.edit') menjadi route('level.edit')
                    '<a href="' . route('level.delete', $level->level_id) . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
    Delete</a>'; // Ubah route('user.delete') menjadi route('level.delete')
    
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LevelModel $model): QueryBuilder // Ubah tipe model menjadi LevelModel
    {
        return $model->newQuery();
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('level-table') // Ubah ID tabel
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
            Column::make('level_id'), // Ubah nama kolom
            Column::make('level_kode'), // Ubah nama kolom
            Column::make('level_nama'), // Ubah nama kolom
            Column::make('created_at'), // Ubah nama kolom
            Column::make('updated_at'), // Ubah nama kolom
            Column::make('action'), // Ubah nama kolom
        ];
    }
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'level_' . date('YmdHis'); // Ubah nama file
    }
}