
  <?php
  //check if form is submitted
  if (isset($_POST['submit'])) {
    // ftp settings
    $ftp_hostname = '127.0.0.1';
    $ftp_username = 'admin';
    $ftp_password = '12345';
    $remote_dir = '/';
    $src_file = $_FILES['srcfile']['name'];

    //subir archivo
    if ($src_file != '') {
      // remote file path
      $dst_file = $remote_dir . $src_file;

      // connect ftp
      $ftpcon = ftp_connect($ftp_hostname) or die('Error connecting to ftp server...');

      // ftp login
      $ftplogin = ftp_login($ftpcon, $ftp_username, $ftp_password);

      // ftp upload
      if (ftp_put($ftpcon, $dst_file, $_FILES['srcfile']['tmp_name'], FTP_ASCII))
        echo 'El archivo se subio satisfactoriamente!';
      else
        echo 'Error al subir el archivo.';

      // close ftp stream
      ftp_close($ftpcon);
    } else
      header('Location: index.php');
  }
  ?>