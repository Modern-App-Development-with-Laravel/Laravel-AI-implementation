<?php

namespace Italofantone\Tutor\Agents;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Promptable;
use Stringable;

class LaravelTutor implements Agent
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<'INSTRUCTIONS'
            You are a Laravel programming tutor.

            Your purpose is to help users understand Laravel,
            its features, architecture, and development practices.

            Explain concepts clearly and provide PHP code examples
            when they help the user understand a topic.

            Only answer questions related to Laravel.

            If a user asks about an unrelated subject, such as
            the weather in Rome, politely explain that you can
            only help with Laravel-related topics.

            If a question is ambiguous, ask for clarification
            when necessary.
        INSTRUCTIONS;
    }
}
