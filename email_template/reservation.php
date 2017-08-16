<?php
	function reservation_template($data){
        $reservation = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Reservation Email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
 <tr>
  <td bgcolor="#fff" style="text-align: center ">
   <img src="../images/logo/ourghana.png" alt="Creating Email Magic" width="300" height="66" style="margin: 0 auto; display: block;" />
  </td>
 </tr>
 <tr>
  <td style="padding: 5px 30px 5px 30px;">
    <h3 style="color: #8E959C; font-family: helvetica; text-align: center; font-size: 20px">Room Reservation</h3>
  </td>
 </tr>
 <tr>
    <td><div style="width: 50px; height: 0; border: 2px solid #d4d4d4; margin: 5px auto;"></div></td>
  </tr>
 <tr>
    <td bgcolor="#F2F2F2" style="text-align: center; padding: 5px 50px 5px 50px; color: #8E959C">
    <table style="text-align: left; font-family: helvetica; font-size: 15px">
      
        <tr>
            <td style="width: 200px; padding: 10px 0;">Name</td>
            <td style="text-align: left">'.$data["name"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Email</td>
            <td>'.$data["email"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Telephone</td>
            <td'.$data["phone"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Address</td>
            <td>'.$data["address"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Arrive-Date</td>
            <td>'.$data["arrive-date"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Depart-Date</td>
            <td style="color: #2AE079;">'.$data["depart-date"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Room</td>
            <td style="color: #EBB65B;">'.$data["room"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Adults</td>
            <td style="color: #F05858;">'.$data["adults"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Children</td>
            <td style="color: #F05858;">'.$data["children"].'</td>
        </tr>
        <tr>
            <td style="padding: 10px 0;">Message</td>
            <td style="color: #F05858;">'.$data["message"].'</td>
        </tr>
    </table>    
    </td>
 </tr>
 <tr>
    <td><div style="width: 50px; height: 0; border: 2px solid #d4d4d4; margin: 5px auto;"></div></td>
  </tr>
 <tr>
  <td bgcolor="#fff" style="padding: 30px 30px 30px 30px;">
    <table style="text-align: left; font-family: helvetica; font-size: 15px; color: #8E959C ">
        <tr>
            <td>Afrikiko Resort </td>
        </tr>
        <tr>
            <td>Achimota near old barrier</td>
        </tr>
    </table>
  </td>
 </tr>
</table>
</body>
</html>';
        return $reservation;
    }
?>