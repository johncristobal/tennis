<!DOCTYPE html>
<html>
<head>
    <!-- ==========================
    	Meta Tags 
    =========================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ==========================
    	Title 
    =========================== -->
    <title>Madrugaytors</title>
</head>
<body style="background-image:url(img/tenisWall.jpg); margin:0; padding:0;">
	       
    <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>                    
            <td bgcolor="#ffffff" style="padding: 40px; color: #555555;">       
                <div class="logo"><img src="<?php echo base_url()?>img/newlogo.png" width="110px" height="100px"></div> 
                <hr style=" border:1px solid #f1f1f1;">                                 <!-- Thumbnail Left, Text Right : BEGIN -->      
            </td>
        </tr>
        <tr>         
            <td dir="ltr" valign="top" style="font-size: 14px; line-height: 20px; color: #555555; padding: 20px; text-align: left;">
                <h1><span style="color:#724189;text-align:left; font-weight:600; font-size: 25px; text-transform:initial;">Hola,</span>
                    <span style="color:#2f3033;text-align:left; font-size: 25px; text-transform: initial; font-weight:100;"><?= $nombre;?></span>
                </h1>
            </td>    
        </tr>
        <tr>
            <td style="font-size: 12px; line-height: 20px; color: #555555; padding: 20px; text-align: left;">
                <p style="font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:150%;">
                    Tu oponente: <strong><?= $nombre_rival ?></strong> ha confirmado asistencia para el día <strong><?= $fecha ?></strong>.
                </p>                    
            </td>
        </tr>
        <tr>
        <td align="center">
            <p style="color:#999999;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:150%;">                
                Esperamos puedas verificar tu asistencia.<br> Revisa tu bandeja de entrada para ver los partidos pendientes.
                <br><br>
                Saludos
            </p>
        </td>
        </tr>
        <tr>
            <td style="padding: 40px;text-align: center;    border-radius: 20px;">
                <a href="http://www.madrugaytors.com" style="text-decoration: none;"><span style="font-size: 25px; color: #724189;">madrugaytors</span></a>
            </td>
        </tr>
    </table>
       
</body>
</html>