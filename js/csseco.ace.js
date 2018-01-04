/**
 * @package CSSecoThemes
 * csseco.custom_css.js
 */
jQuery(document).ready(function ($) {

    var updateCSS = function () {
        $("#customcss_thecss").val( editor.getSession().getValue() );
    };

    $('#csseco_save_css').submit( updateCSS );

});

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");