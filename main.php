<?php
/**
 * Plugin Name: Redirect with ShortCode
 * Description: With this plugin you can redirect from any page or post to another page or start a download. (use: e.g. [redirect url='http://...' sec='5' txt='Redirect within {SECONDS} seconds...' txt_finished='Redirecting now']
 * Version: 1.0
 * Author: Ton Snoei
 * Author URI: https://www.snoei.net
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.htm
 *
 *  GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.

 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

function snrws_redirect($attrs) {
    // begin output buffering
    ob_start();

    $sec = snrws_get_attr_value($attrs, 'sec', "0");
    $url = snrws_get_attr_value($attrs, 'url', "");
    $txt = snrws_get_attr_value($attrs, 'txt', "");
    $txt_finished = snrws_get_attr_value($attrs, 'txt_finished', "");
    $url = str_replace("&amp;", "&", $url);
    if(!empty($url)) {
        snrws_set_redirect($url, $sec);
        if (!empty($txt)) {
            snrws_set_text($txt, $txt_finished, $sec);
        }
    }

    return ob_get_clean();
}

function snrws_set_redirect($url, $sec) {
    ?>

    <script type="text/JavaScript">
        setTimeout("location.href = '<?php echo $url; ?>';", <?php echo $sec * 1000; ?>);
    </script>
<?php
}

function snrws_set_text($txt, $txt_finished, $sec) {
    if (!empty($txt)) {
        echo str_replace('{SECONDS}', "<span id='redirect_counter'>" . $sec . "</span>", "<span id='redirect_txt'>" . $txt . "</span>");
    }
    ?>
    <script type="text/JavaScript">
        function countdown() {
            var t = document.getElementById('redirect_txt');
            var i = document.getElementById('redirect_counter');

            if (i!=null && parseInt(i.innerHTML)>0) {
                i.innerHTML = parseInt(i.innerHTML) - 1;
            } else {
                <?php
                    if (!empty($txt_finished)) {
                        echo "t.innerHTML = '" . $txt_finished . "';";
                    }
                ?>
            }
        }
        setInterval(function(){ countdown(); },1000);
    </script>
<?php
}

function snrws_get_attr_value($attrs, $attr_name, $default) {
    return (isset($attrs[$attr_name]) && !empty($attrs[$attr_name])) ? esc_attr($attrs[$attr_name]) : $default;
}

add_shortcode('redirect', 'snrws_redirect');