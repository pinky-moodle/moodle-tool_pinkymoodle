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

/**
 * This file contains hooks and callbacks needed for this pugin
 *
 * @package    tool_pinkymoodle
 * @copyright  2021 Pinky sharma
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * This function extends course navigation to link plugin page
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass $course The course to object for the report
 * @param context $context The context of the course
 * @throws coding_exception
 * @throws moodle_exception
 */
function tool_pinkymoodle_extend_navigation_course(\navigation_node $navigation, \stdClass $course, \context $context) {
    $navigation->add(
        get_string('pluginname', 'tool_pinkymoodle'),
        new moodle_url('/admin/tool/pinkymoodle/index.php', ['courseid' => $course->id]),
        navigation_node::TYPE_SETTING,
        get_string('pluginname', 'tool_pinkymoodle'),
        'pinkymoodle',
        new pix_icon('icon', '', 'tool_pinkymoodle'));
}