<?php 
 class DataBase{
    private $hostname ='localhost';
    private $username ='root';
    private $password = '';
    private $database = 'duan';

    private $conn = NULL;
    private $result = NULL;

    public function connect(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if(!$this->conn){
           echo "Kết nối thất bại!";
           exit(); 
        }
        else{
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }
    //Hàm thục thi câu lệnh truy vấn
    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this->result;
    }
    //Phương thức lấy dữ liệu
    public function getData(){
        if($this->result){
            $data = mysqli_fetch_array($this->result);
        }else{
            $data = 0;
        }
        return $data;
    }
    //Lấy toàn bộ dữ liệu
    public function getAllData(){
        if(!$this->result){
           $data = 0;
        }
        else{
            while($data = $this->getData()){
                $data[] = $data;
            }
        }
        return $data;
    }
    //Phương thức đếm số bản ghi

    //Phương thức thêm dữ liệu
    public function InsertData($masv,$hoten,$namsinh,$quequan,$sdt,$email,$gioitinh,$dantoc,$tongiao,$cccd,$ngaycap,$noicap){
        $sql = "INSERT INTO sinhvien(masv,hoten,namsinh,quequan,sdt,email,gioitinh,dantoc,tongiao,cccd,ngaycap,noicap)
                       VALUES('$masv','$hoten','$namsinh','$quequan','$sdt','$email','$gioitinh','$dantoc','$tongiao','$cccd','$ngaycap','$noicap')";
       return $this->execute($sql);
    }
    //Phương thức sửa dữ liệu
    public function UpdateData($masv,$hoten,$namsinh,$quequan,$sdt,$email,$gioitinh,$dantoc,$tongiao,$cccd,$ngaycap,$noicap){
        $sql = "UPDATE sinhvien 
                     SET masv='$masv',hoten='$hoten',namsinh='$namsinh',quequan='$quequan',sdt='$sdt',email='$email',gioitinh='$gioitinh',dantoc='$dantoc',tongiao='$tongiao',cccd='$cccd',ngaycap='$ngaycap',noicap='$noicap' WHERE masv='$masv'";
        return $this->execute($sql);
    }
    //Phương thức xóa
    public function DeleteData($masv){
        $sql = "DELETE FROM sinhvien WHERE masv='$masv'";
        return $this->execute($sql);
    }

 }
?>