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
        if(isset($this->Session[$Var]) && isset($_SESSION[$Var]))
        {
            return $this->Session[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): void
    {
        $this->Session[$Var]                        = $Value;
        $_SESSION[$Var]                             = $Value;
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $DebugOutput                                = $this->Session;
        
        return $DebugOutput;
    }
    
    # 3 Public methods
    # 3.1 unset
    public function unset($Var): void
    {
        if($Var === 'all')
        {
            $this->Session                          = null;
            unset($_SESSION);
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