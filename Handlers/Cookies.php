<?php
namespace Handlers;

class Cookies extends \Core\Config\Constants
{
    # 1 Traits
    use \Core\Config\Defaults;
    
    # 2 Variables and constants
    private         $Cookies                        = null;
    
    # 3 Magic Methods
    # 3.1 __construct
    final public function __construct()#: void
    {
        $this->initCookies();
    }
   
    # 3.2 __get
    final public function __get($Var)#: mixed
    {
        if(isset($this->Cookies[$Var]) && isset($_COOKIE[$Var]))
        {
            return $this->Cookies[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 3.3 __set
    final public function __set($Var, $Value): void
    {
        $this->set($Var, $Value);
    }
    
    # 3.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $DebugOutput                                = $this->Cookies;
        
        return $DebugOutput;
    }
    
    # 4 Public Methods
    # 4.1 set
    public function set($Var, $Value, $Lifetime = false): void
    {
        if(!empty($Var) && !empty($Value))
        {
            $this->Cookies[$Var]                    = $Value;
            
            if($Lifetime !== false && is_int($Lifetime))
            {
                $useLifetime                        = $Lifetime;
            }
            else
            {
                $useLifetime                        = $this->DefaultConfig['System']['CookieLifetime'];
            }
            
            setcookie($Var, $Value, time() + $useLifetime);
        }
    }
    
    # 4.2 unset
    public function unset($Var): void
    {
        if($Var === 'all' && is_array($this->Cookies))
        {
            foreach($this->Cookies AS $CookieVar => $CookieValue)
            {
                if($CookieVar === 'PHPSESSID')
                {
                    continue;
                }
                
                $this->Cookies[$CookieVar]          = null;
                setcookie($CookieVar, null, time() - 10000);
            }
        }
        else
        {
            if(isset($this->Cookies[$Var]))
            {
                $this->Cookies[$Var]                = null;
            }

            if(filter_input(INPUT_COOKIE, $Var))
            {
                setcookie($Var, null, time() - 10000);
            }
        }
    }
    
    # 5 Private Methods
    # 5.1 initCookies
    private function initCookies(): void
    {
        $this->Cookies                              = filter_input_array(INPUT_COOKIE);
    }
}