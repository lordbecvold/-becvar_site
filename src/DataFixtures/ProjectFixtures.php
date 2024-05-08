<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

/**
 * Class ProjectFixtures
 *
 * ProjectFixtures loads sample Project data into the database.
 *
 * @package App\DataFixtures
 */
class ProjectFixtures extends Fixture
{
    /**
     * Load project fixtures into the database.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        // projects data
        $projects_data = [
            [
                'name' => 'becvar-site',
                'description' => 'My personal website app built with Symfony framework.',
                'technology' => 'PHP',
                'link' => 'https://github.com/lordbecvold/becvar-site',
                'status' => 'open'
            ],
            [
                'name' => 'becvold-core',
                'description' => 'Basic survival core plugin',
                'technology' => 'Java',
                'link' => 'https://github.com/lordbecvold/becvold-core',
                'status' => 'closed'
            ],
            [
                'name' => 'becwork',
                'description' => 'PHP framework.',
                'technology' => 'PHP',
                'link' => 'https://github.com/lordbecvold/becwork',
                'status' => 'closed'
            ],
            [
                'name' => 'discord-bot',
                'description' => 'Java Discord bot base.',
                'technology' => 'Java',
                'link' => 'https://github.com/lordbecvold/discord-bot',
                'status' => 'closed'
            ],
            [
                'name' => 'dubinek-bot',
                'description' => 'My own discord bot.',
                'technology' => 'Java',
                'link' => 'https://github.com/lordbecvold/dubinek-bot',
                'status' => 'closed'
            ],
            [
                'name' => 'file-share',
                'description' => 'Simple file sharing app',
                'technology' => 'PHP',
                'link' => 'https://github.com/lordbecvold/file-share',
                'status' => 'closed'
            ]
        ];

        // create projects from data array
        foreach ($projects_data as $project_data) {
            $project = new Project();
            $project->setName($project_data['name']);
            $project->setDescription($project_data['description']);
            $project->setTechnology($project_data['technology']);
            $project->setLink($project_data['link']);
            $project->setStatus($project_data['status']);

            $manager->persist($project);
        }

        $manager->flush();
    }
}