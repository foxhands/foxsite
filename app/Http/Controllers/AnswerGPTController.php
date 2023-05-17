<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Tectalic\OpenAi\ClientException;
use Tectalic\OpenAi\Models\Completions\CreateResponse;

class AnswerGPTController extends Controller
{
    private string $chatGptToken = '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';

    /**
     * @throws ClientException
     */
    function sendProjectsToChatGPT(): void
    {
        $projects = Project::all();
        $openaiClient = \Tectalic\OpenAi\Manager::build(new \GuzzleHttp\Client(), new \Tectalic\OpenAi\Authentication($this->chatGptToken));

        foreach ($projects as $project) {
            if (is_null($project->response)){
                $prompt = "Нужно ответить на проект и написать имя заказчика на кириллице: ";
                $prompt .= "Ты должен отвечать как фрилансер\n\n";
                $prompt .= "(использовать все от моего имени `Руслан` но писать его только в конце\n\n";
                $prompt .= "портфолио указывать (https://freelancehunt.com/freelancer/butenko_ruslan.html) указать что цену и сроки обсудим),\n\n";
                $prompt .= "цены в грн,\n\n";
                $prompt .= "Имя заказчика: {$project->employer_first_name} \n\n";
                $prompt .= "Бюджет: {$project->budget}\n\n";
                $prompt .= "Заголовок проекта: {$project->title}\n\n";
                $prompt .= "Описание проекта: {$project->description}\n\n";


                /** @var CreateResponse $response */

                $response = $openaiClient->chatCompletions()->create(
                    new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest([
                        'model' => 'gpt-3.5-turbo',
                        'messages' => [
                            [
                                'role' => 'user',
                                'content' => $prompt
                            ],
                        ],
                    ])
                )->toModel();

                $project->response = $response->choices[0]->message->content; // Сохраняем ответ вместе с проектом
                $project->save();
                break;
            }
        }
    }
}
