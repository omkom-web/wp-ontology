<?php
/*
    Plugin Name: Things by ontology
    Plugin URI: https://github.com/omkom-web/wp-ontology
    Description: Un plugin sémantique permettant d'utiliser des ontologies dans le code des articles
    Version: 0.1
    Author: Erlé Alberton
    Author URI: http://alberton.me
    License: GPL2
*/


function thing_css() {
  echo "<style type='text/css'>[itemprop='name'] {font-family:'Roboto Slab', serif; line-height: 1.2;color: #4EBD0D;}</style>";
}

add_action( 'wp_head', 'thing_css' );

function print_thing($atts, $content = null){
    $a = shortcode_atts( array(
        'type' => 'Thing',
        'ontology' => $atts['ontology']
    ), $atts );

    $s_return = '<span itemscope itemtype="http://schema.org/'.$a['type'].'" class="_addInfos">'.
                '<em itemprop="name">'.$content.'</em>'.
                '<link itemprop="sameAs" href="'.$a['ontology'].'" />'.
            '</span>';
    return $s_return;
}
add_shortcode( 'thing', 'print_thing' );
