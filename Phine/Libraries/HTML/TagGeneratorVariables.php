<?php
namespace Libraries\HTML;

trait TagGeneratorVariables
{
    # 1 Variables
    private         $GlobalAttributes               = array(
                        'accesskey', 'class', 'contenteditable', 'contextmenu',
                        'dir', 'draggable', 'hidden', 'id', 'itemprop', 'lang',
                        'slot', 'spellcheck', 'style', 'tabindex', 'title',
                        'translate', 'data-*'
                    );
    private         $EventHandler                   = array(
                        'onabort', 'onautocomplete', 'onautocompleteerror',
                        'onblur', 'oncancel', 'oncanplay', 'oncanplaythrough',
                        'onchange', 'onclick', 'onclose', 'oncontextmenu',
                        'oncuechange', 'ondblclick', 'ondrag', 'ondragend',
                        'ondragenter', 'ondragexit', 'ondragleave',
                        'ondragover', 'ondragstart', 'ondrop', 
                        'ondurationchange', 'onemptied', 'onended', 'onerror',
                        'onfocus', 'oninput', 'oninvalid', 'onkeydown', 
                        'onkeypress', 'onkeyup', 'onload', 'onloadeddata',
                        'onloadedmetadata', 'onloadstart', 'onmousedown',
                        'onmouseenter', 'onmouseleave', 'onmousemove',
                        'onmouseout', 'onmouseover', 'onmouseup',
                        'onmousewheel', 'onpause', 'onplay', 'onplaying',
                        'onprogress', 'onratechange', 'onreset', 'onresize',
                        'onscroll', 'onseeked', 'onseeking', 'onselect',
                        'onshow', 'onsort', 'onstalled', 'onsubmit',
                        'onsuspend', 'ontimeupdate', 'ontoggle',
                        'onvolumechange', 'onwaiting'
                    );
    private         $Tags                           = array(
                        'a'                             => array(
                            '_contains', '_global', '_event',
                            'charset', 'coords', 'download', 'href', 
                            'hreflang', 'media', 'name', 'ping',
                            'referrerpolicy', 'rel', 'shape', 'target'
                        ),
                        'abbr'                          => array(
                            '_contains', '_global', '_event'
                        ),
                        'address'                       => array(
                            '_contains', '_global', '_event', 'align', 'alt'
                        ),
                        'applet'                        => array(
                            'align', 'alt', 'code', 'codebase'
                        ),
                        'area'                          => array(
                            '_global', '_event', 'alt', 'area', 'download',
                            'href', 'hreflang', 'media', 'ping',
                            'referrerpolicy', 'rel', 'shape', 'target'
                        ),
                        'article'                       => array(
                            '_contains', '_global', '_event'
                        ),
                        'aside'                         => array(
                            '_contains', '_global', '_event'
                        ),
                        'audio'                         => array(
                            '_contains', '_global', '_event', 'autoplay',
                            'buffered', 'controls', 'crossorigin', 'loop',
                            'muted', 'preload', 'src'
                        ),
                        'b'                             => array(
                            '_contains', '_global', '_event'
                        ),
                        'base'                          => array(
                            '_contains', '_global', '_event', 'href', 'target'
                        ),
                        'bdi'                           => array(
                            '_contains', '_global', '_event'
                        ),
                        'bdo'                           => array(
                            '_contains', '_global', '_event'
                        ),
                        'blockquote'                    => array(
                            '_contains', '_global', '_event', 'cite'
                        ),
                        'body'                          => array(
                            '_contains', '_global', '_event'
                        ),
                        'br'                            => array(
                            '_global', '_event'
                        ),
                        'button'                        => array(
                            '_contains', '_global', '_event', 'autofocus',
                            'disabled', 'form', 'formaction', 'formenctype',
                            'formmethod', 'formnovalidate', 'formtarget',
                            'name', 'type', 'value'
                        ),
                        'canvas'                        => array(
                            '_contains', '_global', '_event', 'height', 'width'
                        ),
                        'caption'                       => array(
                            '_contains', '_global', '_event', 'align'
                        ),
                        'cite'                          => array(
                            '_contains', '_global', '_event'
                        ),
                        'code'                          => array(
                            '_contains', '_global', '_event'
                        ),
                        'col'                           => array(
                            '_contains', '_global', '_event', 'align', 'span'
                        ),
                        'colgroup'                      => array(
                            '_contains', '_global', '_event', 'align', 'span'
                        ),
                        'content'                       => array(
                            '_contains', '_global', '_event'
                        ),
                        'data'                          => array(
                            '_contains', '_global', '_event', 'value'
                        ),
                        'datalist'                      => array(),
                        'dd'                            => array(),
                        'del'                           => array(
                            'cite', 'datetime'
                        ),
                        'details'                       => array('open'),
                        'dfn'                           => array(),
                        'div'                           => array(
                            '_contains', '_global', '_event'
                        ),
                        'dl'                            => array(),
                        'dt'                            => array(),
                        'em'                            => array(),
                        'embed'                         => array(
                            'height', 'src', 'type', 'width'
                        ),
                        'fieldset'                      => array(
                            'disabled', 'form', 'name'
                        ),
                        'figcaption'                    => array(),
                        'figure'                        => array(),
                        'font'                          => array(),
                        'footer'                        => array(
                            '_contains', '_global', '_event'
                        ),
                        'form'                          => array(
                            'accept', 'accept-charset', 'action',
                            'autocomplete', 'enctype', 'method', 'name',
                            'novalidate', 'target'
                        ),
                        'frame'                         => array(),
                        'frameset'                      => array(),
                        'h1'                            => array(
                            '_contains', '_global', '_event'
                        ),
                        'h2'                            => array(
                            '_contains', '_global', '_event'
                        ),
                        'h3'                            => array(
                            '_contains', '_global', '_event'
                        ),
                        'h4'                            => array(
                            '_contains', '_global', '_event'
                        ),
                        'h5'                            => array(
                            '_contains', '_global', '_event'
                        ),
                        'h6'                            => array(
                            '_contains', '_global', '_event'
                        ),
                        'head'                          => false,
                        'header'                        => array(),
                        'hr'                            => array('align'),
                        'html'                          => array(
                            '_contains', 'language'
                        ),
                        'i'                             => array(
                            '_contains', '_global', '_event'
                        ),
                        'iframe'                        => array(
                            'align', 'allow', 'csp', 'height', 'importance',
                            'loading', 'name', 'referrerpolicy', 'sandbox',
                            'src', 'srcdoc', 'width'
                        ),
                        'img'                           => array(
                            'align', 'alt', 'crossorigin', 'decoding', 'height',
                            'importance', 'intrinsicsize', 'ismap', 'loading',
                            'referrerpolicy', 'sizes', 'src', 'srcset',
                            'usemap', 'width'
                        ),
                        'input'                         => array(
                            'accept', 'alt', 'autocomplete', 'autofocus',
                            'capture', 'checked', 'dirname', 'disabled', 'form',
                            'formaction', 'formenctype', 'formmethod',
                            'formnovalidate', 'formtarget', 'height', 'list',
                            'max', 'maxlength', 'minlength', 'min', 'multiple',
                            'name', 'pattern', 'placeholder', 'readonly',
                            'required', 'size', 'src', 'step', 'type', 'usemap',
                            'value', 'width'
                        ),
                        'ins'                           => array(
                            'cite', 'datetime'
                        ),
                        'kbd'                           => array(),
                        'keygen'                        => array(
                            'autofocus', 'challenge', 'disabled', 'form',
                            'keytype', 'name'
                        ),
                        'label'                         => array('for', 'form'),
                        'legend'                        => array(),
                        'li'                            => array('value'),
                        'link'                          => array(
                            'crossorigin', 'href', 'hreflang', 'importance',
                            'integrity', 'media', 'referrerpolicy', 'rel',
                            'sizes', 'type'
                        ),
                        'main'                          => array(),
                        'map'                           => array('name'),
                        'mark'                          => array(),
                        'menu'                          => array('type'),
                        'menuitem'                      => array(),
                        'meta'                          => array(
                            'charset', 'content', 'http-equiv', 'name', 
                            'property'
                        ),
                        'meter'                         => array(
                            'form', 'high', 'low', 'max', 'min', 'optimum',
                            'value'
                        ),
                        'nav'                           => array(
                            '_contains', '_global', '_event'
                        ),
                        'noscript'                      => array(
                            '_contains', '_global'
                        ),
                        'object'                        => array(
                            'data', 'form', 'height', 'name', 'type', 'usemap',
                            'width'
                        ),
                        'ol'                            => array(
                            '_contains', '_global', '_event', 'reversed'
                        ),
                        'optgroup'                      => array(
                            'disabled', 'label'
                        ),
                        'option'                        => array(
                            'disabled', 'label', 'selected', 'value'
                        ),
                        'ol'                            => array('start'),
                        'output'                        => array(
                            'for', 'form', 'name'
                        ),
                        'p'                             => array(
                            '_contains', '_global', '_event'
                        ),
                        'param'                         => array(
                            'name', 'value'
                        ),
                        'picture'                       => array(),
                        'pre'                           => array(
                            '_contains', '_global', '_event'
                        ),
                        'progress'                      => array(
                            'form', 'max', 'value'
                        ),
                        'q'                             => array('cite'),
                        'rp'                            => array(),
                        'rt'                            => array(),
                        'ruby'                          => array(),
                        's'                             => array(),
                        'samp'                          => array(),
                        'script'                        => array(
                            '_contains', 'async', 'charset', 'crossorigin',
                            'defer', 'importance', 'integrity', 'language',
                            'referrerpolicy', 'src'
                        ),
                        'section'                       => array(
                            '_contains', '_global', '_event'
                        ),
                        'select'                        => array(
                            'autocomplete', 'autofocus', 'disabled', 'form',
                            'multiple', 'name', 'required', 'size'
                        ),
                        'shadow'                        => array(),
                        'small'                         => array(
                            '_contains', '_global', '_event'
                        ),
                        'source'                        => array(
                            'media', 'sizes', 'src', 'srcset', 'type'
                        ),
                        'span'                          => array(),
                        'strong'                        => array(
                            '_contains', '_global', '_event'
                        ),
                        'style'                         => array(
                            'media', 'scoped', 'type'
                        ),
                        'sub'                           => array(
                            '_contains', '_global', '_event'
                        ),
                        'summary'                       => array(
                            '_contains', '_global', '_event'
                        ),
                        'sup'                           => array(
                            '_contains', '_global', '_event'
                        ),
                        'table'                         => array(
                            'align', 'background', 'summary'
                        ),
                        'tbody'                         => array('align'),
                        'td'                            => array(
                            'align', 'background', 'colspan', 'headers',
                            'rowspan'
                        ),
                        'template'                      => array(),
                        'textarea'                      => array(
                            '_contains', '_global', '_event', 'autocomplete', 
                            'autofocus', 'cols', 'dirname', 'disabled', 'form',
                            'inputmode', 'maxlength', 'minlength', 'name',
                            'placeholder', 'readonly', 'required', 'rows',
                            'wrap'
                        ),
                        'tfoot'                         => array('align'),
                        'th'                            => array(
                            'align', 'background', 'colspan', 'headers'.
                            'rowspan', 'scope'
                        ),
                        'thead'                         => array('align'),
                        'time'                          => array('datetime'),
                        'title'                         => array('_contains'),
                        'tr'                            => array('align'),
                        'track'                         => array(
                            'default', 'kind', 'label', 'src', 'srclang'
                        ),
                        'u'                             => array(),
                        'ul'                            => array(
                            '_contains', '_global', '_event'
                        ),
                        'var'                           => array(),
                        'video'                         => array(
                            'autoplay', 'buffered', 'controls', 'crossorigin',
                            'video', 'loop', 'muted', 'poster', 'preload',
                            'src', 'width'
                        ),
                        'wbr'                           => array()
                    );
}