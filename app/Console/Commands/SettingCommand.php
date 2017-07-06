<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class SettingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'LaShop System Setting Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = config('settingsystem');
        $arrayUpdate = [];
        $idsUpdate = [];
        $insertArray = [];
        $settings = DB::table('settings')->get();
        foreach ($settings as $setting) {
            if (array_key_exists($setting->name, $data)) {
                $arrayUpdate[$setting->id] = array_pull($data, $setting->name);
                $idsUpdate[] = $setting->id;
                unset($arrayUpdate[$setting->id]['value']);
            }
        }
        foreach ($data as $key => $value) {
            $value['name'] = $key;
            $insertArray[] = $value;
        }

        $insertArray = array_values($insertArray);
        if (!empty($insertArray)) {
            DB::table('settings')->insert($insertArray);
        }
        if (!empty($arrayUpdate)) {
            foreach ($idsUpdate as $id) {
                DB::table('settings')->where('id', $id)->update($arrayUpdate[$id]);
            }
        }
    }
}
