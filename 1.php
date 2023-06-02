<?php
function are_int ($query ) {
    $args = func_get_args ();
    foreach ( $args as $arg )
        if ( ! is_int ( $arg ) )
            return 0;
    return $query;
}

// Example:
echo are_int ( "5" ); // true

?>