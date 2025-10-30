<?php
require_once('../../config.php');

$courseid = required_param('courseid', PARAM_INT);
$sesskey = required_param('sesskey', PARAM_RAW);

require_login($courseid);
require_sesskey();

$context = context_course::instance($courseid);
require_capability('moodle/course:update', $context);

// Get current preference (default is shown = 0)
$hidden = get_user_preferences('local_hiderestrictions_hidden', 0);

// Toggle the preference
$newhidden = $hidden ? 0 : 1;
set_user_preference('local_hiderestrictions_hidden', $newhidden);

// Redirect back to the course
redirect(new moodle_url('/course/view.php', ['id' => $courseid]));
