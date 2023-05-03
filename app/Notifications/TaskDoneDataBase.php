<?php

namespace App\Notifications;

use App\Models\Employee;
use App\Models\Task;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TaskDoneDataBase extends Notification
{
    use Queueable;
    private $task;
    /**
     * Create a new notification instance.
     */
    public function __construct(Task $task,User $user)
    {
        //
        $this->task= $task;
        $this->user= $user;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['dataBase'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
           

                //'data' => $this->details['body']
                'id'=> $this->task->id,
                'title'=> "new tasks has been added",
                'user'=>  $this->user->name,   
        ];
    }
}
