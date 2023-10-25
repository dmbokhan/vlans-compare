# vlans-compare
**vlans-compare** - A LibreNMS plugin package that shows the difference between lists of vlans on devices or ports.

## Installation
Go to the LibreNMS root directory and run the following command as the librenms user.

    ./lnms plugin:add dmbokhan/vlans-compare
    php artisan vendor:publish  # and choose Dmbokhan\VlansCompare\Providers\VlansCompareServiceProvider
    php artisan route:clear

## Usage
Head to the web browser and go to **Overview** - **Plugins** - **Vlans Compare**. There are multiple-option select fields where you can choose your devices or ports (using Ctrl + Click) to see differences between their vlans on the plugin page.

![image1](https://i.imgur.com/i8vluto.png)

![image2](https://i.imgur.com/FemzJIO.png)
