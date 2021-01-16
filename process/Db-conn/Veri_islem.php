<?php
require_once ("ConnectDb.php");

class Veri_islem
{
    private $db;

    function __construct()
    {
        $instance = ConnectDb::getInstance();
        $pdo = $instance->getConnection();
        $this->db = $pdo;
    }

    function guncelle($tablo, $id, $satır, $yeni_veri)
    {

        $sql = "UPDATE $tablo
         SET $satır='$yeni_veri'
         where id='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    function tablo_getir_tek($tablo_adi, $where = "")
    {
        if ($where) {
            $where = "WHERE " . $where . "";
        }

        $sql = "SELECT * FROM $tablo_adi " . ($where ? $where : '')."  limit 1";

        print_r($sql);
        $sonuc = $this->db->query($sql);
        $gonder = $sonuc->fetch();
        return ($gonder);
    }

    function tablo_getir_tum($tablo_adi,  $where = "" ,$alan="", $siralama = "asc")
    {
        if ($where) {
            $where = "WHERE " . (string)$where . "";
        }
        $order="";
        if ($siralama && $alan) {
            $order="order by ".(string)$alan." ".(string)$siralama."";
        }


        $sonuc = $this->db->query("SELECT * FROM
            ".$tablo_adi."  
            " . ($where ? $where : '').($order ? $order : '')." 
            ")->fetchAll();
        return ($sonuc);
    }

    function tablo_secili_satir($tablo, $sutun, $istenen_veri)
    {
        $result = $this->db->prepare("SELECT * FROM $tablo WHERE $sutun=?");
        $result->execute([$istenen_veri]);
        $data = $result->fetchAll();
        return ($data);
    }

    function tablo_getir_id($tablo_adi, $id)
    {

        $sql = "SELECT * FROM $tablo_adi WHERE id='$id'";
        $sonuc = $this->db->query($sql);
        $gonder = $sonuc->fetch();
        return($gonder);
    }

    function tabloekle(){

            $ekle = $this->db->prepare('INSERT INTO bookhere SET
                      people = ?,
                      tarih = ?,
                      saat = ?,
                      username = ?,
                      email = ?,
                      phone = ?,
                      ');

        $insert = $ekle->execute(array(

            "'Elma'", "15", "Meyve","'Elma'", "15", "Meyve"

        ));

        if ( $ekle ) {

            $last_id = $this->db->lastInsertId();

            print "Veri Tabanına Kayıt Yapıldı ";

            echo $last_id;

        }
    }

    function bookEkle($people, $date, $time, $name, $email, $phone){
        $sql = "INSERT INTO bookhere (people, tarih, saat, username, email, phone)
                 VALUES ('$people', '$date', '$time', '$name', '$email','$phone')";
        // use exec() because no results are returned
        $this->db->exec($sql);
    }

}

/*$temp = new Veri_islem();
$num = $temp->tablo_getir_tek("farkli_sepet","musteri_id=3");
print_r($num);*/

?>


<?php
