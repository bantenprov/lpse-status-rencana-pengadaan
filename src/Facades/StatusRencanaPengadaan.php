<?php namespace Bantenprov\StatusRencanaPengadaan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The StatusRencanaPengadaan facade.
 *
 * @package Bantenprov\StatusRencanaPengadaan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusRencanaPengadaan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'status-rencana-pengadaan';
    }
}
