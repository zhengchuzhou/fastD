<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/3/14
 * Time: 下午3:23
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

namespace Welcome\Events;

use FastD\Protocol\Http\JsonResponse;
use FastD\Protocol\Http\Request;
use Kernel\Events\TemplateEvent;

/**
 * Class IndexController
 *
 * @package Welcome\Controllers
 */
class Index extends TemplateEvent
{
    public function welcomeAction()
    {
        return 'welcome';
    }

    public function viewAction()
    {
        return $this->render('welcome/welcome.html.twig');
    }

    public function oneAction(Request $request)
    {
        return new JsonResponse($request->header->all());
    }

    public function twoAction(Request $request)
    {
        return $request->createRequest($this->generateUrl('/one'))->delete();
    }

    public function uploadAction(Request $request)
    {
        $files = $request
            ->getUploader([
                'save.path' => $this->get('kernel')->getRootPath().'/storage/cache',
                'max.size' => '10M',
            ])
            ->uploading()
            ->getUploadFiles();

        return new JsonResponse($files);
    }
}