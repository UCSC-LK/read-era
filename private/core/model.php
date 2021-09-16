<?php

class Model extends Database
{
    public $errors = array();
    public function __construct()
    {
        
        if(!property_exists($this, 'table'))
        {
            
            $this->table = strtolower($this::class) . "s";
        }
      
    }

    public function where($colomn, $value)
    {

        $column = addslashes($colomn);
        $query = "select * from $this->table where $colomn = :value";
        
        $data =  $this->query($query,[
            'value'=>$value
        ]);

        if(is_array($data)){

            if(property_exists($this, 'afterSelect'))
            {
                
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
    
                }
            }
        }
    

        return $data;
    }

    public function findAll()
    {

        $query = "select * from $this->table ";
        
        $data = $this->query($query);

        if(is_array($data)){

            if(property_exists($this, 'afterSelect'))
            {
                
                foreach($this->afterSelect as $func)
                {
                    $data = $this->$func($data);
    
                }
            }
        }
    

        return $data;

    }

    public function insert($data)
    {
        //remove unwanted colomns
        if(property_exists($this, 'allowedColumns'))
        {
            foreach($data as $key => $column)
            {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }

            }


        }

        //run functions before insert
        if(property_exists($this, 'beforeInsert'))
        {
            
            foreach($this->beforeInsert as $func)
            {
                $data = $this->$func($data);

            }
        }

        $keys = array_keys($data);
        $colomns = implode(',', $keys);
        $values = implode(',:', $keys);

        $query = "insert into $this->table ($colomns) values (:$values)";
                
        return $this->query($query, $data);
    }

    public function csv_import($data)
    {
        $keys = array_keys($data);
        $colomns = implode(',', $keys);
        $values = implode(',:', $keys);

        $query = "insert into $this->table ($colomns) values (:$values)";
        return $this->query($query, $data);

    }

    public function update($id, $data)
    {
        $str = "";
        foreach($data as $key => $value)
        {
            $str .= $key. "=:". $key.",";
        }

        $str = trim($str,",");
        $data['id'] = $id;

        $query = "update $this->table set $str where id =:id";
        
                
        return $this->query($query, $data);
    }

    public function delete($id)
    {
        $query  = "delete from $this->table where id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);
    }




}