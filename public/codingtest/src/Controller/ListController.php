<?php
namespace AppBundle\EventListener;

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Lesson;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {
        return $this->render('blogs/homepage.html.twig');
    }
    /**
     * @Route("list/{id}")
     * @Method({"GET"})
     */
    public function index1($id)
    {
        $rootPath = $this->container->get('kernel')->getRootDir();
        if ($id == 1) {
            $filePath = $rootPath . '/../data/json/jbl-ulse-3-im-test_104454.json';
        }
        if ($id == 2) {
            $filePath = $rootPath . '/../data/json/teufel-real-blue-im-test_104508.json';
        }
        $contentvar = file_get_contents($filePath);
        $data = json_decode($contentvar, true);

        if ($data) {
            try {
                $entityManager = $this->getDoctrine()->getManager();
                $checkexists = $this->getDoctrine()->getRepository(Blog::class)->findBy(array('urlid' => $data['urlId']));
                if (empty($checkexists)) {
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
            } catch (UniqueConstraintViolationException $e) {
                $this->getDoctrine()->resetManager();
            }

            if (empty($checkexists)) {
                $lastinsertedId = $blog->getId();
                $checkexistsLesson = $this->getDoctrine()->getRepository(Lesson::class)->findBy(array('blogkey' => $lastinsertedId));
                if (empty($checkexistsLesson)) {
                    $chapt = $data['chapters'];
                    dump($data['chapters']);
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
                        $entityManager->persist($chapters);
                        $entityManager->flush();

                    }
                }
            }
        }
        $blogs = $this->getDoctrine()->getRepository(Blog::class)->findAll(array('distinct' => true));
        if ($data) {
            return $this->render('blogs/index.html.twig', array('articles' => $blogs));
        } else {
            return $this->render('blogs/index.html.twig', array('articles' => ''));
        }
    }
}
