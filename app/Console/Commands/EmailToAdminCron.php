<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailToAdmin;
use App\Enums\StatusOrder;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;

class EmailToAdminCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emailtoadmin:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to admin every Friday.';

    protected $adminRepo;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AdminRepositoryInterface $adminRepo, OrderRepositoryInterface $orderRepo)
    {
        parent::__construct();
        $this->adminRepo = $adminRepo;
        $this->orderRepo = $orderRepo;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $admins = $this->adminRepo->getAll();
        $numberOrder = $this->orderRepo->count(['status' => StatusOrder::Pending]);
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new SendMailToAdmin($admin->name, $numberOrder));
        }
        $this->info('Successful!');
    }
}
