<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'hi' or $message =='hey' 
                or $message =='hello') 
            {
                $this->askName($botman);
            } 
            else if ($message == 'Thanks! who are you?' or $message == 'Thanks! are you a robot?')
            {
                $botman->reply("I am EventBot, a chatbot created by Nermine.😊");
                $botman->reply("So are you a club member or not?");      
            }
            else if($message == 'Yes, I am a club member' or $message == 'Yes I am a club member'
                or $message == 'Yes')
            {
                $botman->reply("That is great! I am also a member of the 'Chatbots Club'😊 
                            Actually I am the vice president of the club!");
            }
            else if($message == "No" or $message == "No I am not a member"){
            
                $botman->reply("Oh, that's quite sad because clubs are amazing!");
            }
            else
            {
                $botman->reply("write 'hi' for testing...");
            }
        
        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you ' . $name);

        });
    }
    
}
