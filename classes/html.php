<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Additionnal helpers for HTML.
 * 
 * @package  Helpers
 * @category Helpers
 * @author   Guillaume Poirier-Morency <guillaumepoiriermorency@gmail.com>
 * @license  http://kohanaframework.org/license
 */
class HTML extends Kohana_HTML {

    /**
     * Generate a meta tag with a name and a content and additionnal attributes.
     * 
     * @param string $name
     * @param string $content
     * @param array $attributes
     * @return string
     */
    public static function meta($name, $content, array $attributes = NULL) {

        $attributes['name'] = $name;
        $attributes['content'] = $content;

        return '<meta' . HTML::attributes($attributes) . '/>';
    }

    /**
     * Generate a shortcut icon, also known as a favicon.
     * 
     * @param string $file
     * @param array $attributes
     * @param variant $protocol
     * @param variant $index
     * @return string
     */
    public static function shortcut_icon($file, array $attributes = NULL, $protocol = NULL, $index = FALSE) {

        if (strpos($file, '://') === FALSE) {
            // Add the base URL
            $file = URL::site($file, $protocol, $index);
        }

        // Set the script link
        $attributes['href'] = $file;

        // Set the script type
        $attributes['rel'] = 'shortcut icon';

        return '<link' . HTML::attributes($attributes) . '/>';
    }

}

?>