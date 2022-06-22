<?php
    define("encryption_method", "AES-128-CBC");
    define("key", "your_amazing_key_here");
    function encrypt($data) {
        $key = key;
        $plaintext = $data;
        $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
        return $ciphertext;
    }

    session_start();
    if(isset($_SESSION['unique_ID'])){
        include_once "config.php";
        $outgoing_user_ID = mysqli_real_escape_string($conn, $_POST['outgoing_user_ID']);
        $incoming_user_ID = mysqli_real_escape_string($conn, $_POST['incoming_user_ID']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Encrypt message
        $encrypted_message = encrypt($message);

        if(!empty($message)){
            $sql_message = mysqli_query($conn, "INSERT INTO messages (incoming_user_ID, outgoing_user_ID, message_input) 
                                         VALUES ({$incoming_user_ID}, {$outgoing_user_ID}, '{$encrypted_message}')") or die();
        }
    }
    else
    {
        header("../login.php");
    }
?>