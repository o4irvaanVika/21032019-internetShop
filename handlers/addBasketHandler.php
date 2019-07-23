<?php
    include('../modules/function.php');
    session_start();
    
    if( isset( $_POST['data']) ){
        if( !isset( $_SESSION['basket'] ) ){
            $_SESSION['basket'] = [];    
        }  
        $data = json_decode( $_POST['data'], true );
        $isFind = false;
        //Код посика товара в корзине
        foreach( $_SESSION['basket'] as $basketKey => $basketItem ){
            if( $data['id'] == $basketItem['id'] ){
                $isFind = true;
                $_SESSION['basket'][$basketKey]['count']++;
                break;       
            }
        }

        if( $isFind == false ){
            $data['count'] = 1;
            $_SESSION['basket'][] = $data;
        }
        
        d( $data );
    }

?>