<?php

$relay = $_GET['ID'];
$setto = $_GET['setto'];
if(isset($relay) && isset($setto)) {
exec("sudo python /home/pi/relay/toggle.py ".$relay." ".$setto);
}
if(isset($_GET['GUI'])) {
exec("sudo pkill python");
exec("/home/pi/GUI/autostart.sh");
}

/*
if (isset($_POST['0-an']))
{
exec("sudo python /home/pi/relay/toggle.py 0 an");
}
if (isset($_POST['0-aus']))
{
exec("sudo python /home/pi/relay/toggle.py 0 aus");
}

if (isset($_POST['1-an']))
{
exec("sudo python /home/pi/relay/toggle.py 1 an");
}
if (isset($_POST['1-aus']))
{
exec("sudo python /home/pi/relay/toggle.py 1 aus");
}

if (isset($_POST['2-an']))
{
exec("sudo python /home/pi/relay/toggle.py 2 an");
}
if (isset($_POST['2-aus']))
{
exec("sudo python /home/pi/relay/toggle.py 2 aus");
}

if (isset($_POST['3-an']))
{
exec("sudo python /home/pi/relay/toggle.py 3 an");
}
if (isset($_POST['3-aus']))
{
exec("sudo python /home/pi/relay/toggle.py 3 aus");
}

if (isset($_POST['4-an']))
{
exec("sudo python /home/pi/relay/toggle.py 4 an");
}
if (isset($_POST['4-aus']))
{
exec("sudo python /home/pi/relay/toggle.py 4 aus");
}

if (isset($_POST['alle-an']))
{
exec("sudo python /home/pi/relay/toggle.py alle an");
}
if (isset($_POST['alle-aus']))
{
exec("sudo python /home/pi/relay/toggle.py alle aus");
}*

?>
