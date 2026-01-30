<?php
session_start();

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db13";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";        
            if(isset($arg[0])){
                if(is_array($arg[0])){
                    $where=$this->array2sql($arg[0]);
                    $sql .= " WHERE ".join(" AND ",$where);
                }else{
                    $sql .=$arg[0];
                }
            }

            if(isset($arg[1])){
                $sql .= $arg[1];
            }

            //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($id){
         $sql="SELECT * FROM $this->table ";        
            
        if(is_array($id)){
            $where=$this->array2sql($id);
            $sql .= " WHERE ".join(" AND ",$where);
        }else{
            $sql .= " WHERE `id`='{$id}'";
        }
            
            //echo $sql;

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function save($array){
        if(isset($array['id'])){
            //update
            $set=$this->array2sql($array);
            $sql="UPDATE $this->table SET ".join(",",$set). " WHERE `id`='{$array['id']}'";
        }else{
            //insert
            $cols=array_keys($array);
            $sql="INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";
        }

        //echo $sql;
        return $this->pdo->exec($sql);

    }
    function del($id){
         $sql="DELETE FROM $this->table ";        
            
        if(is_array($id)){
            $where=$this->array2sql($id);
            $sql .= " WHERE ".join(" AND ",$where);
        }else{
            $sql .= " WHERE `id`='{$id}'";
        }
            
        return $this->pdo->exec($sql);
    }
    function count(...$arg){
        $sql="SELECT count(*) FROM $this->table ";        
            if(isset($arg[0])){
                if(is_array($arg[0])){
                    $where=$this->array2sql($arg[0]);
                    $sql .= " WHERE ".join(" AND ",$where);
                }else{
                    $sql .=$arg[0];
                }
            }

            if(isset($arg[1])){
                $sql .= $arg[1];
            }

            //echo $sql;

        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($col,...$arg){
        $sql="SELECT sum(`$col`) FROM $this->table ";        
            if(isset($arg[0])){
                if(is_array($arg[0])){
                    $where=$this->array2sql($arg[0]);
                    $sql .= " WHERE ".join(" AND ",$where);
                }else{
                    $sql .=$arg[0];
                }
            }

            if(isset($arg[1])){
                $sql .= $arg[1];
            }

        
        return $this->pdo->query($sql)->fetchColumn();
    }

    private function array2sql($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:".$url);
}

function q($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=db13";
    $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


$Bot=new DB('bot');
$Mem=new DB('members');
$Admin=new DB('admin');

