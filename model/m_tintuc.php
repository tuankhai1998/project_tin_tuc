<?php
include('database.php');

class M_tintuc extends database{

    function getSlide(){
        $sql = "SELECT * FROM slide";
        $this-> setQuery($sql);
        return $this-> loadAllRows();
    }
    function getMenu(){
        $sql = "SELECT tl.*, GROUP_CONCAT( Distinct lt.idTheLoai,':', lt.Ten,':', lt.TenKhongDau ) AS LoaiTin, tt.id AS idTin, tt.TieuDe AS TieuDeTin, tt.TieuDeKhongDau AS TieuDeTinKhongDau, tt.TomTat AS TomTatTin, tt.NoiDung AS NoiDungTin, tt.Hinh AS HinhTin   
        FROM theloai tl INNER JOIN loaitin lt ON lt.idTheLoai = tl.id
        INNER JOIN tintuc tt ON tt.idLoaiTin = lt.id         
        GROUP BY tl.id  ";
        $this-> setQuery($sql);
        return $this -> loadAllRows();
    }

  
}

?>