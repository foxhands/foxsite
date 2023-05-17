<?php

namespace App\Http\Controllers;

use App\Models\Project;
use GuzzleHttp\Client;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;

class SendToFreelancehuntController extends Controller
{
    public function sendResponse(){

        $projects = Project::all();
        foreach ($projects as $project) {
            if ($project->answer == 0 && isset($project->response)){
                try {
                    $freelancehuntToken = 'e58eb10d97a395a5965c0d65eb5881f93fa0d93a';
                    $client = new Client();
                    $amount = ($project->budget !== 0) ? $project->budget : 500;
                    $data = [
                        "days" => 3,
                        "safe_type" => "employer",
                        "budget" => [
                            "amount" => $amount,
                            "currency" => "UAH"
                        ],
                        "comment" => "$project->response"
                    ];
                    $url = 'https://api.freelancehunt.com/v2/projects/'.$project->freelancehunt_id.'/bids';
                    $client->post($url, [
                        'headers' => [
                            'Authorization' => "Bearer $freelancehuntToken",
                            'Content-Type' => 'application/json'
                        ],
                        'json' => $data
                    ]);
                    $project->answer = 1;
                    $project->save();
                    break;
                }
                catch (\ErrorException $e){
                    print $e;
                }
            }
        }
    }

}
