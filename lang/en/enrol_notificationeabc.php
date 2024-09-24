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

$string['enrolalert'] = 'Enable enrol message';
$string['enrolalert_help'] = 'Enable enrol message';
$string['enrolmessage'] = 'Custom enrol message';
$string['enrolmessage_help'] = 'Personalize the message that users will come to be enrolled. This field accepts the following markers which then will be replaced by the corresponding values dynamically
<pre>
{COURSEFULLNAME} = course fullname
{USERNAME} = username
{FIRSTNAME} = firstname
{LASTNAME} = lastname
{URL} = course url
Enrolment fields: {ENROLTIMECREATED}, {ENROLTIMEMODIFIED}, {ENROLTIMESTART}, {ENROLTIMEEND}
Other course fields: {COURSESHORTNAME}, {COURSEIDNUMBER}, {COURSESTARTDATE}, {COURSEENDDATE}
Other user fields: {IDNUMBER}, {EMAIL}, {COUNTRY}, {CITY}
Old compatibility fields: {COURSENAME}, {NOMBRE}, {APELLIDO}
</pre>
Can use the user profile fields using the following syntax: {PROFILEFIELD_SHORTNAME}. For example, if you have a profile field with the shortname "office", you can use it as {PROFILEFIELD_OFFICE}';
$string['enrolmessagedefault'] = 'You have been enrolled in {$a->fullname} ({$a->url})';
$string['enrolupdatealert'] = 'Enable enrol update message';
$string['enrolupdatealert_help'] = 'Enable enrol update message';
$string['enrolupdatemessage'] = 'Custom enrol update message';
$string['enrolupdatemessage_help'] = 'Personalize the message that users will come to be updated. This field accepts the following markers which then will be replaced by the corresponding values dynamically
<pre>
{COURSEFULLNAME} = course fullname
{USERNAME} = username
{FIRSTNAME} = firstname
{LASTNAME} = lastname
{URL} = course url
Enrolment fields: {ENROLTIMECREATED}, {ENROLTIMEMODIFIED}, {ENROLTIMESTART}, {ENROLTIMEEND}
Other course fields: {COURSESHORTNAME}, {COURSEIDNUMBER}, {COURSESTARTDATE}, {COURSEENDDATE}
Other user fields: {IDNUMBER}, {EMAIL}, {COUNTRY}, {CITY}
Old compatibility fields: {COURSENAME}, {NOMBRE}, {APELLIDO}
</pre>
Can use the user profile fields using the following syntax: {PROFILEFIELD_SHORTNAME}. For example, if you have a profile field with the shortname "office", you can use it as {PROFILEFIELD_OFFICE}';
$string['enrolupdatemessagedefault'] = 'Your enrolment to {$a->fullname} has been updated ({$a->url})';
$string['failsend'] = 'WARNING: it has no been able to notify the {$a->username} user about his enrollment in the {$a->coursename} course'."\n";
$string['globalenrolalert'] = 'Enable global enrol message';
$string['globalenrolalert_help'] = 'Enable site wide enrol message';
$string['globalenrolupdatealert'] = 'Enable global enrol update message';
$string['globalenrolupdatealert_help'] = 'Site wide enrol update message';
$string['globalunenrolalert'] = 'Enable global unenrol message';
$string['globalunenrolalert_help'] = 'Site wide unenrol message';
$string['includehiddencourses'] = 'Include hidden courses';
$string['includehiddencourses_help'] = 'Include hidden courses when handling registration changes for sending messages.';
$string['messageprovider:notificationeabc_enrolment'] = 'Enrol email notification messages';
$string['notificationeabc:config'] = 'Configure email notificationeabc instances';
$string['notificationeabc:manage'] = 'Manage email notificationeabc';
$string['pluginname'] = 'Enrol notification';
$string['status'] = 'Active email notification';
$string['subject'] = 'Enrolment email notification';
$string['succefullsend'] = 'The user {$a->username} has been notified about his enrollment in the {$a->coursename} course'."\n";
$string['unenrolalert'] = 'Enable unenrol message';
$string['unenrolalert_help'] = 'Enable unenrol message';
$string['unenrolmessage'] = 'Custom unenrol message';
$string['unenrolmessage_help'] = 'Personalize the message that users will come to be unenrolled. This field accepts the following markers which then will be replaced by the corresponding values dynamically
<pre>
{COURSEFULLNAME} = course fullname
{USERNAME} = username
{FIRSTNAME} = firstname
{LASTNAME} = lastname
{URL} = course url
Other course fields: {COURSESHORTNAME}, {COURSEIDNUMBER}, {COURSESTARTDATE}, {COURSEENDDATE}
Other user fields: {IDNUMBER}, {EMAIL}, {COUNTRY}, {CITY}
Old compatibility fields: {COURSENAME}, {NOMBRE}, {APELLIDO}
</pre>
Can use the user profile fields using the following syntax: {PROFILEFIELD_SHORTNAME}. For example, if you have a profile field with the shortname "office", you can use it as {PROFILEFIELD_OFFICE}';
$string['unenrolmessagedefault'] = 'You have been unenrolled from {$a->fullname} ({$a->url})';
