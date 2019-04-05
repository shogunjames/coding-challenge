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
        //$filePath = $rootPath . '/../data/json/teufel-real-blue-im-test_104508.json';
        //echo $filePath;
        $contentvar = file_get_contents($filePath);
        /*
        $collectionConstraint = new Assert\Collection(
        array(
        'headline' => new Assert\Type(array('type'=>'integer')),
        'urlid' => new Assert\Type(array('type'=>'string')),
        'value' => new Assert\Type(array('type'=>'double'))
        )
        ); */

        //dump($contentvar);die;
        $data = json_decode($contentvar, true);
        dump($data);

        if ($data) {


            //die;

            try {
                $entityManager = $this->getDoctrine()->getManager();
                //$entityManager->getRepository('Blog::class')->findOneByName($data['urlId']);

                //if (($blog = $entityManager->getRepository('Blog::class')->findOneByName($data['urlId']))==null)
                //{
                $checkexists = $this->getDoctrine()->getRepository(Blog::class)->findBy(array('urlid' => $data['urlId']));
                //dump($checkexists);
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
                //dump($checkexists);
                if (empty($checkexistsLesson)) {

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
                }
            }
        }
        //return new Response('Saved an blog with the id of  '.$blog->getId());

        $blogs = $this->getDoctrine()->getRepository(Blog::class)->findAll(array('distinct' => true));
        if ($data) {
            return $this->render('blogs/index.html.twig', array('articles' => $blogs));
        } else {
            return $this->render('blogs/index.html.twig', array('articles' => ''));
        }

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
