<?php
    require_once __DIR__ . "/includes/proteger.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yesenia Michelle Chuc Kuyoc">
        <title> Galeria </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        
        <?php require_once __DIR__ . "/includes/encabezado.php"; ?>

        <main>
            <h1> Galeria de imágenes, videos y audios</h1> 
            <table>
                <thead>
                    <tr>
                    <th colspan="3">Redes sociales de mis amigos</th>
                    </tr>  
                </thead>  
                <tbody>
                    <tr>
                        <td rowspan="2">Hombres</td>
                        <td>Foto: 
                            <br><img src="media/Gas-Face.jpg" alt="Gaspar" width="200" height="150">
                            <br>Nombre: Gaspar Gijon
                            <br>Edad: 21 años
                            <br>Red social: <a href="https://www.facebook.com/share/1BrwcL4sHv/">Gaspar Gijon</a>
                        </td>
                        <td>Foto: 
                            <br><img src="media/geo-inst.jpg" alt="Geo" width="200" height="150">
                            <br>Nombre: Geo Rosado
                            <br>Edad: 21 años
                            <br>Red social: <a href="https://www.instagram.com/geo.rzzz?igsi=dTVtZWtvb2sybHRz">geo.rzzz</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Foto:
                            <br><img src="media/will-insta.jpg" alt="William" width="200" height="150">
                            <br>Nombre: Willian Caamal
                            <br>Edad: 19 años
                            <br>Red social: <a href="https://www.instagram.com/n3l224?utm_source=ig_web_button_share_sheet&igsi=ZDNlZDc0MzIxNw==">n3l224</a>
                        </td>
                        <td>Foto
                            <br><img src="media/manu-insta.jpg" alt="Juan" width="200" height="150">
                            <br>Nombre: Juan Chuc
                            <br>Edad: 22 años
                            <br>Red social: <a href="https://www.instagram.com/manucdz_5?igsi=MWd4eXo2bHE0ZThnYw==">manucdz_5</a>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2">Mujeres</td>
                        <td>Foto: 
                            <br><img src="media/ale-tick.jpeg" alt="Val" width="200" height="150">
                            <br>Nombre: Valeria Alamilla
                            <br>Edad: 20 años
                            <br>Red social: <a href="https://www.tiktok.com/@jm12098?is_from_webapp=1&sender_device=pc">@jm12098</a>
                        </td>
                        <td>Foto: 
                            <br><img src="media/di-tick.jpeg" alt="Diana" width="200" height="150">
                            <br>Nombre: Diana Díaz
                            <br>Edad: 18 años
                            <br>Red social: <a href="https://www.tiktok.com/@dk.alamiyth?is_from_webapp=1&sender_device=pc">@dk.alamiyth</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Foto: 
                            <br><img src="media/nad-tick.jpeg" alt="Nadia" width="200" height="150">
                            <br>Nombre: Jacqueline Chuc
                            <br>Edad: 23 años
                            <br>Red social: <a href="https://www.tiktok.com/@nadiack20?is_from_webapp=1&sender_device=pc">@nadiack20</a>
                        </td>
                        <td>Foto: 
                            <br><img src="media/Al-tick.jpeg" alt="Alli" width="200" height="150">
                            <br>Nombre:Scarleth Kuyoc
                            <br>Edad: 18 años
                            <br>Red social: <a href="https://www.tiktok.com/@allif_2607?is_from_webapp=1&sender_device=pc">@allif_2607</a>

                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Lunes 24 de agosto de 2026</td>
                    </tr>
                </tfoot>
            </table> 

            <h2>Videos y audios</h2>
            <video controls width="250" height="200">
                <source src="media/universo.mp4" type="video/mp4">
            </video>
        
            <p><a href="https://www.youtube.com/watch?v=AN5yF2EkFFg" target="_blank" rel="noopener noreferrer">Ver video en YouTube</a></p>
            
            <audio controls>
                <source src="media/furelise.mp3" type="audio/mpeg">
            </audio>
        </main>

        <footer>
            <p>Autor: Yesenia Michelle Chuc Kuyoc</p>
            <p>Tizimín, Yucatán, Septiembre, 2026.</p>
        </footer>
    </body>
</html>