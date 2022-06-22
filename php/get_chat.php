<?php
    define("encryption_method", "AES-128-CBC");
    define("key", "your_amazing_key_here");

    function decrypt($data) {
        $key = key;
        $c = base64_decode($data);
        $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        if (hash_equals($hmac, $calcmac))
        {
            return $original_plaintext;
        }
    }

    session_start();
    if(isset($_SESSION['unique_ID'])){
        include_once "config.php";
        $outgoing_user_ID = mysqli_real_escape_string($conn, $_POST['outgoing_user_ID']);
        $incoming_user_ID = mysqli_real_escape_string($conn, $_POST['incoming_user_ID']);
        $message = "";

        $sql_get_messages = "SELECT * FROM messages 
                             LEFT JOIN users ON users.unique_ID = messages.outgoing_user_ID
                             WHERE (outgoing_user_ID = {$outgoing_user_ID} AND incoming_user_ID = {$incoming_user_ID})
                             OR (outgoing_user_ID = {$incoming_user_ID} AND incoming_user_ID = {$outgoing_user_ID}) ORDER BY message_ID";
        
        $query_get_messages = mysqli_query($conn, $sql_get_messages);
        
        if(mysqli_num_rows($query_get_messages) > 0){
            while($query_data = mysqli_fetch_assoc($query_get_messages)){
                if($query_data['outgoing_user_ID'] === $outgoing_user_ID){
                    $message .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. decrypt($query_data['message_input']) .'</p>
                                    </div>
                                </div>';
                }
                else
                {
                    $message .= '<div class="chat incoming">
                                    <img src="php/images/'. $query_data['profile_img'] .'" alt="">
                                    <div class="details">
                                        <p>'. decrypt($query_data['message_input']) .'</p>
                                    </div>
                                </div>';
                }
            }
        }
        echo $message;
    }
    else
    {
        header("../login.php");
    }
?> 