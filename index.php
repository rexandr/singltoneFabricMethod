<?php
echo "<strong>INDEX</strong><br>";

//use Myprogect\Singltone;
require_once 'Singltone.php';

class Db extends Singltone
{
    private $connect;

    protected function __construct()
    {
        try {
            $this->connect = new PDO('mysql:host=127.0.0.1;dbname=ism', "root", "root");
        }catch (Exception $e){
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function testConnect($text)
    {
        if ($this->connect)
        {
            echo '<br><strong>Connected'.$text.'!</strong><br>';
            $stmt = $this->connect->prepare("SELECT * FROM products");
            $stmt->execute();
            echo '<pre>';
            print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
            echo '</pre>';
//            echo '<pre>';
//            print_r(parent::getSingle()->);
//            echo '</pre>';
            
        }else{
            echo '<br><strong>Disconnected!</strong><br>';
        };
    }

    public static function bdConnect()
    {
        $db = static::getSingle();
        $db->testConnect("Singleton");
    }
}

//Db::bdConnect();
$data = Db::bdConnect();
$base = Db::bdConnect();
echo '<pre>';
var_dump($data === $base);
echo '</pre>';

echo '<pre>';
print_r(Db::getSingle());
echo '</pre>';




class Db1 extends Singltone
{
    private $connect1;

    protected function __construct()
    {
        try {
            $this->connect1 = new PDO('mysql:host=127.0.0.1;dbname=ism', "root", "root");
        }catch (Exception $e){
            echo '<pre>';
            print_r($e->getMessage());
            echo '</pre>';
        }
    }

    public function testConnect($text)
    {
        if ($this->connect1)
        {
            echo '<br><strong>Connected'.$text.'!</strong><br>';
            $stmt1 = $this->connect1->prepare("SELECT * FROM products");
            $stmt1->execute();
            echo '<pre>';
            print_r($stmt1->fetchAll(PDO::FETCH_ASSOC));
            echo '</pre>';
//            echo '<pre>';
//            print_r(parent::getSingle()->);
//            echo '</pre>';

        }else{
            echo '<br><strong>Disconnected!</strong><br>';
        };
    }

    public static function bdConnect()
    {
        $db1 = static::getSingle();
        $db1->testConnect("Singleton");
    }
}

//$data1 = Db1::bdConnect();
//$base1 = Db1::bdConnect();
//echo '<pre>';
//var_dump($data1 === $base1);
//echo '</pre>';
//
//echo '<pre>';
//print_r(Db1::getSingle());
//echo '</pre>';
