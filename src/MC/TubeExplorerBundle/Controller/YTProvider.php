<?php

namespace MC\TubeExplorerBundle\Controller;
use MC\TubeExplorerBundle\Service;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YTProvider
 *
 * @author Michał
 */



class YTProvider {
    
    public function testTube() {
 
        
        /* Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
        Google APIs Console <http://code.google.com/apis/console#access>
        Please ensure that you have enabled the YouTube Data API for your project. */

        $DEVELOPER_KEY = 'AIzaSyC_nY2NV-mvpEqvJP1YFqKNL2fzY1dOQfk';

        $client = new \Google_Client_Wrapper();
        $client->setDeveloperKey($DEVELOPER_KEY);


        $youtube = new \Google_YouTubeService($client);

        try {
            $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q' => $_GET['q'],
                'type' => 'video',
                'order' => 'date',
                'safeSearch' => 'moderate',
                'regionCode' => 'PL',
                'maxResults' => $_GET['maxResults'],
            ));


        } catch (Google_ServiceException $e) {
            throw new \Exception (sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage())));
        } catch (Google_Exception $e) {
            throw new \Exception (sprintf('<p>A service error occurred: <code>%s</code></p>',htmlspecialchars($e->getMessage())));
    }
    
    return $searchResponse['items'];
   

}


    
    
    
}

?>
