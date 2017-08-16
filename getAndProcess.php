<?php 

    function processor($arr, $type, $validate){
          $postKey = [];
          $postData = [];
          $errCount = 0;
          $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
          $string_exp = '/^[A-Za-z .]+$/';
          $phone_exp = '/^\+?[\d -]{6,}$/';
          $digit_exp = '/^[0-9]$/';

          foreach ($arr as $key => $value) {
            if ($key != 'submit'){
                array_push($postKey, $key);
                array_push($postData, $value);
                $err_msg[$key] = "";
                if (isset($validate[$key])){
                                     foreach ($validate[$key] as $inner => $data) {
                    if($inner == 'required' && $data == True){
                        if (strlen($value) == 0) {
                            $err_msg[$key] = 'This field is required';
                            $errCount++;
                        }
                    }

                    if($inner == 'string' && $data == True){
                        if (strlen($value) != 0) {
                            if (!preg_match($string_exp, $value)) {
                                $err_msg[$key] = 'This is a text only field';
                                $errCount++;
                            }
                        }
                    }
                    if($inner == 'email' && $data == True){
                        if (strlen($value) != 0) {
                            if (!preg_match($email_exp, $value)) {
                                $err_msg[$key] = 'This email is incorrect';
                                $errCount++;
                            }
                        }
                    }
                    if($inner == 'digit' && $data == True){
                        if (strlen($value) != 0) {
                            if (!preg_match($digit_exp, $value)) {
                                $err_msg[$key] = 'This is a digit only field';
                                $errCount++;
                            }
                        }
                    }
                    if($inner == 'phone' && $data == True){
                        if (strlen($value) != 0) {
                            $countDash =    
                            $countSpace = substr_count($value, " ");
                            $countPlus = substr_count($value, "+");
                            if (preg_match($phone_exp, $value)) {
                                if ($countPlus >1  || $countSpace >4 || $countDash >4) {
                                    $err_msg[$key] = 'The phone number  you entered does not appear to be valid.';
                                    $errCount++;
                                }
                            }
                            else {
                                    $err_msg[$key] = 'The phone number is incorrect'; 
                            }
                        }
                    }
                    if($inner == 'textbox' && $data == True){
                        if (strlen($value) != 0) {
                            if (strlen($value) <= 3){
                                $err_msg[$key] = 'This is too short';
                                $errCount++;
                            }
                        }
                    }
                }
                }
            }
        }
        if ($errCount == 0 ){
            send_mail($arr, $type);
        }
        else{
            return $err_msg;
        }
        // else if the error count is equal to the total post data  :err_msg is pleae submit a form with date_add()
    }
?>