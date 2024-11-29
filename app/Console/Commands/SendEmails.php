<?php

namespace App\Console\Commands;

use App\Mail\SendMailMaketing;
use App\Mail\SendOTP;
use App\Models\ProductPayment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $payments = ProductPayment::where("sent_mail_status", 0)
        ->where("status", 0)
        ->where("created_at", "<=", date("Y-m-d H:i:s", time() - 86400))
        ->get();

        $ary = [];

        foreach($payments as $payment) {
            if(in_array($payment->email, $ary)) {
                continue;
            }

            array_push($ary, $payment->email);

            Mail::to($payment->email)
            ->send(new SendMailMaketing($payment->user_name, $payment->product_id, ''));
    
            $payment->sent_mail_status = 1;
            $payment->save();
        }
    }
}
