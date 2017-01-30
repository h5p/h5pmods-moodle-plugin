<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

require_once($CFG->dirroot . '/mod/hvp/renderer.php');

class theme_superclean_mod_hvp_renderer extends mod_hvp_renderer {

    public function hvp_alter_styles(&$styles, $libraries) {
        global $CFG;
        if (
            isset($libraries['H5P.InteractiveVideo']) &&
            $libraries['H5P.InteractiveVideo']['majorVersion'] == '1'
        ) {
            $styles[] = (object) array(
                'path'    => $CFG->httpswwwroot . '/theme/superclean/style/custom.css',
                'version' => '?ver=0.0.1',
            );
        }
    }

    public function hvp_alter_scripts(&$scripts, $libraries) {
        global $CFG;
        if (
            isset($libraries['H5P.InteractiveVideo']) &&
            $libraries['H5P.InteractiveVideo']['majorVersion'] == '1'
        ) {
            $scripts[] = (object) array(
                'path'    => $CFG->httpswwwroot . '/theme/superclean/js/custom.js',
                'version' => '?ver=0.0.1',
            );
        }

        if (
            isset($libraries['H5PEditor.InteractiveVideo']) &&
            $libraries['H5PEditor.InteractiveVideo']['majorVersion'] == '1'
        ) {
            $scripts[] = (object) array(
                'path'    => $CFG->httpswwwroot . '/theme/superclean/js/customEditor.js',
                'version' => '?ver=0.0.1',
            );
        }
    }

    public function hvp_alter_semantics(&$semantics, $name, $majorVersion, $minorVersion) {
        if (
            $name === 'H5P.MultiChoice' &&
            $majorVersion == 1
        ) {
            array_shift($semantics);
        }
    }

    public function hvp_alter_filtered_parameters(&$parameters, $name, $majorVersion, $minorVersion) {
        if (
            $name === 'H5P.MultiChoice' &&
            $majorVersion == 1
        ) {
            $parameters->question .= '<p> Generated at ' . time() . '</p>';
        }
    }
}
