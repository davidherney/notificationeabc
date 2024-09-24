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
 * Notificationeabc enrolment plugin.
 *
 * This plugin notifies users when an event occurs on their enrolments (enrol, unenrol, update enrolment)
 *
 * @package    enrol_notificationeabc
 * @copyright  2017 e-ABC Learning
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Osvaldo Arriola <osvaldo@e-abclearning.com>
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/enrol/notificationeabc/lib.php');

/**
 * Observer definition
 *
 * @package    enrol_notificationeabc
 * @copyright  2017 e-ABC Learning
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Osvaldo Arriola <osvaldo@e-abclearning.com>
 */
class enrol_notificationeabc_observer
{

    /**
     * hook enrol event
     * @param \core\event\user_enrolment_deleted $event
     */
    public static function user_unenrolled(\core\event\user_enrolment_deleted $event) {
        global $DB;

        $pluginconfig = get_config('enrol_notificationeabc');
        $unenrolalert = $pluginconfig->unenrolalert;

        if (!$unenrolalert) {
            return;
        }

        $course = $DB->get_record('course', ['id' => $event->courseid]);
        // Not set message for hidden courses.
        if (!$course->visible && !$pluginconfig->includehiddencourses) {
            return;
        }

        $user = $DB->get_record('user', ['id' => $event->relateduserid]);
        if ($user->deleted || $user->suspended) {
            return;
        }

        // Validate status plugin.
        $enableplugins = get_config(null, 'enrol_plugins_enabled');
        $enableplugins = explode(',', $enableplugins);
        $enabled = false;
        foreach ($enableplugins as $enableplugin) {
            if ($enableplugin === 'notificationeabc') {
                $enabled = true;
            }
        }
        if ($enabled) {

            $notificationeabc = new enrol_notificationeabc_plugin();

            $enrol = $DB->get_record('enrol', ['enrol' => 'notificationeabc', 'courseid' => $event->courseid]);

            // Use course settings.
            if (!empty($enrol)) {
                // Check the instance status: status = 0 enabled and status = 1 disabled.
                if (!empty($enrol) && !empty($unenrolalert) && !$enrol->status) {
                    // If the instance has a customint2 value, send the email to the user.
                    // Otherwise, the message was disabled in the course level.
                    if ($enrol->customint2) {
                        $notificationeabc->send_email($user, $course, 2, $enrol);
                    }
                }
            } else {
                $activeglobal = $pluginconfig->globalenrolalert;
                if ($activeglobal == 1) {
                    // Use global settings.
                    $notificationeabc->send_email($user, $course, 2);
                }
            }
        }
    }

    /**
     * hook user update event
     * @param \core\event\user_enrolment_updated $event
     */
    public static function user_updated(\core\event\user_enrolment_updated $event) {
        global $DB;

        $pluginconfig = get_config('enrol_notificationeabc');
        $enrolupdatealert = $pluginconfig->enrolupdatealert;

        if (!$enrolupdatealert) {
            return;
        }

        $course = $DB->get_record('course', ['id' => $event->courseid]);
        // Not set message for hidden courses.
        if (!$course->visible && !$pluginconfig->includehiddencourses) {
            return;
        }

        $user = $DB->get_record('user', ['id' => $event->relateduserid]);
        if ($user->deleted || $user->suspended) {
            return;
        }

        // Validate plugin status in system context.
        $enableplugins = get_config(null, 'enrol_plugins_enabled');
        $enableplugins = explode(',', $enableplugins);
        $enabled = false;
        foreach ($enableplugins as $enableplugin) {
            if ($enableplugin === 'notificationeabc') {
                $enabled = true;
            }
        }
        if ($enabled) {

            $notificationeabc = new enrol_notificationeabc_plugin();

            // Plugin instance in course.
            $enrol = $DB->get_record('enrol', ['enrol' => 'notificationeabc', 'courseid' => $event->courseid]);
            $enrollment = $DB->get_record('user_enrolments', ['id' => $event->objectid]);

            if (!empty($enrol)) {
                // Check the instance status: status = 0 enabled and status = 1 disabled.
                if (!empty($enrolupdatealert) && !$enrol->status) {
                    // Customint3 = 1 is notification enabled; customint3 = 0 is notification disabled.
                    // If the instance has a customint3 value, send the email to the user.
                    // Otherwise, the message was disabled in the course level.
                    if ($enrol->customint3) {
                        $notificationeabc->send_email($user, $course, 3, $enrol, $enrollment);
                    }
                }
            } else {

                $activeglobal = $pluginconfig->globalenrolalert;
                if ($activeglobal == 1) {
                    $notificationeabc->send_email($user, $course, 3, null, $enrollment);
                }
            }
        }
    }

    /**
     * hook enrolment event
     * @param \core\event\user_enrolment_created $event
     */
    public static function user_enrolled(\core\event\user_enrolment_created $event) {
        global $DB;

        $pluginconfig = get_config('enrol_notificationeabc');
        $enrolalert = $pluginconfig->enrolalert;

        if (!$enrolalert) {
            return;
        }

        $course = $DB->get_record('course', ['id' => $event->courseid]);
        // Not set message for hidden courses.
        if (!$course->visible && !$pluginconfig->includehiddencourses) {
            return;
        }

        $user = $DB->get_record('user', ['id' => $event->relateduserid]);
        if ($user->deleted || $user->suspended) {
            return;
        }

        // Validate plugin status in system context.
        $enableplugins = get_config(null, 'enrol_plugins_enabled');
        $enableplugins = explode(',', $enableplugins);
        $enabled = false;
        foreach ($enableplugins as $enableplugin) {
            if ($enableplugin === 'notificationeabc') {
                $enabled = true;
            }
        }

        if ($enabled) {

            $notificationeabc = new enrol_notificationeabc_plugin();

            $enrol = $DB->get_record('enrol', ['enrol' => 'notificationeabc', 'courseid' => $event->courseid]);
            $enrollment = $DB->get_record('user_enrolments', ['id' => $event->objectid]);

            if (!empty($enrol)) {
                // Check the instance status.
                // Legend: status = 0 enabled; status = 1 disabled.
                if (!empty($enrolalert) && !$enrol->status) {
                    // Customint3 = 1 is notification enabled; customint3 = 0 is notification disabled.
                    // If the instance has a customint3 value, send the email to the user.
                    // Otherwise, the message was disabled in the course level.
                    if ($enrol->customint1) {
                        $notificationeabc->send_email($user, $course, 1, $enrol, $enrollment);
                    }
                }

            } else {
                $activeglobal = $pluginconfig->globalenrolalert;
                if ($activeglobal == 1) {
                    $notificationeabc->send_email($user, $course, 1, null, $enrollment);
                }
            }
        }
    }
}
