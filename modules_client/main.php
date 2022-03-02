<?php
    //Chia luồng
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'product': //danh sách hàng hóa
                include './modules_client/product/list_product.php';
                break;
            case 'detail': //chi tiết từng hàng hóa
                include './modules_client/product/detail_product.php';
                break;
            case 'search': //Tìm kiếm sản phẩm
                include './modules_client/product/search.php';
                break;  
            case 'profile': //Xem thông tin cơ bản của khách hàng
                include './modules_client/profile/profile.php';
                break;
            case 'order': //Xem đơn mua hàng và lịch sử mua
                include './modules_client/order/order.php';
                break;
            case 'cart': //Xem đơn mua hàng và lịch sử mua
                include './modules_client/cart/cart.php';
                break;    
        }
    }else {
        include './modules_client/main/homepage.php';
        // include './modules_client/main/product_list.php';
    }
?>