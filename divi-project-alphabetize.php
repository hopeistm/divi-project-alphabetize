<?php
/*
Plugin Name: Divi Project Alphabetize
Plugin URI:  https://github.com/opshope
Description: Customization to Divi Filterable Portfolio. Alphabetize all project custom posts by last name.
Version:     1.0
Author:      Joshua Simon
Author URI:  https://github.com/opshope
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: divi-project-alphabetize
*/

add_action('init', 'alphabetize');

function alphabetize(){

  function posts_orderby_lastname ($orderby_statement)
  {
    return "

         CASE

             WHEN (post_title RLIKE '.*[js]r\\.$') THEN  RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 2)

      ELSE RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1)

    END

        ASC

    ";

  }

  add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
  $loop = new WP_Query(
    array (
      'post_type' => 'project'
    )
  );

}
