<?php
  //confirmacion del sumit
  if (isset($_POST['submit'])) {
    // ftp settings
    $ftp_hostname = '127.0.0.1';
    $ftp_username = 'admin';
    $ftp_password = '12345';
    $remote_dir = '/';
    $src_file = $_FILES['srcfile']['name'];

    //subir archivo
    if ($src_file != '') {
      // ruta del servidor
      $dst_file = $remote_dir . $src_file;

      // connect ftp
      $ftpcon = ftp_ssl_connect($ftp_hostname) or die('Error al conectar al servidor...');

      // ftp login
      $ftplogin = ftp_login($ftpcon, $ftp_username, $ftp_password);

      // ftp upload
      if (ftp_put($ftpcon, $dst_file, $_FILES['srcfile']['tmp_name'], FTP_BINARY))
        echo 'El archivo se subio satisfactoriamente!';
      else
        echo 'Error al subir el archivo.';

      // cerrando la conexcion ftp
      ftp_close($ftpcon);
    } else
      header('Location: index.php');
  }
  ?>