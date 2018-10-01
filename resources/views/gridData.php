<?php

namespace resources\views;
use App\Http\Controllers\User\UserController;

class GridData extends UserController
{

        private $editing = false;
        private $optionsEditing = array();
        private $filter = false;
        private $headerArray = array();
        private $sortingGrid = false;
        private $add = false;
        


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

    public function add($add)
    {
        $this->add = $add;
    }


    public function dataGrid()
    {
        $user = $this->index();
        return $user;

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

            if($this->editing)
            {
                $header .=   '<th>actions</th>';
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
        // echo $dataArray;
        
        
            foreach ($dataArray as $key => $value) 
            {
                if($value["status"] == 1)
                {
                    $value["status"] = 'activo';
                }else
                {
                    $value["status"] = 'inactivo';
                }
                $body   .=   '<tr>';
                $body   .=        '<td>'.$value["username"].'</td>';
                $body   .=        '<td>'.$value["status"].'</td>';

                if($this->editing)
                {
                    $body .= '<td>';
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
                        $body .=   '<button type="button" class="btn btn-info addMaster" data-toggle="tooltip" data-placement="top" title="'.$options.'"><i class="'.$icon.'"></i></button>';
                    }
                    $body .= '</td>';
                }
                $body   .=   '</tr>';
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
            $filterRender  .=     '<label><strong></strong></label>';
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
        $table .=     '<h3 class="box-title">Usuarios</h3>';
        $table .=   '</div>';
        // if($this->add)
        // {
        //   $table .=  '<div class="col-md-4 col-sm-4 col-xs-4">
        //                 <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Agregar"><i class="fas fa-plus"></i></button>
        //             </div>';
        // }
        $table .= $this->renderFilter();
        $table .= '<table class="table table-bordered table-hover '.$sortin.'">';
        $table .= $this->headerGrid();
        $table .= $this->rowDataGrid();
        $table .= '</table>';
        $table .= '</div>';

        return $table;

    }
}