# Phine
**Work in progress - please keep in mind that until v1.0 phine is not fully operational**

Phine aims to be a lightweight PHP framework which is between a complex Laravel and a full CMS like Wordpress. It can bootstrap into a complete CMS, but if you don't want or need it, you can use every single procedure by your own to compose your webplication like you need it.

Phine is just an object that provides you every functionality you need. It is designed to not to interrupt you in your coding process if you don't want it. You even don't need to use the Phine object itself, instead you can use most of the classes and traits without the context of Phine.

So yey, it is PHP but it is fine = Phine

## Phine: Core
The core of the object is split into different traits with own puposes:
* **Core\Config\Config** - Provides all config variables
* **Core\Config\Defaults** - Collection of default config variables
* **Core\Phinterfaces\Phinterface** - Manages getter and setter of Phine to all it sub routines
* **Core\Assets** - Resources are called "Assets", for example CSS files, favicon, etc.. Assets trait is a central manager for those resources
* **Core\Blueprints** - 
* **Core\Bootstrap** - Some predefined bootstrap processes to get a CMS or other functionalities
* **Core\Cache** - 
* **Core\Debug** - Some debug functionalities
* **Core\Error** - 
* **Core\Handlers** - Manager for handlers
* **Core\Incidents** - log routine, central management for log entries
* **Core\Init** - Some traits needs an initialization process before you can use it. The init trait initializes everything that is needed at construction of Phine
* **Core\Installer** - 
* **Core\L10N** - Manages localization files and settings
* **Core\Libraries** - Manager for default and dynamic libraries
* **Core\Module** - 
* **Core\Output** - 
* **Core\Rights** - 
* **Core\Route** - Extracts route, endpoint, modus operandi and other variables from a given request
* **Core\Site** - Manages everything Phine needs to build the actual requested route
* **Core\Sitemap** - 
* **Core\Template** - 
* **Core\User** - 

## Phinterface
From outside or while you developing modules for Phine, you often interact with the getter and setter of the Phine instance itself.

## Handlers
* Handlers\Autoloader
* Handlers\Client
* Handlers\Cookies
* Handlers\ENV
* Handlers\Get
* Handlers\HTTP
* Handlers\Post
* Handlers\Server
* Handlers\Session
* Handlers\Uploads

## Libraries
* Libraries\CSS\CSS
* Libraries\HTML\HTML
* Libraries\SVG\SVG
* Libraries\Validations
* Libraries\CSV
* Libraries\Database
* Libraries\Directories
* Libraries\EMail
* Libraries\Files
* Libraries\Phar
* Libraries\Zip

## Blueprints
... comes with v0.4
