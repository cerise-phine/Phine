<?php
namespace Core\Config;

trait Config
{
    # 1 Traits
    use Defaults;
    
    # 2 Constants and variables
    private         $ConfigSystem                   = null;
    private         $ConfigRepositories             = null;
    private         $ConfigSecurity                 = null;
    private         $ConfigCache                    = null;
    private         $ConfigDatabase                 = null;
    private         $ConfigEMail                    = null;

    # 3 Magic Methods
    # 3.1 __get method
    public function Config($Var = false): ?array
    {
        switch($Var)
        {
            case 'Phinterface':
                return array
                (
                    'Config'                        => array('Config', 'all'),
                    'ConfigSystem'                  => array('Config', 'System'),
                    'ConfigRepositories'            => array('Config', 'Repositories'),
                    'ConfigSecurity'                => array('Config', 'Security'),
                    'ConfigCache'                   => array('Config', 'Cache'),
                    'ConfigDatabase'                => array('Config', 'Database'),
                    'ConfigEMail'                   => array('Config', 'EMail'),
                    'ConfigDefaults'                => array('Config', 'Defaults'),
                    'DebugConfig'                   => array('Config', 'Debug'),
                );

            case 'Debug':
                return array
                (
                    'init'                          => (!is_null($this->Config) ? true : false),
                    'Defaults'                      => array(
                        'Config'                        => $this->DefaultConfig,
                        'Sites'                         => $this->DefaultSites,
                        'Meta'                          => $this->DefaultMeta,
                        'Modules'                       => $this->DefaultModules,
                        'Handlers'                      => $this->DefaultHandlers,
                        'Libraries'                     => $this->DefaultLibraries
                    ),
                    'Config'                        => (self::$DebugMode === true ? $this->Config : null)
                );

            case 'Incidents':
                return array(
                    array('Debug',                  'x201001')
                );
                
            case 'System':
                return (is_array($this->ConfigSystem) ? $this->ConfigSystem : null);
                
            case 'Repositories':
                return (is_array($this->ConfigRepositories) ? $this->ConfigRepositories : null);
                
            case 'Security':
                return (is_array($this->ConfigSecurity) ? $this->ConfigSecurity : null);
                
            case 'Cache':
                return (is_array($this->ConfigCache) ? $this->ConfigCache : null);

            case 'Database':
                return (is_array($this->ConfigDatabase) ? $this->ConfigDatabase : null);

            case 'EMail':
                return (is_array($this->ConfigEMail) ? $this->ConfigEMail : null);

            case 'all':
                return array(
                    'System'                        => $this->ConfigSystem,
                    'Repositories'                  => $this->ConfigRepositories,
                    'Security'                      => $this->ConfigSecurity,
                    'Cache'                         => $this->ConfigCache,
                    'Database'                      => $this->ConfigDatabase,
                    'EMail'                         => $this->ConfigEMail
                );

            case 'Defaults':
                return array
                (
                    'Config'                        => $this->DefaultConfig,
                    'Meta'                          => $this->DefaultMeta,
                    'Sites'                         => $this->DefaultSites,
                    'Modules'                       => $this->DefaultModules,
                    'Handlers'                      => $this->DefaultHandlers,
                    'Libraries'                     => $this->DefaultLibraries
                );
                
            default:
                return null;
        }
    }
    
    # 4 Private Methods
    # 4.1 initConfig
    private function initConfig(): bool
    {
        if(is_null($this->Config))
        {
            $this->ConfigSystem                     = $this->DefaultConfig['System'];
            $this->ConfigRepositories               = $this->DefaultConfig['Repositories'];
            $this->ConfigSecurity                   = $this->DefaultConfig['Security'];
            $this->ConfigCache                      = $this->DefaultConfig['Cache'];
            
            return true;
        }
        elseif(is_array($this->ConfigSystem))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}