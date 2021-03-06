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
 * Deletes questions from the table
 * @package     tool_aikengen
 * @copyright  2016 Jamal Aruna <it@iou.edu.gm>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../../config.php');
require_once('locallib.php');
require_login();
require_capability('tool/aikengen:view', context_system::instance());
global $DB;
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$fileid = $data->fileid;



if (tool_aikengen_user_own_aiken_question_id($USER->id, $fileid, $id)) {
    $DB->delete_records('tool_aiken_question', array ('id' => $id));
}