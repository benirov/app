<?php

namespace resources\views;
use App\Http\Controllers\Master\MasterController;

class GridClass extends MasterController
{

        public $fieldEditing = false;
        public $filter = false;
    // $master = getMaster();



    

    public function dataGrid()
    {
        $master = $this->getMaster();
        return $master;

    }

    public function headerGrid($header)
    {
        $header = '<thead>';
        $header =       '<tr>';
            foreach ($header as $key => $value) {
                $header =   '<th>'.$value.'</th>';
            }

        $header =       '<tr>';
        $header = '<thead>';
        

    }

    public function rowDataGrid()
    {
        $body = '<tbody>';
            foreach ($this->dataGrid() as $key => $value) {
                $body   =   '<tr>';
                $title  =        '<td>'.$value.'</td>';
                $header =   '<tr>';
            }

        
        $header = '<thead>';
        

    }

    public function editingGrid($editing)
    {
            $this->fieldEditing = $editing;

    }

    public function filterGrid($filter)
    {
            $this->filter = $filter;

    }



    public function renderGrid()
    {
        $table = '<table border>';
        $table = $this->headerGrid();
        $table = $this->rowDataGrid();
        $table = '</table>';

        return $table;

    }
}