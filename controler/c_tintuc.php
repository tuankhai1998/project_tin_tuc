<?php
include('model/m_tintuc.php');

class C_tintuc{
    
    public function index(){
        $m_tintuc = new M_tintuc();
        $slide = $m_tintuc->getSlide();
        $menu = $m_tintuc->getMenu();


        return array('slide'=>$slide, 'menu' => $menu );
    }

}


?>