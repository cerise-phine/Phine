<?php
namespace Core;

trait Incidents
{
    # 1 Variables
    private         $Incidents                      = false;
    private         $IncidentsTypes                 = array(
                        'Critical'                      => null,
                        'Error'                         => null,
                        'Warning'                       => null,
                        'Notice'                        => null
                    );
    
    # 2 Public methods
    # 2.1 Incidents
    public function Incidents($Var = false): ?array
    {
        switch($Var)
        {
            case 'Debug':
                return array
                (
                    'IncidentTypes'                 => $this->IncidentsTypes,
                    'Incidents'                     => $this->Incidents
                );
                
            case 'Phinterface':
                return array
                (
                    'Incidents'                     => array('Incidents', 'all'),
                    'IncidentTypes'                 => array('Incidents', 'Types'),
                    'Log'                           => array('Incidents', 'all'),
                    'LogTypes'                      => array('Incidents', 'Types',      true),
                    'LogCritical'                   => array('Incidents', 'Critical',   true),
                    'LogError'                      => array('Incidents', 'Error',      true),
                    'LogWarning'                    => array('Incidents', 'Warning',    true),
                    'LogNotice'                     => array('Incidents', 'Notice',     true),
                    'DebugIncidents'                => array('Incidents', 'Debug')
                );
                
            case 'Incidents':
                return array(
                    array('Notice',                 'x104001'),
                    array('Incidents',              'x207001'),
                    array('Incidents',              'x207002'),
                    array('Incidents',              'x207003'),
                    array('Incidents',              'x207004'),
                    array('Incidents',              'x207005'),
                    array('Incidents',              'x207006'),
                    array('Debug',                  'x207007'),
                    array('Error',                  'x207008')
                );
                
            case 'all':
                return $this->getIncidents('all');
                
            case 'Types':
                return $this->IncidentsTypes;
                
            case 'IncidentNumbers':
            case 'Numbers':
                return $this->getIncidentNumbers();
                
            default:
                if($this->checkIncidentType($Var) && count($this->Incidents[$Var]) > 0)
                {
                    return $this->getIncidents($Var);
                }
        }
        
        return null;
    }
    
    # 2.2 getIncidentNumbers
    public function getIncidentNumbers(): array
    {
        $IncidentNumbers                            = array();
        
        foreach($this->IncidentsTypes AS $TypeKey => $TypeNumbers)
        {
            if(is_null($TypeNumbers) || !is_array($TypeNumbers))
            {
                continue;
            }
            
            foreach($TypeNumbers AS $TypeNumber)
            {
                $IncidentNumbers[]                  = $TypeNumber;
            }
        }
        
        return $IncidentNumbers;
    }
    
    # 2.3 getIncidentNumberType
    public function getIncidentNumberType($Number): ?string
    {
        if(empty($Number))
        {
            $this->setIncident('x207004');
            return null;
        }
        
        foreach($this->IncidentsTypes AS $TypeKey => $TypeNumbers)
        {
            if(is_null($TypeNumbers) || count($TypeNumbers) < 1)
            {
                continue;
            }
            
            foreach($TypeNumbers AS $TypeNumber)
            {
                if($TypeNumber === $Number)
                {
                    return $TypeKey;
                }
            }
        }
        
        return null;
    }
    
    # 2.4 getIncidents
    public function getIncidents($IncidentType = false): ?array
    {
        foreach($this->Incidents AS $Type => $Incidents)
        {
            if($IncidentType !== false && $IncidentType !== $Type && $IncidentType !== 'all')
            {
                continue;
            }
            
            foreach($Incidents AS $IncidentID => $Incident)
            {
                if(
                    (!isset($Incident['Message']) || empty($Incident['Message']))
                    && !is_null($this->L10N->Incidents->getVar($Incident['Number']))
                )
                {
                    $this->Incidents[$Type][$IncidentID]['Message'] = $this->L10N->Incidents->getVar($Incident['Number']);
                }
            }
        }
        
        if(isset($this->Incidents[$IncidentType]))
        {
            return $this->Incidents[$IncidentType];
        }
        elseif($IncidentType === 'all')
        {
            return $this->Incidents;
        }
        else
        {
            return null;
        }
    }
    
