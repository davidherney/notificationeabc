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

$string['enrolalert'] = 'Activar aviso de matriculación';
$string['enrolalert_help'] = 'Activar aviso de matriculación';
$string['enrolmessage'] = 'Mensaje personalizado';
$string['enrolmessage_help'] = 'Personalice el mensaje que le llegará a los usuarios al ser matriculados. Este campo acepta los siguientes marcadores que luego seran reemplazados dinámicamente por los valores correspondientes
<pre>
{COURSENAME} = Nombre completo del curso
{USERNAME} = Nombre de usuario
{FIRSTNAME} = Nombre
{LASTNAME} = Apellido
{URL} = Url del curso
</pre>';
$string['enrolmessagedefault'] = 'Ud ha sido matriculado en el curso {$a->fullname} ({$a->url})';
$string['enrolupdatealert'] = 'Activar aviso de actualizacion de matriculacion';
$string['enrolupdatealert_help'] = 'Activar aviso de actualizacion de matriculacion';
$string['enrolupdatemessage'] = 'Mensaje personalizado';
$string['enrolupdatemessage_help'] = 'Personalice el mensaje que le llegará a los usuarios al realizar alguna actualizacion en su matriculacion. Este campo acepta los siguientes marcadores que luego seran reemplazados dinámicamente por los valores correspondientes
<pre>
{COURSENAME} = Nombre completo del curso
{USERNAME} = Nombre de usuario
{FIRSTNAME} = Nombre
{LASTNAME} = Apellido
{URL} = Url del curso
</pre>';
$string['enrolupdatemessagedefault'] = 'Su matriculacion en el curso {$a->fullname} ha sido actualizada ({$a->url})';
$string['failsend'] = 'ATENCION: No se pudo notificar al usuario {$a->username} sobre su matriculación en el curso {$a->coursename}'."\n";
$string['globalenrolalert'] = 'Activar para todo el sitio';
$string['globalenrolalert_help'] = 'Activa la notificacion de matriculacion para todo los cursos';
$string['globalenrolupdatealert'] = 'Activar para todo el sitio';
$string['globalenrolupdatealert_help'] = 'Activar la notificacion de actualizacion de matriculacion para todo el sitio';
$string['globalunenrolalert'] = 'Activar para todo el sitio';
$string['globalunenrolalert_help'] = 'Activar la notificacion de desmatriculacion para todo el sitio';
$string['includehiddencourses'] = 'Incluir cursos ocultos';
$string['includehiddencourses_help'] = 'Incluir los cursos ocultos al momento de atender los cambios en las matrículas para el envío de los mensajes.';
$string['messageprovider:notificationeabc_enrolment'] = 'Enrol notification messages';
$string['notificationeabc:manage'] = 'Gestionar notificaciones de matriculación';
$string['pluginname'] = 'Notificación de Matriculación';
$string['status'] = 'Activar notification de matriculación';
$string['subject'] = 'Notificación de Matriculación';
$string['succefullsend'] = 'Se notifico al usuario {$a->username} sobre su matriculación en el curso {$a->coursename}'. "\n";
$string['unenrolalert'] = 'Activar aviso de desmatriculacion';
$string['unenrolalert_help'] = 'Activar aviso de desmatriculacion';
$string['unenrolmessage'] = 'Mensaje personalizado';
$string['unenrolmessage_help'] = 'Personalice el mensaje que le llegará a los usuarios al ser desmatriculados. Este campo acepta los siguientes marcadores que luego seran reemplazados dinámicamente por los valores correspondientes
<pre>
{COURSENAME} = Nombre completo del curso
{USERNAME} = Nombre de usuario
{FIRSTNAME} = Nombre
{LASTNAME} = Apellido
{URL} = Url del curso
</pre>';
$string['unenrolmessagedefault'] = 'Ud ha sido desmatriculado del curso {$a->fullname} ({$a->url})';
