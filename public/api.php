<?php
require_once "../vendor/dready92/php-on-couch/lib/couch.php";
require_once "../vendor/dready92/php-on-couch/lib/couchClient.php";
require_once "../vendor/dready92/php-on-couch/lib/couchDocument.php";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) )
    $_POST = json_decode(file_get_contents('php://input'), true);

$couch_dsn = "http://localhost:5984/";
$couchdb = "gifs";

$client = new couchClient($couch_dsn, $couchdb);
if ( !$client->databaseExists() )
{
    try
    {
        $result = $client->createDatabase();
    } catch (Exception $e)
    {
        if ( $e instanceof couchException )
        {
            echo "We issued the request, but couch server returned an error.\n";
            echo "We can have HTTP Status code returned by couchDB using \$e->getCode() : " . $e->getCode() . "\n";
            echo "We can have error message returned by couchDB using \$e->getMessage() : " . $e->getMessage() . "\n";
            echo "Finally, we can have CouchDB's complete response body using \$e->getBody() : " . print_r($e->getBody(), true) . "\n";
            echo "Are you sure that your CouchDB server is at $couch_dsn, and that database $couchdb does not exist ?\n";
            exit (1);
        } else
        {
            echo "It seems that something wrong happened. You can have more details using :\n";
            echo "the exception class with get_class(\$e) : " . get_class($e) . "\n";
            echo "the exception error code with \$e->getCode() : " . $e->getCode() . "\n";
            echo "the exception error message with \$e->getMessage() : " . $e->getMessage() . "\n";
            exit (1);
        }
    }
}

switch ($_GET['a'])
{
    case 'all':
        try
        {
            $result = $client->getView('all', 'gifs');
        } catch (Exception $e)
        {
            $view_fn = "function(doc) { emit(null,doc); }";
            $design_doc = new stdClass();
            $design_doc->_id = '_design/all';
            $design_doc->language = 'javascript';
            $design_doc->views = array('gifs' => array('map' => $view_fn));
            $client->storeDoc($design_doc);

            $result = $client->getView('all', 'gifs');
        }
        echo json_encode($result);
        exit;
        break;
    case 'new':
        if(empty($_POST['url'])) return "No Url Provided.";

        $doc = new stdClass();
        $doc->name = !empty($_POST['name']) ? $_POST['name'] : "unnamed";
        $doc->url = $_POST['url'];
        $doc->desc = !empty($_POST['desc']) ? $_POST['desc'] : "no description";

        $ext = pathinfo($doc->url, PATHINFO_EXTENSION);
        if($ext == 'gifv') {
            $doc->url = str_replace('gifv','gif',$doc->url);
            $ext = 'gif';
        }
        $filename = str_replace(' ','_',strtolower($doc->name)).'.'.$ext;
        $doc->filename = $filename;
        $doc->ext = $ext;

        $content_type = getContentType($ext);
        try
        {
            $result = $client->storeDoc($doc);
            if ( $result->ok )
            {
                $doc = $client->getDoc($result->id);
                $img = file_get_contents($doc->url);
                $r = $client->storeAsAttachment($doc, $img, $doc->filename, $content_type);
                if ( $r->ok ) echo "Successfully added new document.";
                else echo "There was an issue.";
            }
        } catch (Exception $e)
        {

        }
        exit;
        break;
}

function getContentType($ext){
    switch($ext){
        case 'gif':
            return 'image/gif';
        case 'gifv' || 'mp4':
            return 'video/mp4';
        case 'webm':
            return 'video/webm';
    }
}