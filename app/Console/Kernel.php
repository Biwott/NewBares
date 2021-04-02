<?php

namespace App\Console;

use App\Models\Forex;
use App\Models\Trade;
use App\Models\Tradesub;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call($this->sheduleTrade())->everyFiveMinutes()->timezone('America/New_York');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

    private function sheduleTrade()
    {
        // $forexes = Forex::where('status', 0)->get();
        // if ($forexes != null) {
        //     //assign trades to existing
        //     foreach ($forexes as $forex) {
        //         $tradesubs = Tradesub::where('forex', $forex->tradepack_id)->where('status', 1)->get();
        //         if ($tradesubs != null) {
        //             foreach ($tradesubs as $tradesub) {
        //                 Trade::create([
        //                     'user_id' => $tradesub->user_id,
        //                     'tradepack_id' => $forex->tradepack_id,
        //                     'gain' => $forex->id,
        //                     'status' => 1
        //                 ]);
        //             }
        //         }
        //     }
        // }
    }
}
