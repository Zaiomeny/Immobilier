<?php
namespace App\Service\Table_traits;
trait Sortable{

    public string $orderField ='created_at';
    public string $orderDirection ='DESC';
    public function setOrderField(string $name)
    {
        if($name === $this->orderField)
        {
            $this->orderDirection = $this->orderDirection === "DESC" ?  "ASC" : "DESC";
        }else{
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }
}
