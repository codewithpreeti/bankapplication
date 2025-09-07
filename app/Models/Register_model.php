<?php
namespace App\Models;

use CodeIgniter\Model;

class Register_model extends Model
{

    public $db;
    public $session;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
//        $this->db = db_connect();
    }

    public function save_registration($dataInsert)
    {
//        echo "<pre>";
//        print_r($dataInsert);
//        die;
        if(!empty($dataInsert))
        {
            $builder=$this->db->table('bankapplication.registration');
            $result = $builder->where('email',$dataInsert['email'])->get()->getRowArray();
//            echo "<pre>";
//            print_r($result);
//            die;
            if(!empty($result))
            {
                echo "USER IS ALREADY REGISTERED";
            }else{
//                echo "<pre>";
//            print_r($dataInsert);
                $builder = $this->db->table('bankapplication.registration')->insert($dataInsert);
//************ Here INSERT FUNCTION RETURNS BOOL VALUE SO cannot call get() method on builder
//                $d = $this->db->getLastQuery();
//                echo "<pre>";
//                print_r($d);

//                NOW ONLY WANTS TO PRINT THE INSERT QUERY NOT TO EXECUTE THE QUERY
//                $builder = $this->db->table('bankapplication.registration');
//                $insertSql = $builder->set($dataInsert)->getCompiledInsert();
//                echo $insertSql;
//                echo ">>>";
//                die;
                if($builder ===true)
                {
                    echo "Registration Is Successful";
                }else{
                    echo "Not Registered, Some Error Occurred:".$this->db->error()['message'];;
                }

            }

            //BELOW IS THE WAY AND IMPLEMENTATION OBJECT AND ARRAY AND ALSO WHEN SINGLE ROW FETCH
//            $query = $builder->get()->getRowArray();
//            echo "<pre>";
//            print_r($query['full_name']);  //rinku devi
//            die;
//            $query = $builder->get()->getRow();
//            echo "<pre>";
//            print_r($query->full_name);  //rinku devi
//            die;
//            $sql = $builder->getCompiledSelect();
//            echo $sql;
//            die;

        }
//            $builder = $this->db->table('registration')->insert($dataInsert);
//            $builder->select('*');
//            $sql = $builder->getCompiledSelect();
//            echo $sql;
//            die;


    }

    public function loginCheckInRegistration($record)
    {
        $mail = $record['email'];
        $pwd = $record['pwd'];

        $builder = $this->db->table('bankapplication.registration');
        $builder->where('email',$mail)->where('password',$pwd);
//        $sql = $builder->getCompiledSelect();
//        echo $sql;
        $result= $builder->get()->getResultArray();
// echo "<pre>";
// print_r($result);
// die;
//        echo "countR=".count($result);
//        die;
//        $regCount = count($result);
        return $result;


    }
    public function loginCheckInForm($record)
    {

//        var_dump($record);
        $mail = $record['email'];
        $pwd = $record['pwd'];

        $builder1 = $this->db->table('bankapplication.form');
        $builder1->where('email',$mail);
//        $sql1 = $builder1->getCompiledSelect();
//        echo $sql1;

        $result1 = $builder1->get()->getResultArray();
//        echo "SD";
//        var_dump($result1);
//        echo "count=".count($result1);
//        die;
//        $formCount = count($result1);
        return $result1;

    }


}


?>