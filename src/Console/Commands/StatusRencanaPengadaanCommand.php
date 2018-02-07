<?php namespace Bantenprov\StatusRencanaPengadaan\Console\Commands;

use Illuminate\Console\Command;

/**
 * The StatusRencanaPengadaanCommand class.
 *
 * @package Bantenprov\StatusRencanaPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusRencanaPengadaanCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:status-rencana-pengadaan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\StatusRencanaPengadaan package';

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
        $this->info('Welcome to command for Bantenprov\StatusRencanaPengadaan package');
    }
}
