<?php
include('model/m_tintuc.php');
include('model/pager.php');


class C_tintuc{
    
    public function index(){
        $m_tintuc = new M_tintuc();
        $slide = $m_tintuc->getSlide();
        $menu = $m_tintuc->getMenu();
        return array('slide'=>$slide, 'menu' => $menu );
    }
    function loaitin(){
        $m_tintuc = new M_tintuc();
        $idloai = $_GET['idloai'];       
        $danmuctin = $m_tintuc->getTinTucByIdLoai($idloai);
        $trangHiemTai = (isset($_GET['page']))?$_GET['page']:1;

        $pagination = new pagination(count($danmuctin), $trangHiemTai, 10, 3 );
        $thanhphantrang = $pagination->showPagination();
        $limit = $pagination->_nItemOnPage;
        $vitri = ($trangHiemTai - 1)*$limit;
        $danmuctin = $m_tintuc->getTinTucByIdLoai($idloai, $vitri, $limit);
        $menu = $m_tintuc->getMenu();
        $title = $m_tintuc-> getTitle($idloai);
        return array('danmuctin'=>$danmuctin, 'menu' => $menu, 'title' => $title, 'thanhphantrang' => $thanhphantrang);        
    }

}


?>