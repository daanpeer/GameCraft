<?php
function status_code_to_name($status)
{
    switch ($status) {
        case 0:
            return 'Starting';
        case 1:
            return 'Started';
        case 2:
            return 'Provisioning';
        case 3:
            return 'Running';
        case 4:
            return 'Stopping';
        case 5:
            return 'Stopped';
        case 6:
            return 'Paused';
        case 7:
            return 'Pausing';
        case 8:
            return 'Snapshotting';
        case 9:
            return 'Resuming';
    }
}