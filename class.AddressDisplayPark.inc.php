<?php

/**
 * Strategy to display a park address.
 */
class AddressDisplayPark implements AddressDisplay {

    /**
     * Display an address with a green background
     */
    public static function display( $address ){
        $output = '<div style="background-color:PaleGreen;">';
        if ( AddressDisplayNoCountry::isAvailable( $address ) ) {
            $output .= AddressDisplayNoCountry::isAvailable( $address );
        }
        else {
            $output .= AddressDisplayFull::display ( $address );
        }
        $output .= '</div>';
        return $output;
    }

    /**
     * Is this method of display available?
     * @return boolean
     */
    public static function isAvailable ( $address ){
        return $address instanceof AddressPark;
    }
}