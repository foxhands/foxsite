<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Http;
use Tectalic\OpenAi\ClientException;
use Tectalic\OpenAi\Models\Completions\CreateResponse;
use Tectalic\OpenAi\Authentication;
use Tectalic\OpenAi\Client;
use Tectalic\OpenAi\Manager;


class ProjectsController extends Controller
{
    const FREELANCEHUNT_API_URL = 'https://api.freelancehunt.com/v2/projects?filter[only_my_skills]=1';

    private string $freelancehuntToken = 'e58eb10d97a395a5965c0d65eb5881f93fa0d93a';
    private array $categories = ['PHP', 'Python'];

    public function importProjects(): string
    {
        $projects = $this->getAllProjectsFromFreelancehunt();

        $this->saveProjectsToDatabase($projects);

//        $this->sendProjectsToChatGPT();

        return 'Projects imported successfully';
    }

    private function getAllProjectsFromFreelancehunt(): array
    {
        $projects = [];

        foreach ($this->categories as $category) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->freelancehuntToken,
            ])->get(self::FREELANCEHUNT_API_URL);

            if (isset($response['data'])) {
                $projects = array_merge($projects, $response['data']);
            }
        }

        return $projects;
    }

    private function saveProjectsToDatabase($projects)
    {
        foreach ($projects as $project) {
            Project::updateOrCreate([
                'freelancehunt_id' => $project['id']
            ], [
                'employer_first_name' => $project['attributes']['employer']['first_name'] ?? 'None',
                'employer_last_name' => $project['attributes']['employer']['last_name'] ?? 'None',
                'employer_login' => $project['attributes']['employer']['login'] ?? 'None',
                'title' => $project['attributes']['name'],
                'description' => $project['attributes']['description'],
                'category' => $project['attributes']['skills'][0]['name'],
                'budget' => $project['attributes']['budget']['amount'] ?? 0,
                'deadline' => $project['attributes']['expired_at'],
            ]);
        }
    }
}
