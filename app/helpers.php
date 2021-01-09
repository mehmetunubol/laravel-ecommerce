<?php
function orderStatusToTr($status)
{
    switch ($status) {
        case 'pending':
            $status = "Bekliyor";
            break;
        
        case 'wait_payment':
            # code...
            $status = "Ödeme Bekliyor";
            break;

        case 'wait_pay_confirm':
            # code...
            $status = "Ödeme Onaylandı";
            break;

        case 'wait_ship':
            # code...
            $status = "Kargolanacak";
            break;
        case 'declined':
            # code...
            $status = "Reddedildi";
            break;

        case 'shipping':
            # code...
            $status = "Kargoya verildi";
            break;

        case 'completed':
            # code...
            $status = "Tamamlandı";
            break;

        case 'return_shipping':
            # code...
            $status = "İade Sürecinde";
            break;

        case 'returned':
            # code...
            $status = "İade edildi";
            break;

        default:
            $status= "";
            
    }
    return $status;
}