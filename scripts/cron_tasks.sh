#!/bin/bash

# Add default tasks daily at 12:00 AM
0 0 * * * /usr/bin/php /path_to_project/scripts/add_default_tasks.php

# Send pending tasks daily at 9:00 PM
0 21 * * * /usr/bin/php /path_to_project/scripts/send_pending_tasks_email.php

# Send monthly report at 11:55 PM on the last day of the month
55 23 28-31 * * [ "$(date +\%d -d tomorrow)" == "01" ] && /usr/bin/php /path_to_project/scripts/send_monthly_report.php

# Delete completed tasks at 12:00 AM on the 1st day of the month
0 0 1 * * /usr/bin/php /path_to_project/scripts/delete_completed_tasks.php
