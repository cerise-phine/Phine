<?php
class Phine extends Core\Config\Constants
{
    # 1 Traits
    use Core\Config\Config;
    use Core\Phinterfaces\Phinterface;
    use Core\Assets;
    use Core\Blueprints;
    use Core\Bootstrap;
    use Core\Cache;
    use Core\Debug;
    use Core\Handlers;
    use Core\Error;
    use Core\Incidents;
    use Core\Init;
    use Core\Installer;
    use Core\L10N;
    use Core\Libraries;
    use Core\Module;
    use Core\Output;
    use Core\Rights;
    use Core\Route;
    use Core\Site;
    use Core\Sitemap;
    use Core\Template;
    use Core\User;
    
    # 2 Variables and constants
    private static  $Phinstance                     = null;
    private static  $PhinstanceHash                 = null;
    private static  $DebugMode                      = false;

    # 3 Magic methods
    # 3.1 __construct
    final public function __construct($fromStatic = false)#: void
    {
        if($fromStatic === self::$PhinstanceHash)
        {
            $this->initPhine();
            $this->setIncident('x104001');
        }
        else
        {
            throw new Exception('Instancing only allowed through static Phinstance()');
        }
    }
    
    # 3.2 __clone
    final public function __clone()#: void
    {
        throw new Exception('Cloning of Phine is not allowed');
    }
    
    # 3.3 __wakeup
    final public function __wakeup()#: void
    {
        throw new Exception('Wakeup of Phine is not allowed');
    }
    
    # 3.4 __get
    final public function __get($Phinterface)#: mixed
    {
        if($this->Phinterface($Phinterface) === true)
        {
            return $this->getPhinterface($Phinterface);
        }
        else
        {
            return null;
        }
    }
    
    # 3.5 __set
    final public function __set($Phinterface, $Value): void
    {
        if($this->Phinterface($Phinterface, true) === true)
        {
            $this->setPhinterface($Phinterface, $Value);
        }
    }
    
    # 3.6 __debugInfo
    final public function __debugInfo(): ?array
    {
        if(self::$DebugMode === true) {
            return $this->PhineInfo();
        }
        else
        {
            return null;
        }
    }

    # 4 Public methods
    # 4.1 Phinstance
    final public static function Phinstance($Debug = false): self
    {
        if(is_null(self::$Phinstance))
        {
            if($Debug === true)
            {
                self::$DebugMode                    = true;
            }
            
            self::$PhinstanceHash                   = md5(microtime());
            self::$Phinstance                       = new self(self::$PhinstanceHash);
        }
        
        return static::$Phinstance;
    }
}