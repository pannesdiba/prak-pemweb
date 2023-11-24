<?php
//Pannes Diba Sabila
//121140117
//RB

class InvalidNameException extends InvalidArgumentException {}
class InvalidNimException extends InvalidArgumentException {}
class InvalidProdiException extends InvalidArgumentException {}
class InvalidAlamatException extends InvalidArgumentException {}

class Validator {
    public static function validateName($nama) {
        $regex = '/^[a-zA-Z\s]+$/';
        if (!preg_match($regex, $nama)) {
            throw new InvalidNameException("Nama '$nama' Harus berisi huruf dan terdapat spasi.");
        }
    }

    public static function validateNim($nim) {
        $regex = '/^[0-9]{9}$/';
        if (!preg_match($regex, $nim)) {
            throw new InvalidNimException("NIM '$nim' harus berisi dari 9 digit angka.");
        }
    }

    public static function validateProdi($prodi) {
        $regex = '/^[a-zA-Z\s]+$/';
        if (!preg_match($regex, $prodi)) {
            throw new InvalidProdiException("Prodi '$prodi' harus berisi huruf dan terdapat spasi.");
        }
    }

    public static function validateAlamat($alamat) {
        $regex = '/^[a-zA-Z0-9\s\.,#-]+$/';
        if (!preg_match($regex, $alamat)) {
            throw new InvalidAlamatException("Alamat '$alamat' harus berisi huruf, angka, dan karakter khusus.");
        }
    }
}

class Person {
    protected $nama;

    public function setNama($nama) {
        Validator::validateName($nama);
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

class Mahasiswa extends Person {
    private $nim;
    private $prodi;
    private $alamat;

    public function __construct($nama, $nim, $prodi, $alamat) {
        parent::setNama($nama);
        $this->setNim($nim);
        $this->setProdi($prodi);
        $this->setAlamat($alamat);
    }

    public function setNim($nim) {
        Validator::validateNim($nim);
        $this->nim = $nim;
    }

    public function setProdi($prodi) {
        Validator::validateProdi($prodi);
        $this->prodi = $prodi;
    }

    public function setAlamat($alamat) {
        Validator::validateAlamat($alamat);
        $this->alamat = $alamat;
    }

    public function getNim() {
        return $this->nim;
    }

    public function getProdi() {
        return $this->prodi;
    }

    public function getAlamat() {
        return $this->alamat;
    }
}

try {
    $mahasiswa = new Mahasiswa("Diba Sabila", "121140117", "Teknik Informatika", "Sukarame");
    echo "NIM: " . $mahasiswa->getNim();
} catch (InvalidArgumentException $error) {
    echo "Error: " . $error->getMessage(). "\n";
}

?>
