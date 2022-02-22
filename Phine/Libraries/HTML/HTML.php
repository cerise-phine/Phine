<?php
namespace Libraries\HTML;

class HTML extends TagGenerator
{
    # 1 Traits
    use Forms;
    use Links;
    use Lists;
    use Meta;
    use PhineGUI;
    use Tables;
    
    # 2 Variables and constants
    private         $Debug                          = null;
    private         $DocType                        = '<!DOCTYPE html>';
    private         $Break                          = '';
    private         $Tab                            = '';

    # 3 Magic methods
    # 3.1 __construct
    final public function __construct($Debug = false)
    {
        $this->setDebug($Debug);
    }
    
    # 3.2 __get
    final public function __get($Var): ?string
    {
        switch($Var)
        {
            case 'Break';
                return $this->Break;
                
            case 'Tab':
                return $this->Tab;
            
            case 'DocType';
                return $this->DocType;
                
            default:
                return false;
        }
    }
    
    # 3.3 __set
    final public function __set($Var, $Value)
    {
        switch($Var)
        {
            case 'SiteTitle':
                $this->SiteTitle                = $Value;
                break;
               
            case 'Language':
                $this->Language                 = $Value;
                break;
                
            case 'CharSet':
                $this->CharSet                  = $Value;
                break;
        }
    }
    
    # 3.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $DebugOutput                                = null;
        
        if($this->Debug === true)
        {
            $DebugOutput['Debug']                   = $this->Debug;
            $DebugOutput['DocType']                 = htmlentities($this->DocType);
            $DebugOutput['Break']                   = $this->Break;
            $DebugOutput['Tab']                     = $this->Tab;
            $DebugOutput['Meta']                    = $this->Meta;
            $DebugOutput['Generator']               = $this->Generator();
        }
        
        return $DebugOutput;
    }
    
    # 4 Public methods
    # 4.1 Tab
    public function Tab($Count = 1): ?string
    {
        $Tab                                        = '';
        
        for($i = 1; $i <= $Count; $i++)
        {
            $Tab                                    .= $this->Tab;
        }
        
        return $Tab;
    }
    
    # 4.2 Break
    public function Break($Count = 1): ?string
    {
        $Break                                      = '';
        
        for($i = 1; $i <= $Count; $i++)
        {
            $Break                                  .= $this->Break;
        }
        
        return $Break;
    }
    
    # 5 Private methods
    # 5.1 setDebug
    private function setDebug($Debug): void
    {
        if(($Debug === true))
        {
            $this->Debug                            = true;
            $this->Break                            = "\r\n";
            $this->Tab                              = "\t";
        }
    }
}