<?php
namespace AppBundle\EventListener;
namespace App\Controller;
use App\Entity\Lesson;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class LessonController extends Controller
{
    /**
     * @Route("/lesson/{id}",name="lesson_show")
     */
    public function show($id)
    {
        $blog1 = $this->getDoctrine()->getRepository(Lesson::class)->findBy(array('blogkey' => $id));
        return $this->render('blogs/show.html.twig', array('blog' => $blog1));
    }
}
