<?php

namespace App\Console\Commands;

use App\Models\SurveyModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckEventDate extends Command
{
    protected $signature = 'check:survey-date';
    protected $description = 'Untuk melakukan pengecekkan secara otomatis';

    public function handle()
    {
        $now = Carbon::now();

        $records = SurveyModel::where('end_date', '<', $now)
                    ->where('status', '!=', 'completed')
                    ->get();

        foreach ($records as $record) {
            $record->update(['status' => 'completed']);
        }

        $this->info('Status updated successfully for records with past end_date.');
    }
}
