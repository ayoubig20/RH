<?php

namespace App\Notifications;

use App\Models\Employee;
use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class workFinshed extends Notification
    {
        use Queueable;
    
        protected $task;
        protected $employee;
    
        /**
         * Create a new notification instance.
         *
         * @return void
         */
        public function __construct(Task $task, Employee $employee)
        {
            $this->task = $task;
            $this->employee = $employee;
        }
    
        // ...
        public function via(object $notifiable): array
        {
            return ['dataBase'];
        }
    
    
        public function toMail($notifiable)
        {
            $url = route('admin.tasks.index');
            return (new MailMessage)
                        ->greeting('Hello!')
                        ->line('Task "' . $this->task->title . '" has been marked as done by ' . $this->employee->name . '.')
                        ->action('View Task', $url)
                        ->line('Thank you for using our application!');
        }
    
        public function toArray($notifiable)
        {
            return [
                'id' => $this->task->id,
                'title' => 'Task "' . $this->task->title . '" has been marked as done by ' . $this->employee->name . '.',
                'user' => $this->employee->firstName .$this->employee->lastName,
            ];
        }
}
