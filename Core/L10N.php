<?php
namespace Core;

trait L10N
{
    # 1 Constants and variables
    private         $Language                       = null;
    private         $L10N                           = null;
    
    # 2 Public Methods
    # 2.1 L10N
    public function L10N($Var = false)
    {
        switch($Var)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'Language'                      => $this->Language,
                    'L10N'                          => $this->L10N
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'Language'                      => array('L10N', 'Language'),
                    'L10N'                          => array('L10N', 'L10N'),
                    'DebugL10N'                     => array('L10N', 'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            case 'Language':
                return $this->Language;
                
            default:
                if(is_object($this->L10N))
                {
                    return call_user_func_array(array($this->L10N,'L10N'), array($Var));
                }
                else
                {
                    return $this->L10N;
                }
        }
        
        return null;
    }
    
    # 3 Private methods
    # 3.1 initL10N
    private function initL10N(): bool
    {
        if(is_null($this->L10N))
        {
            # 2.1.1 Set default language from config
            $this->Language                         = $this->Config->System->Language;

            # 2.1.2 Overwrite defaults from user settings


            # 2.1.3 Overwrite defaults from user session
            
            $L10NClass                              = self::NAMESPACE_PHINTERFACES . 'L10N';
            $this->L10N                             = new $L10NClass($this->Language, self::$DebugMode);
            
            return true;
        }
        else
        {
            return false;
        }
    }
}