<?php

namespace Italofantone\Tutor\Livewire;

use Italofantone\Tutor\Agents\LaravelTutor;
use Laravel\Ai\Enums\Lab;
use Laravel\Ai\Messages\Message;
use Livewire\Component;

class Chat extends Component
{
    public string $message = '';
    public array $messages = [];

    public function mount(): void
    {
        $this->messages = [];
    }

    public function sendMessage(): void
    {
        $this->validate([
            'message' => 'required|string|max:255',
        ]);

        $question = trim($this->message);
        $context = array_map(
            fn (array $message) => new Message(
                $message['role'],
                $message['content']
            ),
            $this->messages,
        );

        $response = (new LaravelTutor)
            ->withMessages($context)
            ->prompt(
                $question,
                provider: Lab::OpenAI,
                model: 'gpt-4o-mini',
            );
        
        $this->messages[] = [
            'role' => 'user',
            'content' => $question,
        ];

        $this->messages[] = [
            'role' => 'assistant',
            'content' => $response->text,
        ];

        $this->reset('message');
    }

    public function render()
    {
        return view('tutor::livewire.chat');
    }
}
