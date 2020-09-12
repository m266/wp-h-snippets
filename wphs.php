<?php

/*
Plugin Name:   WP H-Snippets
Plugin URI:    https://web266.de/software/eigene-plugins/wp-h-snippets/
Description:   Eigene Snippets/Shortcodes für WordPress
Author:        Hans M. Herbrand
Author URI:    https://www.web266.de
Version:       1.0.0
Date:          2020-09-12
License:       GNU General Public License v2 or later
License URI:   http://www.gnu.org/licenses/gpl-2.0.html
*/

// Externer Zugriff verhindern
defined('ABSPATH') || exit();

/*
Hilfe:
Einbinden von Shortcodes in WordPress
Seiten, Beiträge, Widgets:
Shortcode [shortcode] einfügen

Dateien (z. B. footer.php):
<?php echo do_shortcode("[shortcode]"); ?>
Im PHP-Abschnitt ohne PHP-Tags:
echo do_shortcode("[shortcode]");
*/

/* Snippets */
/*
Copyright-Zeile
Dieser Shortcode fügt eine Copyright-Zeile, z. B. im Footer, ein.
Bei Bedarf kann das Erstellungsjahr des Blogs/der Website dem aktuellen Jahr vorangestellt
werden (z. B. 2014 - 2020).
*/
function copyright_zeile() {
    $blog_created = ""; // Bei Bedarf Erstellungsjahr im Format "jjjj - " eingeben
    $h_copyright = "&copy " . $blog_created . date('Y') . " " . get_option('blogname');
    return $h_copyright;
}
add_shortcode('h_copyright', 'copyright_zeile');

/*
Modified Page
Dieser Shortcode zeigt je nach Einstellung das Datum der Erstellung und der letzten
Änderung einer Seite, z. B. im Footer, an.
Ohne Änderung an der Seite wird nur das Erstellungsdatum angezeigt.
*/
function h_modified_page() {
    $h_created = get_the_time('d.m.Y'); // Datum der Erstellung
    $h_modified = get_the_modified_date('d.m.Y'); // Datum der letzten Bearbeitung
    if ($h_created == $h_modified) { // Ist Datum der Erstellung gleich wie Änderung?
      return "Erstellt: " . $h_created;
    }
    else
    {
      return "Erstellt: " . $h_created . " | Letzte Änderung: " . $h_modified;
        // Bei Bedarf nur Erstellung oder letzte Änderung anzeigen
    }
}
add_shortcode('h_modified', 'h_modified_page');

?>
