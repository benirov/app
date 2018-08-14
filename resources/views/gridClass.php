<?php

namespace resources\views;
use App\Http\Controllers\Master\MasterController;

class GridClass extends MasterController
{

        public $fieldEditing = false;
        public $filter = false;
        public $headerArray = array();
    // $master = getMaster();



    

    public function dataGrid()
    {
        $master = $this->getMaster();
        return $master;

    }

    public function headerGrid()
    {
        $header = '<thead>';
        $header .=       '<tr class="sorting_asc">';
            foreach ($this->headerArray as $key)
            {
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

        $dataArray = json_decode($data, true);
        
        
            foreach ($dataArray as $key => $value) 
            {
                $body   .=   '<tr>';
                $body   .=        '<td>'.$value["id"].'</td>';
                $body   .=        '<td>'.$value["name"].'</td>';
                $body   .=        '<td>'.$value["status"].'</td>';
                $body   .=   '<tr>';
            }

        
        $body .= '<tbody>';
        return $body;
        

    }

    public function editingGrid($editing)
    {
            $this->fieldEditing = $editing;

    }

    public function filterGrid($filter)
    {
            $this->filter = $filter;

    }

    public function filterHeaderGrid($filter)
    {
            $this->filter = $filter;

    }



    public function renderGrid()
    {
        $table = '<table class="table table-bordered table-hover dataTable">';
        $table .= $this->headerGrid();
        $table .= $this->rowDataGrid();
        $table .= '</table>';

        return $table;

    }
}