<?php
namespace MobileAppPackagingTools;

use CFPropertyList\CFPropertyList;
use CFPropertyList\CFTypeDetector;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AndroidResponseFactory {
    /**
     * @param $filename
     * @return Response
     */
    public static function createApkDownloadResponse($filename) {
        $response = new Response();

        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Content-Type', 'application/vnd.android.package-archive; charset=utf-8');

        $response->setContent(file_get_contents($filename));

        return $response;
    }


}