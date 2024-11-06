<?php
    require_once 'cache.class.php';
    
    // setup 'default' cache
    $c = new Cache();
?>

<?php
    // store a string
    $c->store('hello', 'Hello World!');
    
    // generate a new cache file with the name 'newcache'
    $c->setCache('newcache');

    // get cache path
    $defaultPath = $c->getCachePath();

    // set cache path
    $c->setCachePath($defaultPath.'property/');

    // store an array
    $c->store('movies', array(
        'description' => 'Movies on TV',
        'action' => array(
            'Tropic Thunder',
            'Bad Boys',
            'Crank'
        )
    ));
    
    // get cached data by its key
    $result = $c->retrieve('movies');
    
    // display the cached array
    echo '<pre>';
    print_r($result);
    echo '<pre>';
    
    // grab array entry
    $description = $result['description'];

    // store an array
    for($i=0; $i < 100; $i++){
        $c->store('movies'.$i, array(
            'description' => 'Movies on TV',
            'action' => array(
                'Tropic Thunder',
                'Bad Boys',
                'Crank'
            )
        ));
    }

    // display the all cache array
    $results = $c->retrieveAll();

    // display last 10 cache array
    $lastElems = array_slice($results, -10, 10);
    var_dump($lastElems);

    // display last 10 cache array reverse
    $lastElems = $array_reverse($lastElems);
    var_dump($lastElems);
    
    // switch back to the first cache
    $c->setCache('mycache');
    
    // update entry by simply overwriting an existing key
    $c->store('hello', 'Hello everybody out there!');
    
    // erase entry by its key
    $c->erase('hello');
?>

