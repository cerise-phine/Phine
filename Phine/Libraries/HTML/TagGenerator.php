<?php
namespace Libraries\HTML;

class TagGenerator
{
    # 1 Traits
    use TagGeneratorVariables;
    
    # 2 Public methods
    # 2.1 Generator
    public function Generator($Var = false): array
    {
        switch($Var)
        {
            case 'Globals':
                return $this->GlobalAttributes;
                
            case 'EventHandlers':
                return $this->EventHandler;
                
            case 'Tags':
                return $this->Tags;
                
            default:
                return array(
                    'Globals'                       => $this->GlobalAttributes,
                    'EventHandlers'                 => $this->EventHandler,
                    'Tags'                          => $this->Tags
                );
        }
    }
    
    # 2.2 Tag
    public function Tag($Tag, $Attributes = false, $Type = false): ?string
    {
        $GeneratedTag                               = '';
        
        if(isset($this->Tags[$Tag]))
        {
            switch($Type)
            {
                case 'open':
                    return $this->generateOpenTag($Tag, $Attributes);

                case 'close':
                    return $this->generateCloseTag($Tag);

                case 'single':
                    return $this->generateSingleTag($Tag, $Attributes);

                default:
                    if($Attributes !== false)
                    {
                        $GeneratedTag               = $this->generateOpenTag($Tag, $Attributes);
                        $GeneratedTag               .= (isset($Attributes['_contains'])
                                                        ? $Attributes['_contains']
                                                        : ''
                                                    );
                        $GeneratedTag               .= $this->generateCloseTag($Tag);
                        
                        return $GeneratedTag;
                    }
            }
        }
        else
        {
            return false;
        }
        
        return $GeneratedTag;
    }
    
    # 2.3 open
    public function open($Tag, $Attributes = false): ?string
    {
        return $this->generateOpenTag($Tag, $Attributes);
    }
    
    # 2.4 close
    public function close($Tag): ?string
    {
        return $this->generateCloseTag($Tag);
    }
    
    # 2.5 single
    public function single($Tag, $Attributes): ?string
    {
        return $this->generateSingleTag($Tag, $Attributes);
    }
    
    # 2.5 generateOpenTag
    public function generateOpenTag($Tag, $Attributes): string
    {
        $GeneratedOpenTag                           = '';
        
        if(isset($this->Tags[$Tag])) {
            $Tags                                   = array_keys($this->Tags);
            $SearchTag                              = array_search($Tag, $Tags);
            
            if($SearchTag !== false)
            {
                $GeneratedOpenTag                   .= '<' . $Tags[$SearchTag] . $this->generateAttributes($Tag, $Attributes) . '>';
            }
        }
        
        return $GeneratedOpenTag;
    }
    
    # 2.6 generateCloseTag
    public function generateCloseTag($Tag): string
    {
        $GeneratedCloseTag                          = '';
        
        if(isset($this->Tags[$Tag])) {
            $Tags                                   = array_keys($this->Tags);
            $SearchTag                              = array_search($Tag, $Tags);
            
            if($SearchTag !== false)
            {
                $GeneratedCloseTag                  .= '</' . $Tags[$SearchTag] . '>';
            }
        }
        
        return $GeneratedCloseTag;
    }
    
    # 2.7 generateSingleTag
    public function generateSingleTag($Tag, $Attributes = false): string
    {
        $GeneratedSingleTag                         = '';
        
        if(isset($this->Tags[$Tag])) {
            $Tags                                   = array_keys($this->Tags);
            $SearchTag                              = array_search($Tag, $Tags);
            
            if($SearchTag !== false)
            {
                $GeneratedSingleTag                 .= '<' . $Tags[$SearchTag] . $this->generateAttributes($Tag, $Attributes) . ' />';
            }
        }
        
        return $GeneratedSingleTag;
    }
    
    # 2.8 generateAttributes
    public function generateAttributes($Tag, $Attributes): string
    {
        $GeneratedAttributes                        = '';
        
        if
        (
            !is_array($Attributes)
            || count($Attributes) < 1
            || !isset($this->Tags[$Tag])
            || !is_array($this->Tags[$Tag])
            || count($this->Tags[$Tag]) < 1
        )
        {
            return $GeneratedAttributes;
        }
        
        foreach($Attributes AS $AttributeKey => $AttributeValue)
        {
            if($AttributeKey === '_contains')
            {
                continue;
            }

            if(in_array($AttributeKey, $this->Tags[$Tag]))
            {
                $GeneratedAttributes                .= ' ' . $AttributeKey . '="' . $AttributeValue . '"';
            }
            elseif(in_array('_global', $this->Tags[$Tag]) && in_array($AttributeKey, $this->GlobalAttributes))
            {
                $GeneratedAttributes                .= ' ' . $AttributeKey . '="' . $AttributeValue . '"';
            }
        }
        
        return $GeneratedAttributes;
    }
}