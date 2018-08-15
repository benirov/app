<?php

namespace resources\views;
use App\Http\Controllers\Master\MasterController;

class GridClass extends MasterController
{

        private $editing = false;
        private $optionsEditing = array();
        private $filter = false;
        private $headerArray = array();
        private $sortingGrid = false;


    public function sortingGrid($sorting)
    {
        $this->sortingGrid = $sorting;
    }

    public function filter($filter)
    {
        $this->filter = $filter;
    }

     public function headerArray($headerArray)
    {
        $this->headerArray = $headerArray;
    }

    public function editing($editing)
    {
        $this->editing = $editing;
    }

     public function optionsEditing($headerOptions)
    {
        $this->optionsEditing = $headerOptions;
    }


    public function dataGrid()
    {
        $master = $this->getMaster();
        return $master;

    }

    public function headerGrid()
    {
        $sortin = '';
        if($this->sortingGrid)
        {
            $sortin = '<i class="fa fa-fw fa-sort"></i>';
        }
        $header = '<thead>';
        $header .=       '<tr class="sorting_asc">';
            foreach ($this->headerArray as $key)
            {
                $header .=   '<th >'.$key.$sortin.'</th>';
            }

        $header .=       '<tr>';
        $header .= '<thead>';
        return $header; 
        

    }

    public function rowDataGrid()
    {
        $body = '<tbody class="searchable">';
        $data = $this->dataGrid();

        $dataArray = json_decode($data, true);
        
        
            foreach ($dataArray as $key => $value) 
            {
                $body   .=   '<tr>';
                $body   .=        '<td>'.$value["id"].'</td>';
                $body   .=        '<td>'.$value["name"].'</td>';
                $body   .=        '<td>'.$value["status"].'</td>';
                $body   .=   '<tr>';

                if($this->editing)
                {
                    $body .= '<tr>';
                    foreach ($this->optionsEditing as $options)
                    {
                        switch ($options) {
                            case 'editing':
                                $icon = 'fas fa-edit';
                                break;

                                case 'deleted':
                                $icon = 'fas fa-trash-alt';
                                break;
                            
                            default:
                                $icon = '';
                                break;
                        }
                        $body .=   '<button type="button" class="btn btn-info addMaster" data-toggle="tooltip" data-placement="top" title="Agregar Categoria"><i class="'.$icon.'"></i></button>';
                    }
                    $body .= '</tr>';
                }
            }

        
        $body .= '<tbody>';
        return $body;
        

    }

    public function editingGrid($editing)
    {
            $this->fieldEditing = $editing;

    }

    public function renderFilter()
    {
        $filterRender = '';
        if($this->filter)
        {
            $filterRender   = '<div class="row">';
            $filterRender  .=   '<div class="col-md-4">';
            $filterRender  .=     '<label><strong>filtro</strong></label>';
            $filterRender  .=    '<input type="text" class="form-control  inputSearchTable" id="filter" placeholder="search">';
             $filterRender .=   '</div>';
            $filterRender  .= '</div><br>';
        }

        return $filterRender;
    }

    

    public function actionsGrid($filter)
    {
            $this->filter = $filter;

    }



    public function renderGrid()
    {
        $sortin = '';
        if($this->sortingGrid)
        {
            $sortin = 'dataTable';
        }
        $table = '<div class="box box-primary">';
        $table .=   '<div class="">';
        $table .=     '<h3 class="box-title">Categorias</h3>';
        $table .=   '</div>';
        $table .= $this->renderFilter();
        $table .= '<table class="table table-bordered table-hover '.$sortin.'">';
        $table .= $this->headerGrid();
        $table .= $this->rowDataGrid();
        $table .= '</table>';
        $table .= '</div>';

        return $table;

    }
}