<?php
include('database.php');

class M_tintuc extends database{

    function getSlide(){
        $sql = "SELECT * FROM slide";
        $this-> setQuery($sql);
        return $this-> loadAllRows();
    }
    function getMenu(){
        $sql = "SELECT tl.*, GROUP_CONCAT( Distinct lt.id,':', lt.Ten,':', lt.TenKhongDau ) AS LoaiTin, tt.id AS idTin,
        tt.TieuDe AS TieuDeTin, tt.TieuDeKhongDau AS TieuDeTinKhongDau, tt.TomTat AS TomTatTin, tt.NoiDung AS NoiDungTin, tt.Hinh AS HinhTin   
        FROM theloai tl INNER JOIN loaitin lt ON lt.idTheLoai = tl.id
        INNER JOIN tintuc tt ON tt.idLoaiTin = lt.id         
        GROUP BY tl.id  ";
        $this-> setQuery($sql);
        return $this -> loadAllRows();

    }
    function getTinTucByIdLoai($idloai, $vitri = -1, $limit = -1 ){ 
           
        if($vitri > -1 && $limit > 1 ){
            $sql  = "SELECT * FROM tintuc tt WHERE tt.idLoaiTin = $idloai LIMIT $vitri, $limit";
        }
        else{
            $sql = "SELECT * FROM tintuc tt WHERE tt.idLoaiTin = $idloai";    
        }
        $this-> setQuery($sql);
        return $this-> loadAllRows(array($idloai));
    }
    function getTitle($idloai){
        $sql = "SELECT Ten FROM loaitin lt WHERE lt.id = $idloai ";
        $this-> setQuery($sql);
        // return $this-> loadAllRows(array($idloai));chỉ cần lấy 1 tham số thif khoogn phải dùng loadAllRows chỉ cần dùng loadRow
        return $this-> loadRow(array($idloai));

    }

  
}

?>