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
 * This is the main script for the complete XMLDB interface. From here
 * all the actions supported will be launched.
 *
 * @package    tool_pinkymoodle
 * @copyright  2021 Pinky sharma
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../../config.php');

require_login();
$url = new moodle_url('/admin/tool/pinkymoodle/index.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_url($url);
$PAGE->set_pagelayout('report');
$PAGE->set_title('Hello world');
$PAGE->set_heading(get_string('pluginname', 'tool_pinkymoodle'));

echo $OUTPUT->header();
echo get_string('helloworld', 'tool_pinkymoodle');
echo $OUTPUT->footer();