    # 2.5 setIncident
    public function setIncident($Number, $Values = false): ?string
    {
        if(!$this->initIncidents())
        {
            die('x207008');
            return null;
        }
        if(!$this->checkIncidentNumber($Number))
        {
            $this->setIncident('x207002', array('Number' => $Number));
            return null;
        }
        
        $IncidentID                                 = uniqid();
        $IncidentType                               = $this->getIncidentNumberType($Number);
        $Incident['Number']                         = $Number;
        
        $uTime                                      = microtime();
        list($uSeconds, $Seconds)                   = explode(' ', $uTime);
        $Incident['Time']                           = date("H:i:s", $Seconds) . substr($uSeconds, 1);
        $Incident['Start']                          = hrtime(true);
        
        if($Values !== false)
        {
            $Incident['Values']                     = $Values;
        }
        
        $this->Incidents[$IncidentType][$IncidentID] = $Incident;
        
        return $IncidentID;
    }
    
    # 2.6 setIncidentwithMessage
    public function setIncidentwithMessage($Type, $Message): ?string
    {
        $this->initIncidents();
        
        if(!$this->checkIncidentType($Type))
        {
            return false;
        }
        elseif(empty($Message))
        {
            $this->setIncident('x207003');
            return false;
        }
    }
    
    # 2.7 setIncidentType
    public function setIncidentType($Type): bool
    {
        if($this->checkIncidentType($Type))
        {
            $this->IncidentTypes[]                  = $Type;
            return true;
        }
        else
        {
            $this->setIncident('x207001');
            return false;
        }
    }
    
    # 2.8 setIncidentStop
    public function setIncidentStop($IncidentID): void
    {
        if(!is_string($IncidentID) || empty($IncidentID))
        {
            $this->setIncident('x207006');
            return;
        }
        
        foreach($this->Incidents AS $IncidentType => $Incidents)
        {
            if(isset($Incidents[$IncidentID]) && !isset($Incidents[$IncidentID]['Stop']))
            {
                $Stop                               = hrtime(true);
                $Start                              = $this->Incidents[$IncidentType][$IncidentID]['Start'];
                $Duration                           = $Stop - $Start;
                
                $this->Incidents[$IncidentType][$IncidentID]['Stop']        = $Stop;
                $this->Incidents[$IncidentType][$IncidentID]['Duration']    = $Duration;
                
                return;
            }
        }
        
        $this->setIncident('x207006');
    }
    
    # 2.9 checkType
    public function checkIncidentType($Type): bool
    {
        if(is_string($Type) && isset($this->IncidentsTypes[$Type]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 2.10 checkIncidentNumber
    public function checkIncidentNumber($Number): bool
    {
        if(in_array($Number,$this->getIncidentNumbers()))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 3 Private methods
    # 3.1 initIncidents
    private function initIncidents(): bool
    {
        if(is_array($this->Incidents))
        {
            return true;
        }
        
        $ReflectionClass                            = new \ReflectionClass(__CLASS__);
        $Traits                                     = $ReflectionClass->getTraitNames();
        
        foreach($Traits AS $Trait)
        {
            $TraitName                              = str_replace('\\', '/', $Trait);
            $TraitPath                              = pathinfo($TraitName);
            $Method                                 = (isset($TraitPath['filename']) ? $TraitPath['filename'] : false);
            
            $TraitIncidents                         = $this->fetchTraitIncidents($Method);
            
            if(is_array($TraitIncidents))
            {
                $this->checksetTraitIncident($TraitIncidents);
            }
        }
        
        $this->Incidents                            = array();
        $this->setDebugLog('x207007');
        return true;
    }
    
    # 3.2 fetchTraitIncidents
    private function fetchTraitIncidents($Method): ?array
    {
        if($Method !== false && method_exists($this, $Method))
        {
            $TraitIncidents                     = call_user_func_array(array($this, $Method), array('Incidents'));

            if(is_array($TraitIncidents))
            {
                return $TraitIncidents;
            }
            else
            {
                return null;
            }
        }
    }
    
    # 3.3 checksetTraitIncidentTypes
    private function checksetTraitIncident($TraitIncidents): void
    {
        if(!is_array($TraitIncidents))
        {
            return;
        }
        
        foreach($TraitIncidents AS $TraitIncident)
        {
            if(
                (
                    isset($TraitIncident[0])
                    && is_string($TraitIncident[0])
                    && !in_array($TraitIncident[0], $this->IncidentsTypes)
                )
                && (
                    isset($TraitIncident[1])
                    && is_string($TraitIncident[1])
                )   
            )
            {
                $Type                               = $TraitIncident[0];
                $this->IncidentsTypes[$Type][]      = $TraitIncident[1];
            }
        }
    }
}