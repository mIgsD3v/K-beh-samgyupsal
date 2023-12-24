<?php

class DBController
{
    // Database Connection Properties
    protected $host = 'localhost																																																																																																																																																																																																																												';
    protected $user = 'root';
    protected $password = '';
    protected $database = "kkdbase";

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        $this->con = mysqli_connect('localhost','root', '', 'kkdbase');
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}
