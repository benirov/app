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

    public function headerGrid($headerArray)
    {
        $header = '<thead>';
        $header .=       '<tr>';
            foreach ($headerArray as $key => $value) {
                $header .=   '<th>'.$value.'</th>';
            }

        $header .=       '<tr>';
        $header .= '<thead>';
        return $header; 
        

    }

    public function rowDataGrid()
    {
        $body = '<tbody>';
        $data = $this->dataGrid();
        $someArray = json_decode($data, true);
            foreach ($someArray as $key => $value) {
                echo $value;
                $body   .=   '<tr>';
                $body   .=        '<td>'.$value.'</td>';
                $body   .=   '<tr>';
            }

        
        $body .= '<tbody>';
        

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
        $table .= $this->headerGrid();
        $table .= $this->rowDataGrid();
        $table .= '</table>';

        return $table;

    }
}