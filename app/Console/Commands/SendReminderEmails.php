<?php

namespace App\Console\Commands;

use App\Models\Todo;
use App\Models\User;
use App\Mail\ReminderMail;
use Illuminate\Console\Command;
use Illuminate\Notifications\Notification;
use App\Notifications\SendEmailReminders;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders to users about todos';

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
     * @return int
     */
    public function handle()
    {
        $todos = Todo::where('due_at', today()->format('Y-m-d'))->get();

        $data = [];
        foreach ($todos as $reminder) {
            $data[$reminder->user_id][] = $reminder->toArray();
        }

        foreach ($data as $userId => $todos) {
            $this->sendEmail($userId, $todos);
        }
    }

    private function sendEmail($userId, $todos)
    {
        $user = User::find($userId);
        $user->notify(new SendEmailReminders($todos));
    }
}