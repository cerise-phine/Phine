# Phine
**Work in progress - please keep in mind that until v1.0 Phine is not fully operational**

Phine aims to be a lightweight PHP framework which is between a complex Laravel and a full CMS like Wordpress. It can bootstrap into a complete CMS, but if you don't want or need it, you can use every single procedure by your own to compose your webplication like you need it.

Phine is just an object that provides you every functionality you need. It is designed to not to interrupt you in your coding process if you don't want it. You even don't need to use the Phine object itself, instead you can use most of the classes and traits without the context of Phine.

So yey, it is PHP but it is fine = Phine

## Phinterface
From outside or while you developing modules for Phine, you often interact with the getter and setter of the Phine instance itself.

### Phine / Phinterface
* $Phine->**Phinterface** - Returns array with all phinterfaces

* **$Phine** - Returns debug output with information about classes / traits
* $Phine->**Debug** - Returns complete debug output
* $Phine->**DebugMode** - Returns bool debug mode var
* $Phine->**DebugConstants** - Returns array with all Phine constants

### Configurations
* $Phine->**Config** - Returns array with complete actual system configuration
* $Phine->**ConfigSystem** - Returns all actual system configurations
* $Phine->**ConfigRepositories** - Returns all actual used repositories
* $Phine->**ConfigSecurity** - Returns all actual security configurations
* $Phine->**ConfigCache** - Returns all actual cache configurations
* $Phine->**ConfigDatabase** - Returns all actual database configurations
* $Phine->**ConfigEMail** - Returns all actual email configurations
* $Phine->**ConfigDefaults** - Returns all config defaults

* $Phine->**DebugConfig** - Debug output for configurations

### Assets
* $Phine->**AssetsCSS** - Returns array with all actual CSS assets
* $Phine->**AssetsFonts** - Returns array with all actual fonts
* $Phine->**AssetsJavaScript** - Returns array with all actual JavaScript assets

* $Phine->**DebugAssets** - Debug output for assets

### Blueprints
* $Phine->**Blueprints** - Returns object of blueprints loader

* $Phine->**DebugBlueprints** - Debug output for blueprints

### Bootstrap
* $Phine->**BootstrapHTML** - Starts bootstrap process for HTML standard output
* $Phine->**BootstrapAJAX** - Starts bootstrap process for AJAX output
* $Phine->**BootstrapAPI** - Starts bootstrap process for API output
* $Phine->**BootstrapCLI** - Starts bootstrap process for CLI output

* $Phine->**DebugBootstrap** - Debug output for bootstrap

### Cache
* $Phine->**DebugCache** - Debug output for cache

### Handlers
* $Phine->**Client**
* $Phine->**Cookies** - Returns object of cookie manager
* $Phine->**Data**
* $Phine->**ENV**
* $Phine->**Get** - Returns object of get manager
* $Phine->**HTTP** - Returns object for HTTP manager
* $Phine->**Post** - Returns object for post manager
* $Phine->**Server**
* $Phine->**Session** -  Returns object for session manager
* $Phine->**Uploads**

* $Phine->**Handlers** - Returns information about handlers
* $Phine->**DebugHandlers** - Debug output for Handlers

### Error
* $Phine->**DebugError** - Debug output for error

### Incidents
* $Phine->**Incidents** - Returns array with all incidents
* $Phine->**IncidentTypes** - Returns array with list of all incident types
* $Phine->**Log** - Alias for $Phine->Incidents
* $Phine->**LogTypes** - Alias for $Phine->IncidentTypes
* $Phine->**LogCritical** - Returns all incidents of type "critical"
* $Phine->**LogError** - Returns all incidents of type "error"
* $Phine->**LogWarning** - Returns all incidents of type "warning"
* $Phine->**LogNotice** - Returns all incidents of type "notice"

* $Phine->**DebugIncidents** - Debug output for incidents

### Installer
* $Phine->**DebugInstaller** - Debug output for installer

### L10n
* $Phine->**L10N** - Same as debug output
* $Phine->**Language** - Returns actual language code

* $Phine->**DebugL10N** - Debug output for L10N

### Libraries
* $Phine->**CSS** - Returns object of CSS generator
* $Phine->**HTML** - Returns object of HTML generator
* $Phine->**JavaScript** - Returns object of JavaScript generator
* $Phine->**Validations** - Returns object of validations helper
* $Phine->**CSV**
* $Phine->**Database**
* $Phine->**Directories**
* $Phine->**EMail**
* $Phine->**Files**

* $Phine->**Libs** - Alias for $Phine->Libraries
* $Phine->**Libraries** - Same as debug output
* $Phine->**DebugLibraries** - Debug output for libraries

### Modules
* $Phine->**DebugModule** - Debug output for module

### Output
* $Phine->**Output** - Print output with auto detect for modus operandi
* $Phine->**OutputAuto** - Alias for $Phine->Output
* $Phine->**OutputHTML** - Print HTML output
* $Phine->**OutputAJAX** - Print AJAX output
* $Phine->**OutputAPI** - Print API output
* $Phine->**OutputCLI** - Print CLI output

* $Phine->**DebugOutput** - Debug output for output

### Rights
* $Phine->**DebugRights** - Debug output for rights

### Route
* $Phine->**RequestString** - Returns string of the complete get request
* $Phine->**RouteString** - Returns the route as a string
* $Phine->**Route** - Returns an array with a tree of actual route
* $Phine->**Endpoint** - Returns string of the actual endpoint
* $Phine->**ModusOperandi** - Returns string with actual modus operandi
* $Phine->**ModOp** - Alias for $Phine->ModusOperandi

* $Phine->**DebugRoute** - Debug output for route

### Site
* $Phine->**Site** - Returns array with settings of actual site
* $Phine->**SiteMeta** - Returns array with all meta tags of actual site
* $Phine->**SiteAssets** - Returns array with all assets of actual site

* $Phine->**DebugSite** - Debug output for site

### Sitemap
* $Phine->**Sitemap** - tbd

* $Phine->**DebugSitemap** - Debug output for sitemap

### Template
* $Phine->**DebugTemplate** - Debug output for template

### User
* $Phine->**DebugUser** - Debug output for user

## Phine: Core
The core of the object is split into different traits with own purposes:
* **Core\Config\Config** - Provides all config variables
* **Core\Config\Defaults** - Collection of default config variables
* **Core\Phinterfaces\Phinterface** - Manages getter and setter of Phine to all it sub routines
* **Core\Assets** - Resources are called "Assets", for example CSS files, favicon, etc.. Assets trait is a central manager for those resources
* **Core\Blueprints** - Generates HTML/CSS from blueprints
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
* **Core\Output** - Generates an output
* **Core\Rights** - 
* **Core\Route** - Extracts route, endpoint, modus operandi and other variables from a given request
* **Core\Site** - Manages everything Phine needs to build the actual requested route
* **Core\Sitemap** - 
* **Core\Template** - 
* **Core\User** - 

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

## Misc
* Sometimes I code live on twitch. You're invited to participate, send your feedbacks or thoughts or just cowork and chill together :) https://www.twitch.tv/cerise_phine
