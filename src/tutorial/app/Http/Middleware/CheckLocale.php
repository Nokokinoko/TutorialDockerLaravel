<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckLocale
{
    private $langs = ['ja', 'en'];
    
    /**
     * セッションやGETパラメータから使用言語を設定
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( \App::environment( 'testing' ) )
        {
            \App::setLocale( 'en' );
            return $next( $request );
        }
        
        $locale = '';
        if( isset( $_GET['lang'] ) )
        {
            $locale = $_GET['lang'];
        }
        else
        {
            $locale = session( 'locale' );
            
            if( ! $locale && isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
            {
                $locale = locale_accept_from_http( $_SERVER['HTTP_ACCEPT_LANGUAGE'] );
                $locale = substr( $locale, 0, 2 );
            }
        }
        
        if( ! in_array( $locale, $this->langs, true ) )
        {
            $locale = config( 'app.fallback_locale' );
        }
        
        session( ['locale' => $locale] );
        \App::setLocale( $locale );
        return $next( $request );
    }
}
