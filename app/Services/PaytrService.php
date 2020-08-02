<?php

namespace App\Services;

class PaytrService
{
    public function getToken($order)
    {
        // TODO remove it, only for debug purposes.
        return "token123123asdsdasd1231231token";

        ## Prepare order and user informations.
        $items = $order->items;
        $product_array = [];
        foreach ($items as $item){
            array_push($product_array, array($item->product->name, $item->price, $item->quantity));
        }
        ############### Müşterinin sepet/sipariş içeriği ####################################
        $user_basket = base64_encode(json_encode($product_array));
        #####################################################################################

        ############### Customer bilgileri ###################################################
        #
        $customer = $order->user;
        # Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        $email = $customer->email;
        #
        # Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        $user_name = $customer->first_name . " " . $customer->last_name;
        #
        # Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
        $user_address = $customer->address;
        #
        # Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
        $user_phone = $customer->phone_number;
                ## Kullanıcının IP adresi
                if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
                    $ip = $_SERVER["HTTP_CLIENT_IP"];
                } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
                    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                } else {
                    $ip = $_SERVER["REMOTE_ADDR"];
                }
        
        ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
        ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        $user_ip=$ip;
        ######################################################################################

        ################################### Sipariş bilgileri #################################################################
        # Tahsil edilecek tutar.
        $payment_amount	= $order->grand_total * 100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
        #
        # Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $merchant_oid = $order->id;
        #
        #######################################################################################################################

        ################################ API Entegrasyon Bilgileri ###########################
        $merchant_id 	= config('settings.paytr_merchant_id');
        $merchant_key 	= config('settings.paytr_merchant_key');
        $merchant_salt	= config('settings.paytr_merchant_salt');
        $redirect_host  = config('settings.paytr_redirect_host');
        ######################################################################################

        ######################################## Ödeme sonrası yönlendirme ####################################################
        # Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        # !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        # !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_ok_url = $redirect_host."/checkout/payment/paytr/succeeded?order={$order->id}";
        #
        # Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        # !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        # !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = $redirect_host."/checkout/payment/paytr/fail";
        #
        ########################################################################################################################

        ######################################## Ödeme konfigurasyonları #######################################################

        ## İşlem zaman aşımı süresi - dakika cinsinden
        $timeout_limit = "30";

        ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        $debug_on = 1; // TODO switch it

        ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
        $test_mode = 0;

        $no_installment	= 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

        ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        $max_installment = 0;

        $currency = "TL";
        
        $lang = (Session::get("locale") == "tr") ? "tr" : "en";
        ########################################################################################################################
        ########################################################################################################################
        ################################### PayTR'den Token'ı alma #############################################################
        $hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
        $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
        $post_vals=array(
                'merchant_id'=>$merchant_id,
                'user_ip'=>$user_ip,
                'merchant_oid'=>$merchant_oid,
                'email'=>$email,
                'payment_amount'=>$payment_amount,
                'paytr_token'=>$paytr_token,
                'user_basket'=>$user_basket,
                'debug_on'=>$debug_on,
                'no_installment'=>$no_installment,
                'max_installment'=>$max_installment,
                'user_name'=>$user_name,
                'user_address'=>$user_address,
                'user_phone'=>$user_phone,
                'merchant_ok_url'=>$merchant_ok_url,
                'merchant_fail_url'=>$merchant_fail_url,
                'timeout_limit'=>$timeout_limit,
                'lang' => $lang,
                'currency'=>$currency,
                'test_mode'=>$test_mode
            );

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = @curl_exec($ch);

        if(curl_errno($ch))
            die("PAYTR IFRAME connection error. err:".curl_error($ch));

        curl_close($ch);

        $result=json_decode($result,1);

        if($result['status']=='success')
            $token=$result['token'];
        else
            die("PAYTR IFRAME failed. reason:".$result['reason']);
        #########################################################################

        return $token;
    }
    /*
    *   Returns true if payment is successful
    *   else returns false.
    */
    public function getPaymentResultStatus($post, $order)
    {
        $merchant_key 	= config('settings.paytr_merchant_key');
        $merchant_salt	= config('settings.paytr_merchant_salt');
     
        $hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
        #
        ## Oluşturulan hash'i, paytr'dan gelen post içindeki hash ile karşılaştır (isteğin paytr'dan geldiğine ve değişmediğine emin olmak için)
        ## Bu işlemi yapmazsanız maddi zarara uğramanız olasıdır.
        if( $hash != $post['hash'] )
            return('bad_hash');
        ###########################################################################

        #
        ## Return true if the order is already confirmed
        if($order->status == "wait_ship" 
            || $order->status == "shipping"
            || $order->status == "declined" 
            || $order->status == "completed" 
            || $order->status == "return_shipping" 
            || $order->status == "returned")
        {
            return "already_confirmed";
        }

        if( $post['status'] == 'success' ) 
        { ## Ödeme Onaylandı
            return 'success';
        } 
        else 
        { ## Ödemeye Onay Verilmedi
            return "fail";
        }
        return 'unknown_status';
    }
}