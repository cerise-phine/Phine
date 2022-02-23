<?php
namespace Handlers;

class Session
{
    # 1 Variables and constants
    private         $Session                        = null;

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct()#: void
    {
        $this->initSession();
    }
    
    # 2.2 __get
    final public function __get($Var)#: mixed
    {
        return $this->getSession($Var);
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): ?string
    {
        $this->setSession($Var, $Value);
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $DebugOutput                                = $this->Session;
        
        return $DebugOutput;
    }
    
    # 2.5 getSession
    public function getSession($Var)#: mixed
    {
        if(isset($this->Session[$Var]) && isset($_SESSION[$Var]))
        {
            return $this->Session[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.6 setSession
    public function setSession($Var, $Value): void
    {
        $this->Session[$Var]                        = $Value;
        $_SESSION[$Var]                             = $Value;
    }
    
    # 2.7 delSession
    public function delSession($Var): void
    {
        if($Var === 'all')
        {
            $this->Session                          = null;
        }
        else
        {
            if(isset($this->Session[$Var]))
            {
                $this->Session[$Var]                = null;
            }

            if(isset($_SESSION[$Var]))
            {
                $_SESSION[$Var]                     = null;
            }
        }
    }
    
    # 3 Private methods
    # 3.1 initSession
    private function initSession(): void
    {
        session_start();
        
        if($_SESSION !== null && count($_SESSION) > 0)
        {
            $this->Session                          = $_SESSION;
        }
    }
}