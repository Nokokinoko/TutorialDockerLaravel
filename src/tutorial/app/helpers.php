<?php
if ( ! function_exists( 'my_is_current_controller' ) )
{
    /**
     * is current controller?
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