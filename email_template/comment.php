<?php

	function comment_template($data)
	{
			$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
					 <head>
					  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					  <title>Customer Comment Email</title>
					  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
					</head>
					<body style="margin: 0; padding: 0;">
					 <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">';
			$logo = '
					 <tr>
					  <td bgcolor="#fff" style="text-align: center ">
					   <img src="http://ourghana.com/wp-content/uploads/2017/04/ourghana.png" alt="ourghana logo" width="300" height="66" style="margin: 0 auto; display: block;" />
					  </td>
					 </tr>';

			$middle = '
					<tr>
					  <td style="padding: 5px 30px 5px 30px;">
						<h3 style="color: #8E959C; font-family: "helvetica"; text-align: center; font-size: 20px">Customer Comment </h3>
					  </td>
					 </tr>
					 <tr>
					    <td><div style="width: 50px; height: 0; border: 2px solid #d4d4d4; margin: 5px auto;"></div></td>
					 </tr>
					 <tr>
					 	<td bgcolor="#F2F2F2" style="text-align: center; padding: 5px 50px 5px 50px; color: #8E959C">
					 	<table style="text-align: left; font-family: helvetica; font-size: 15px">';

			$body = loop_td($data);

			$footer = '
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
			return $header.$logo.$middle.$body.$footer;
	}

	function loop_td ($data) {
		$td = "";
		foreach ($data as $subject => $value) {
			if ($subject != 'submit'){
				$newSubject = str_replace("-", " ", $subject);
				$newSubject = ucfirst($newSubject);
				$td .= '<tr><td style="padding: 10px 0;">'.$newSubject.'</td><td>'.$value.'</td></tr>';
			}
		}
	return $td;
	}
