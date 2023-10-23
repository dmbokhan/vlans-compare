# vlans-compare
**vlans-compare** - A LibreNMS plugin package that shows the difference between lists of vlans on devices or ports.

## Installation
Go to the LibreNMS root directory and run the following command as the librenms user.

    ./lnms plugin:add dmbokhan/vlans-compare
    php artisan route:clear

## Usage
Head to the web browser and go to **Overview** - **Plugins** - **Vlans Compare**. There are multiple-option select fields where you can choose your devices or ports (using Ctrl + Click) to see differences between their vlans on the plugin page.

![alt](https://s511vla.storage.yandex.net/rdisk/ea0056eed0088cad4a21104a4234948131cfea388d1e35314410f0dadb436aba/6536cb8e/gptk4fGq_47DSTD6mfRZIra_KMGiYYHQuybDxOwTTwyYlcXD0V_MDT0HWoNBbZV9TnyWQXMGhBeAfYy3B7EUPQ==?uid=0&filename=vlans-compare-1.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=0&fsize=35807&hid=e907b955685b1f3cb0a98fe5bc9ef680&media_type=image&tknv=v2&etag=8feb12e10012bc2b40ab8264ddfeee42&rtoken=CCzUOyPgIRDZ&force_default=no&ycrid=na-e5a0a8bbaedd1aa49c45a63efbd7d1ba-downloader24f&ts=608675b7f7f80&s=4c87c24dc285e34eed616cb0465e3071055ac88841178800bdd8b5eb0cf013ff&pb=U2FsdGVkX1_xYpInNvZBhI2SUONDg55rwFc21SW2Oc_6dgZbKvIXpwjskgPX0DxVbkr_wXp1gkp-yBLwKOxTP9GQwwbdwyWmzpRjOEGDZDE)

![alt](https://s242vlx.storage.yandex.net/rdisk/fcc8f05da5bfa8cf0d728d262a6771d5e257a18cf994be4cf1ea928bde164e7a/6536cb8e/gptk4fGq_47DSTD6mfRZIpKlRXV8P5zDa3-DVgc6byhO16xq8yoIxt_9i1j7mNad4m7m-8vtycPx8_0s9qMDRg==?uid=0&filename=vlans-compare-2.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=0&fsize=62543&hid=cca05fdb13525095237acf3560a864f5&media_type=image&tknv=v2&etag=899604daf086031d4a9e5bf43b10381c&rtoken=Nb9lTumRH6Pd&force_default=no&ycrid=na-3fec54a1455b4394fde38e8c2c35ec50-downloader20h&ts=608675b7f7f80&s=51dfc015d35e9395aa659e968e248f4a3eb3e51f74a69fa14e6865a480084d61&pb=U2FsdGVkX18eu1Keh-5aaLTRb-25-Z4xBSZ8Pq7wC1ELOmBtGvDiLhEjQVh_BEd4X-dDdnG_IBcj0EtFP54DWFZoVkesMHJTTeDRM_f_lPs)
