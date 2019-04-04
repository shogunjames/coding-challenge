<?php
namespace AppBundle\EventListener;

namespace App\Controller;

#use App\Entity\Blog;
use App\Entity\Lesson;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LessonController extends Controller
{
    
    /**
     * @Route("/lesson/{id}",name="lesson_show")
     */
    public function show($id)
    {
        
     // $entityManager = $this->getDoctrine()->getManager();
        $blog1 = $this->getDoctrine()->getRepository(Lesson::class)->findBy(array('blogkey' => $id));
        dump($blog1);
      // die;
        return $this->render('blogs/show.html.twig', array('blog' => $blog1));

    }

}
