<?php
// work-schedule.php

use Illuminate\Console\Scheduling\Schedule;

return [
    'usesWorkScheduling' => true,

    'schedules' => [
        // Définir la tâche planifiée
        [
            'command' => 'db:supprimer-doublons-compte-bancaire',
        ],
    ],
];
