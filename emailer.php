<?php 
    function require_multi($files) {
        $files = func_get_args();
        foreach($files as $file)
            require_once($file);
    }

    function send_mail($data, $type) {
    require_once "/vendor/autoload.php";
    require_once "auth.php";

    $mail = new PHPMailer;
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = $USERNAME;
    $mail->Password = $PASSWORD;
    $mail->SMTPSecure = "ssl";  
    $mail->Host = $HOST;
    $mail->Port = $PORT;
    $mail->From = $USERNAME;
    $mail->FromName = $NAME;
    $mail->AddAddress($MANAGER_EMAIL, $MANAGER_NAME);
    $mail->AddAddress(sender($data), sender_name($data));
    $mail->Subject  = email_subject($type);
    $mail->IsHTML(true);

    $mail->Body = email_template($data, $type);

        if($mail->Send()){
            redirect_page($type);
        }
        else{
            echo "Mail Error - >".$mail->ErrorInfo;
        }  
    }

    function sender($data){
        return $data['email'];
    }

    function sender_name($data){
        return $data['name'];
    }

    function email_template($data, $type){
        require_multi("email_template/reservation.php", "email_template/comment.php");
        
        $template = "Ma guy no template for this one ooo";
        
        if ($type == "reservation"){
            $template = reservation_template($data);
            }
        elseif ($type == "comment") {
            $template = comment_template($data);    
            }
        else{
            $template = "";
        }
        return $template;
    }

    function redirect_page($type){
        header("Location: thank_you_".$type.".php");
    }

     function email_subject($type){
        if ($type == "reservation"){
            $subject = "Reservation Request";
            }
        elseif ($type == "comment") {
            $subject = "Customer Comment Email" ;   
            }
        else{
            $subject = "From Hotel";
        }
        return $subject;
    }
?>  