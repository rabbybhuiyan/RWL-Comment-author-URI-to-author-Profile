<?php # -*- coding: utf-8 -*-
/**
 * Plugin Name: RWL Comment author URI to author Profile
 * Description: The plugin automatically Changes the comment author URI to the blog’s author archive.
 * Version:     2014.05.05
 * Author:      Rabby bhuiyan
 * Author URI:  http://raweblab.com
 
 /*
    Copyright (c) 2014 Rabby Bhuiyan (Rabbybhuiyan@gmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

if ( ! function_exists( 'Saika_comment_uri_to_author_archive' ) )
{
    add_filter( 'get_comment_author_url', 'Saika_comment_uri_to_author_archive' );

    function Saika_comment_uri_to_author_archive( $uri )
    {
        global $comment;

        // User email is our actual key to their archive page/URI
        if ( empty ( $comment )
            or ! is_object( $comment )
            or empty ( $comment->comment_author_email )
            or ! $user = get_user_by( 'email', $comment->comment_author_email )
        )
        {
            return $uri;
        }

        return get_author_posts_url( $user->ID );
    }
}
