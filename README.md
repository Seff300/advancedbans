Simple and sleek website panel for AdvancedBan.
* A demo can be found [here](https://karistused.seffcraft.eu/demo/).

## Features
* Self-hosted
* Supports the latest AdvancedBan version
* Easy to Setup
* Themes
  * Beautiful default and contributor themes
  * Create custom themes
  * User theme selection
* Languages
  * Default contributor languages
  * Create custom languages
  * User language selection
* Punishments
  * Search
    * Search punishment status
    * Search punishment type
    * Search punishment through input for name, reason and operator
    * Mix and match multiple queries during each search
* Players
  * Updated in a 5 second interval
  * Configure the server host address and port
  * Optional query for older servers
  * Enable or disable
* Navigation
  * Configure custom support link
  * Configure custom appeal link
  * Enable or disable one or both
* Supports private pages
  * This means that you can make your bans website only accessible by your staff team with a password
![Private page form](https://i.imgur.com/CMXkBd7.png)

## Requirements
* PHP v7.2.8 recommended
* mysqlnd PHP module
* nd_mysqli PHP module
* Apache mod_rewrite (optional, can be enabled)

## Installation
Clone `advancedbans` to your web server. Then open the website and configure the website to your liking.
![Setup form](https://i.imgur.com/fvfVNqd.png)
Database configuration is also done thru the same setup form.

## How to reconfigure/redo the setup
If you messed up during the setup or need to change some things then you can navigate to `static/configuration.json` in the folder where you ban website is located and open the file `configuration.json`. In there you will find different options which you can change but if you prefer to make the changes on the setup form itself then change setup completed to false
```json
"setup": {
    "completed": false
```

If you would like to change your database changes then you can open the `database.php` file in the folder `static/`.
The database file looks like this (The values may be different for you):
```php
<?php

define("DATABASE_HOST", "host");
define("DATABASE_USER", "user");
define("DATABASE_PASSWORD", "password");
define("DATABASE_DATABASE", "database");
``` 
You can also change the database settings thru the website setup form by setting setup completed to false in the configuration file located at `static/configuration.json`. But keep in mind that this will then require you to redo the whole setup form.
It is recommended to keep the version set to `stable` as changing this to `legacy` or `beta` may cause some issues.

## Default configuration file
```json
{
    "version": "stable",
    "mod_rewrite": false,
    "default": {
        "theme": "photon",
        "language": "en-US"
    },
    "language": {
        "title": "AdvancedBans",
        "description": "Simple and sleek punishment panel for AdvancedBan."
    },
    "player_count": {
        "enabled": true,
		"query": false,
        "host": "mc.hypixel.net",
		"port": "25565"
    },
    "navigation": {
        "contact": {
            "enabled": false,
            "link": "http://example.com/contact"
        },
        "appeal": {
            "enabled": false,
            "link": "http://example.com/appeal"
        }
    },
    "private_page": {
        "enabled": false,
        "password": "default"
    },
    "setup": {
        "completed": true
    }
}
```

## Languages
Translating Advancedban Panel is simple. Languages are located in `static\languages` and all language files follow a simple format. To translate Advancedban Panel for yourself, create a new file for your language. For example, `en-US.json` is used for the English language used in the United States. Then, use the following template to make your translations.
```json
{
	"language": "English",
	"collection": {
		"punishments": "Punishments",
		"support": "Support",
		"contact": "Contact",
		"appeal": "Appeal",
		"credit": "Credit",
		"themes": "Themes",
		"default": "Default",
		"languages": "Languages",
		"players": "Players",
		"search": "Search",
		"copy": "Copy",
		"copied": "Copied",
		"inactive": "Inactive",
		"active": "Active",
		"first": "First",
		"previous": "Previous",
		"next": "Next",
		"last": "Last",
		"name": "Name",
		"reason": "Reason",
		"operator": "Operator",
		"date": "Date",
		"expires": "Expires",
		"type": "Type",
		"status": "Status",
		"ban": "Ban",
		"temp_ban": "Temp. Ban",
		"ip_ban": "I.P. Ban",
		"mute": "Mute",
		"temp_mute": "Temp. Mute",
		"warning": "Warning",
		"temp_warning": "Temp. Warning",
		"kick": "Kick",
		"error_no_punishments": "No punishments could be listed on this page",
		"error_not_evaluated": "N/A"
	}
}
```
Consider translating AdvancedBans into a language you are fluent in. Create a pull request and I will merge the language into the master branch.

## Themes
Like translating AdvancedBans, theming AdvancedBans is also simple. However, AdvancedBans will always load the core files for Bootstrap and will follow a Bootstrap HTML structure. Themes are stored in `static\themes` and the following is an example of the file structure for a theme.
```
themes /
\ - photon /
    | - css /
        \ - photon.css
    | - img
    | - js
    \ - configuration.json
```
Static stylesheets and scripts should be placed in the appropriate `css` and `js` folders. As noted before, AdvancedBans will always load core Bootstrap files and jQuery before custom theme stylesheets and scripts.

The `configuration.json` file for your theme should follow this template.
```json
{
	"theme": "Photon",
	"creator": "mathhulk"
}
```

## Icons
To change the icons for AdvancedBans, replace the icon files located in `static\resources\images` and `static\resources\images\icons` and the `favicon.ico` file using a tool like https://www.favicon-generator.org.

## Credit
The author of AdvancedBan is Leoko. Find AdvancedBan on [SpigotMC](https://www.spigotmc.org/resources/advancedban.8695/).
