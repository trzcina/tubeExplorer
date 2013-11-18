<?php

namespace MC\TubeExplorerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        $ytp = new YTProvider();
        $items = $ytp->testTube();
        
        return $this->render('MCTubeExplorerBundle:Default:index.html.twig', array('items' => $items));
    }
}
