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
 * Overview of how a page in Moodle admin tool works
 *
 * @package    tool_pinkymoodle
 * @copyright  2021 Pinky sharma
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../../config.php');

$id   = optional_param('courseid', 0, PARAM_INT);
if ($id != 0) {
    if (!$course = $DB->get_record('course', ['id' => $id], '*')) {
        throw new moodle_exception('invalidcourseid', manager::PLUGINNAME);
    }
    require_login($course);
    $context = context_course::instance($id);
} else {
    require_login();
    $context = context_system::instance();
}

$url = new moodle_url('/admin/tool/pinkymoodle/index.php', ['courseid' => $id]);
// Course and site require different navigation setups.
if ($id > SITEID) {
    $PAGE->navigation->override_active_url($url);
} else {
    admin_externalpage_setup('tool_pinkymoodle_reports', '', null, '', ['pagelayout' => 'report']);
}
$PAGE->set_context($context);
$PAGE->set_url($url);
$PAGE->set_pagelayout('admin');
$PAGE->set_title('Hello world');
$PAGE->set_heading(get_string('pluginname', 'tool_pinkymoodle'));

echo $OUTPUT->header();
echo html_writer::div(get_string('helloworld', 'tool_pinkymoodle', $id));
echo $OUTPUT->footer();
