<?php // closed project site component 

    // get projects list object from controller
    $closedProjects = $projectsController->getProjectsWhereStatus("closed"); 

    // print all closed project to element
    foreach ($closedProjects as $data) {

        // get information form object
        $name = $data["name"];
        $description = $data["description"];
        $technology = $data["technology"];
        $github_link = $data["github_link"];

        // build item elemen
        if ($github_link == "none" or empty($github_link) or $github_link == null) {

            // element with github link
            $element = '
                <div class="projects-item">
                    <h4>'.$name.'</h4>
                    <p><em>'.$description.'</em></p>
                    <p><ul>
                        <li>Technology: '.$technology.'</li>
                    </ul></p>
                </div>
            ';
        } else {

            // element withou github link
            $element = '
                <div class="projects-item">
                    <h4>'.$name.'</h4>
                    <p><em>'.$description.'</em></p>
                    <p><ul>
                        <li>Technology: '.$technology.'</li>
                        <li>Source: <a href="'.$github_link.'" target="_blank">source </a>on github</li>
                    </ul></p>
                </div>
            ';
        }

        // print element
        echo $element;
    }
?>