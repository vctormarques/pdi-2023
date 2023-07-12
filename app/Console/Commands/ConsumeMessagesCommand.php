<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class ConsumeMessagesCommand extends Command
{
    protected $signature = 'consume:messages';
    protected $description = 'Consume messages from RabbitMQ';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Consuming messages...');

        Queue::pop('teste_fila', function ($message) {
            // Processar a mensagem
            $this->line('Received message: ' . $message->getBody());
            $message->acknowledge();
        });
    }
}
