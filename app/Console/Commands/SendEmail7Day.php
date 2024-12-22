<?php

namespace App\Console\Commands;

use App\Mail\SendMailMaketing;
use App\Mail\SendOTP;
use App\Models\ProductPayment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail7Day extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-7-day';

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
        echo asset('images/photo_2024-12-20_16-02-37.jpg'); die;

        $payments = ProductPayment::where("sent_mail_7_day_status", 0)
        ->where("status", 0)
        ->where("created_at", "<=", date("Y-m-d H:i:s", time() - (86400 * 7)))
        ->get();

        $userPayments = ProductPayment::where("status", 1)
        ->where("created_at", ">", date("Y-m-d H:i:s", time() - (86400 * 7)))
        ->pluck('email')
        ->toArray();

        $ary = [];

        foreach($payments as $payment) {
            $payment->sent_mail_7_day_status = 1;
            $payment->save();
            
            if(in_array($payment->email, $ary) || in_array($payment->email, $userPayments)) {
                continue;
            }

            array_push($ary, $payment->email);

            Mail::to($payment->email)
            ->send(new SendMailMaketing($payment->user_name, $payment->product_id, 2));
        }
    }
}
