<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CountAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:count-addresses {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try
        {
            $id = $this->argument('id');
            $customer = Customer::find($id);
            $addrCount = $customer->addresses()
                ->get()->count();
            $this->line('Customer with id ' . $id . ' has ' . $addrCount . ' addresses(s)');
        }
        catch(ModelNotFoundException $e)
        {
            $this->line('Customer with id ' . $id . ' doesn\'t exist');
        }
        return 0;
    }
}
