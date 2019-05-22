<?php
if( ! function_exists( 'my_is_current_controller' ) )
{
    /**
     * Check current controller
     *
     * @param array $names controller name
     * @return bool
     */
    function my_is_current_controller(...$names)
    {
        $current = explode('.', Route::currentRouteName())[0];
        return in_array($current, $names, true);
    }
}

if( ! function_exists( 'my_locale_url' ) )
{
    /**
     * Make switch locale url
     *
     * @param string $locale use locale
     * @return string switch locale url
     */
    function my_locale_url($locale)
    {
        $urlParsed = parse_url( Request::fullUrl() );
        if( isset( $urlParsed['query'] ) )
        {
            parse_str( $urlParsed['query'], $params );
        }
        
        $params['lang'] = $locale;
        
        $paramsJoined = [];
        foreach( $params as $param => $value )
        {
            $paramsJoined[] = "$param=$value";
        }
        $query = implode( '&', $paramsJoined );
        
        $url =
            'http://'.$urlParsed['host']
            .( isset( $urlParsed['port'] ) ? ':'.$urlParsed['port'] : '' )
            .( isset( $urlParsed['path'] ) ? $urlParsed['path'] : '' )
            .'?'.$query
            .( isset( $urlParsed['fragment'] ) ? '#'.$urlParsed['fragment'] : '' )
        ;
        return $url;
    }
}