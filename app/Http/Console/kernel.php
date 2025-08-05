<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Daftar command yang tersedia (boleh kosong jika tidak custom).
     *
     * @var array<int, class-string>
     */
    protected $commands = [
        // Tambah command custom kalau ada, misal: \App\Console\Commands\Something::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Ganti path ini dengan path absolut ke projectmu
        $projectPath = '/koorprodi';

        $schedule->exec("cd {$projectPath} && php artisan queue:work --once --tries=3")
                 ->everyMinute()
                 ->withoutOverlapping()
                 ->name('queue-work-once');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        // load commands otomatis jika pakai folder Commands
        $this->load(__DIR__ . '/Commands');
    }
}
