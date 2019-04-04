<?php
namespace AppBundle\EventListener;

namespace App\Controller;

#use App\Entity\Blog;
use App\Entity\Chapters;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChaptersController extends Controller
{
    
    /**
     * @Route("/chapters/{id}",name="chapters_show")
     */
    public function show($id)
    {
        echo "reached here";
     // $entityManager = $this->getDoctrine()->getManager();
        $blog1 = $this->getDoctrine()->getRepository(Chapters::class)->find($id);
        dump($blog1);die;
        return $this->render('blogs/show.html.twig', array('blog' => $blog1));

    }

}
