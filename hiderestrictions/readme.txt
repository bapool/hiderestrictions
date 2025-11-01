HIDE RESTRICTIONS PLUGIN FOR MOODLE
====================================

Author: Brian A. Pool, National Trail Local Schools
Plugin Type: Local
Moodle Version: 4.5+
License: GPL v3


DESCRIPTION
-----------
This local plugin allows teachers to toggle the visibility of activity and 
resource restrictions on Moodle course pages. When enabled, teachers can hide 
the "Not available unless:" messages and restriction badges that appear on 
activities, making the course page less cluttered and easier to navigate while 
editing.

By default, restrictions are visible to all teachers. Each teacher can 
individually toggle the visibility on/off, and their preference is saved 
across all sessions.


FEATURES
--------
* Toggle button accessible from course secondary navigation
* Individual user preferences - each teacher's choice is saved independently
* Works on both main course pages and within course sections
* Restrictions remain visible to students - only affects teacher view
* Simple on/off toggle similar to "Turn editing on/off"
* Default setting: restrictions visible (teachers can hide if desired)


INSTALLATION
------------
1. Download and extract the plugin files

2. Upload to your Moodle installation:
   - Copy the 'hiderestrictions' folder to: moodle/local/

3. Set proper file permissions (example for Ubuntu/Linux):
   chmod -R 755 /path/to/moodle/local/hiderestrictions
   chown -R www-data:www-data /path/to/moodle/local/hiderestrictions

4. Log in to Moodle as an administrator

5. Navigate to: Site administration → Notifications

6. Moodle will detect the new plugin and prompt you to install it

7. Click "Upgrade Moodle database now"

8. Purge all caches: Site administration → Development → Purge all caches


USAGE
-----
1. Navigate to any course as a teacher or course creator

2. Look for the toggle button in the course navigation menu:
   - "Restrictions are shown" (click to hide restrictions)
   - "Restrictions are hidden" (click to show restrictions)

3. Click the toggle to switch between showing and hiding restrictions

4. Your preference is automatically saved and will persist across sessions


CONFIGURATION
-------------
No configuration is required. The plugin works immediately after installation.

To change the default behavior (show vs hide restrictions by default):
- Edit lib.php and toggle.php
- Change: get_user_preferences('local_hiderestrictions_hidden', 0)
- Use 0 for visible by default (current setting)
- Use 1 for hidden by default


REQUIREMENTS
------------
* Moodle 4.5 or higher
* PHP 8.0 or higher
* Teacher or course creator role with moodle/course:update capability


COMPATIBILITY
-------------
* Tested with Moodle 4.5
* Compatible with Boost and Academi themes
* Should work with most standard Moodle themes


TECHNICAL DETAILS
-----------------
The plugin uses:
* CSS injection to hide restriction elements when toggled
* User preferences API to store individual teacher settings
* Navigation API to add the toggle button to course navigation
* Session key verification for security

Hidden elements include:
* Activity availability information
* "Not available unless" messages
* Restriction badges and icons
* Completion and access restriction details


TROUBLESHOOTING
---------------
If the toggle button doesn't appear:
1. Verify you have teacher/editing permissions in the course
2. Clear all Moodle caches
3. Check browser console for JavaScript errors
4. Ensure plugin files are in: moodle/local/hiderestrictions/

If restrictions don't hide when toggled:
1. Clear browser cache and reload the page
2. Purge all Moodle caches
3. Verify CSS is loading (check browser developer tools)


CHANGELOG
---------
Version 1.0 (2024-09-30)
* Initial release
* Toggle button in course navigation
* User preference storage
* CSS-based hiding of restriction elements
* Default: restrictions visible


SUPPORT
-------
For issues, questions, or suggestions, please use the Moodle plugins 
directory discussion forum for this plugin.


LICENSE
-------
This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program. If not, see <http://www.gnu.org/licenses/>.


CREDITS
-------
Developed by Brian A. Pool
National Trail Local Schools

Special thanks to the Moodle community for their support and resources.