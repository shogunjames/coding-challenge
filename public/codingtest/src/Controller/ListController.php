<?php
namespace AppBundle\EventListener;

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Lesson;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {

        $rootPath = $this->container->get('kernel')->getRootDir();
        $filePath = $rootPath . '/../data/json/jbl-ulse-3-im-test_104454.json';
        //echo $filePath;
        $contentvar = file_get_contents($filePath);
        dump($contentvar);
        $data = json_decode($contentvar, true);
        dump($data);
        //die;

        try {
            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->getRepository('Blog::class')->findOneByName($data['urlId']);

            //if (($blog = $entityManager->getRepository('Blog::class')->findOneByName($data['urlId']))==null)
        //{
                
                $blog = new Blog();

                $blog->setHeadline($data['headline']);
                $blog->setUrlId($data['urlId']);
                $blog->setUrlslug($data['urlSlug']);

                $blog->setSubtitle($data['subtitle']);
                $blog->setIntroductiontext($data['introduction']);

                $blog->setDisplayDate($data['displayDate']['timestamp']);

                $blog->setAuthorid($data['author']['id']);

                $blog->setAuthorfirstname($data['author']['firstName']);

                $blog->setAuthorlastname($data['author']['lastName']);

                $blog->setImageid($data['image']['id']);

                $blog->setHeight($data['image']['height']);

                $blog->setWidth($data['image']['width']);

                $blog->setImagetext($data['image']['text']);

                $blog->setUrl($data['image']['url']);

                $blog->setSource($data['image']['source']);

                $entityManager->persist($blog);

                $entityManager->flush();
                }
           // }
        catch (UniqueConstraintViolationException $e) {
                $this->getDoctrine()->resetManager();
          }
        

        $lastinsertedId = $blog->getId();



        $chapt = $data['chapters'];
        dump($data['chapters']);
        // die;

        foreach ($chapt as $chapter) {
            $chapters = new Lesson();
            $chapters->setChaptersorder($chapter['id']);

            $chapters->setBlogkey($lastinsertedId);

            $chapters->setChaptersheadline($chapter['headline']);

            $chapters->setChapterstext($chapter['text']);
            if ($chapter['image']) {

                $chapters->setChapterimageid($chapter['image']['id']);

                $chapters->setChapterimageheight($chapter['image']['height']);

                $chapters->setChapterimagewidth($chapter['image']['width']);

                $chapters->setChapterimagetext($chapter['image']['text']);

                $chapters->setChapterimageurl($chapter['image']['url']);

                $chapters->setChapterimagesource($chapter['image']['source']);

            }

            //dump($chapters);

            dump($chapter['image']);

            $entityManager->persist($chapters);
            $entityManager->flush();

        }

        //return new Response('Saved an blog with the id of  '.$blog->getId());

        $blogs = $this->getDoctrine()->getRepository(Blog::class)->findAll(array('distinct' => true));
        return $this->render('blogs/index.html.twig', array('articles' => $blogs));

    }

    /**
     * @Route("/blog/save")
     */
    public function save()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $blog = new Blog();
        $blog->setHeadline('blog one');

        $blog->setUrlId('urlid');

        $blog->setUrlslug('urslug name');
        $entityManager->persist($blog);

        $entityManager->flush();
        return new Response('Saved an blog with the id of  ' . $blog->getId());

    }

    /**
     * @Route("/chapters/{id}",name="chapters_show")
     */
    /* public function show($id)
    {
     // $entityManager = $this->getDoctrine()->getManager();
        $blog1 = $this->getDoctrine()->getRepository(Chapters::class)->find($id);
        //dump($blog1);die;
        return $this->render('blogs/show.html.twig', array('blog' => $blog1));

    }
 */
}
