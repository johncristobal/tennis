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
                <div class="logo"><img src="<?php echo base_url()?>img/logotipo2.png" width="150px" height="73px"></div> 
                <hr style=" border:1px solid #f1f1f1;">                                 <!-- Thumbnail Left, Text Right : BEGIN -->      
            </td>
        </tr>
        <tr>         
            <td dir="ltr" valign="top" style="font-size: 14px; line-height: 20px; color: #555555; padding: 20px; text-align: left;">
                <h1><span style="color:#00aeef;text-align:left; font-weight:600; font-size: 25px; text-transform:initial;">Hola,</span>
                    <span style="color:#2f3033;text-align:left; font-size: 25px; text-transform: initial; font-weight:100;"><?= $nombre;?> </span>
                </h1>
            </td>    
        </tr>
        <tr>
            <td style="font-size: 12px; line-height: 20px; color: #555555; padding: 20px; text-align: left;">
                <p style="font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:150%;">
                    Te recordamos que tienes programados los siguientes enfrentamientos:
                </p>                    
            </td>
        </tr>
        <tr>
            <td>
                <table style="border-spacing: 0; font-family:Helvetica,Arial,sans-serif;" width="100%">
                    <thead style="background-color: #2ECC71; border-top-left-radius: 15px; color: white">
                        <tr style="height: 50px;">
                            <th style="border-top-left-radius: 15px;" width="15%">Fecha</th>
                            <th width="20%">Jugador</th>
                            <th width="20%">Lugar</th>
                            <th style="border-top-right-radius: 15px;" width="45%">Confirmar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($datos as $key => $value) {                                
                        ?>
                        <tr>
                            <td width="15%">
                                <p style="font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:150%;">
                                    <?= $value['fecha'] ?>
                                </p>
                            </td>
                            <td width="20%" align="center">
                                <p style="font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:150%;">
                                    <?= $value['idrival'] ?>
                                </p>
                            </td>
                            <td width="20%" align="center">
                                <p style="font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:150%;">
                                    Deportivo Izcalli
                                </p>
                            </td>
                            <td width="45%" align="center">
                                <br>
                                <div style="height: 20px; background-color: #00aeef; width: 120px;padding: 5px; border-radius: 10px"><a href="<?php echo base_url()?>Torneos/confirmarPartido/<?= $idjugador ?>/<?= $value['idpartido'] ?>/7" style="text-decoration: none; color: white">Ahí estaré</a></div>
                                <br>
                                <div style="height: 20px; background-color: red; width: 120px;padding: 5px; border-radius: 10px"><a href="<?php echo base_url()?>Torneos/confirmarPartido/<?= $idjugador ?>/<?= $value['idpartido'] ?>/8" style="text-decoration: none; color: white;">No podré asistir</a></div> 
                            </td>
                        </tr>  
                        <?php } ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
        <td align="center">
            <p style="color:#999999;font-family:Helvetica,Arial,sans-serif;font-size:14px;line-height:150%;">                
                Esperamos puedas verificar tu asistencia dando clic en la opción correspondiente.
                <br>
                Saludos
            </p>
        </td>
        </tr>
        <tr>
            <td style="padding: 40px;text-align: center;    border-radius: 20px;">
                <a href="http://www.madrugaytors.com" style="text-decoration: none;"><span style="font-size: 25px; color: #00aeef;">madrugaytors</span></a>
            </td>

        </tr>
    </table>
       
</body>
</html>