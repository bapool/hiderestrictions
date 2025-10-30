<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Add the toggle button and CSS to hide restrictions
 */
function local_hiderestrictions_before_standard_html_head() {
    global $PAGE, $USER;
    
    // Only add on course pages and for users who can edit
    if ($PAGE->context->contextlevel != CONTEXT_COURSE) {
        return '';
    }
    
    $course = $PAGE->course;
    if (!has_capability('moodle/course:update', $PAGE->context)) {
        return '';
    }
    
    // Get current preference (default is shown = 0)
    $hidden = get_user_preferences('local_hiderestrictions_hidden', 0);
    
    // Add CSS to hide restrictions if preference is set
    if ($hidden) {
        $css = '<style>
            /* Hide all activity availability/restriction information */
            li.activity .text-muted,
            .activity-item .text-muted,
            .activity-availability,
            .availability-info,
            .availabilityinfo,
            [class*="availability"],
            .activity .badge,
            .activity-info .badge,
            .text-info {
                display: none !important;
            }
        </style>';
        return $css;
    }
    
    return '';
}

/**
 * Add link to the course administration menu
 */
function local_hiderestrictions_extend_navigation_course($navigation, $course, $context) {
    global $PAGE;
    
    // Only for users who can update courses
    if (!has_capability('moodle/course:update', $context)) {
        return;
    }
    
    // Get current preference (default is shown = 0)
    $hidden = get_user_preferences('local_hiderestrictions_hidden', 0);
    
    // Create the URL to toggle
    $url = new moodle_url('/local/hiderestrictions/toggle.php', [
        'courseid' => $course->id,
        'sesskey' => sesskey()
    ]);
    
    // Determine button text
    if ($hidden) {
        $text = get_string('showrestrictions', 'local_hiderestrictions');
        $icon = new pix_icon('t/hide', '');
    } else {
        $text = get_string('hiderestrictions', 'local_hiderestrictions');
        $icon = new pix_icon('t/show', '');
    }
    
    // Add to secondary navigation
    $node = navigation_node::create(
        $text,
        $url,
        navigation_node::TYPE_SETTING,
        null,
        'local_hiderestrictions',
        $icon
    );
    
    $navigation->add_node($node);
}
