<?php
$filename = __DIR__ . DIRECTORY_SEPARATOR . 'posts.json';

$posts = [
    [
        'title' => 'Musicurao alla Maker Faire EU 2019',
        'content' => 'Continua il successo dei ragazzi della "robotica" del liceo scientifico "Galileo Galilei" di
        Catania. Dopo i traguardi, nazionali ed europei, raggiunti nella RoboCup Junior 2019 la squadra di
        robotica è stata invitata a presentare il proprio progetto a Roma al Maker Faire 2019.
        Alla Fiera di Roma, padiglione 5, stand D45, gli alunni del Galilei, Belfiore Daniele,
        Cilibrasi Chiara, Conte francesco, DAntoni Leonardo, Pappalardo Giulia, Persico Marcello, sono
        stati impegnati dal 18 al 20 ottobre a descrivere e mostrare il funzionamento del progetto: un robot
        pianista costruito utilizzando dei kits LEGO Mindstorm, programmati in SmallBasic, composto
        da due mani che scorrono su una rotaia per poter suonare. Tramite i “mattoncini LEGO
        intelligenti” EV3, 12 servo-motori e 2 sensori a ultrasuoni, le mani possono realmente suonare una
        tastiera. Questa creazione ha incuriosito centinaia di visitatori della fiera che hanno rivolto una serie
        di domande ai creatori del progetto che per tre giorni sono diventati protagonisti tra centinaia di
        espositori presenti nei 10 padiglioni allestiti per lo evento. Anche la RAI, e non solo, si è interessata
        al progetto e le riprese e le interviste effettuate saranno mandate in onda prossimamente su Rai Gulp
        durante il programma televisivo Rob-O-Cod. Alcuni alunni sono stati, anche, impegnati, nello stand
        della “Romecup”, per la simulazione di una gara di “Rescue line”.
        La robotica è ormai una realtà consolidata nel liceo, il progetto di "robotica", seguito dai
        proff. Scandura e Arcifa, inserito nel PTOF della scuola si svolge come attività extracurriculare. La
        cosa che rende la robotica interessante e istruttiva è che permette agli alunni di progettare, costruire
        e programmare un robot per svolgere vari compiti.
        La robotica, inoltre, consolida la didattica laboratoriale, stimola lo sviluppo di competenze
        trasversali e digitali, permette di sperimentare percorsi interdisciplinari con particolare riferimento
        allo apprendimento in STEM (Science - Technology - Engineering - Mathematics).'

    ],
    [
        'title' => 'Musicurao alla RoboCupEURO2019 di Hannover',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quo omnis, accusantium reprehenderit natus accusamus quaerat sit nulla officiis dignissimos officia possimus laborum at quidem facilis suscipit cum voluptatibus dicta?',
        'img' => 'view\maya.jpg',
        'width' => '100',
        'height' => '100',
    ]
];


file_put_contents($filename, json_encode($posts));

function getAllPosts()
{
    $filename = __DIR__ . DIRECTORY_SEPARATOR . 'posts.json';
    $rawData = file_get_contents($filename);
    $data = json_decode($rawData, true);
    return $data;
}
