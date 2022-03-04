<?php
namespace Core;

trait Init
{
    # 1 Public Methods
    # 1.1 Init
    public function Init($Var = false)
    {
        switch($Var)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return null;
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return null;
                
            case self::TRAIT_RETURN_INCIDENTS:
                return array(
                    array('Init', 'x208001'),
                    array('Init', 'x208002'),
                    array('Init', 'x208003'),
                    array('Init', 'x208004'),
                    array('Init', 'x208005'),
                    array('Init', 'x208006'),
                    array('Init', 'x208007'),
                    array('Init', 'x208008'),
                    array('Init', 'x208009'),
                    array('Init', 'x208010'),
                    array('Init', 'x208011'),
                    array('Init', 'x208012'),
                    array('Init', 'x208013'),
                    array('Init', 'x208014'),
                    array('Init', 'x208015'),
                    array('Init', 'x208016'),
                    array('Init', 'x208017'),
                    array('Init', 'x208018'),
                    array('Init', 'x208019'),
                    array('Init', 'x208101'),
                    array('Init', 'x208102'),
                    array('Init', 'x208103'),
                    array('Init', 'x208104'),
                    array('Init', 'x208105'),
                    array('Init', 'x208106'),
                    array('Init', 'x208107'),
                    array('Init', 'x208108'),
                    array('Init', 'x208109'),
                    array('Init', 'x208110'),
                    array('Init', 'x208111'),
                    array('Init', 'x208112'),
                    array('Init', 'x208113'),
                    array('Init', 'x208114'),
                    array('Init', 'x208115'),
                    array('Init', 'x208116'),
                    array('Init', 'x208117'),
                    array('Init', 'x208118'),
                    array('Init', 'x208119'),
                    array('Init', 'x208501'),
                    array('Init', 'x208502')
                );
                
            # 2.1.2 Specific output
            default:
                return null;
        }
    }
    
    # 2 Private Methods
    # 2.1 init
    private function initPhine(): void
    {
        $this->initConfig();
        $this->initDebug();
        $this->initPhinterface();
        $this->initHandlers();
        $this->initLibraries();
        $this->initUser();
        $this->initL10N();
        $this->initCache();
        $this->initRoute();
        $this->initBlueprints();
        $this->initSitemap();
        $this->initSite();
    }
}