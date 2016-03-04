<?php
namespace MobileAppPackagingTools;

use CFPropertyList\CFPropertyList;
use CFPropertyList\CFTypeDetector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppleRequestFactory {
    /**
     * @param Request $request
     * @return AppleProfileResponse|null
     * @throws \CFPropertyList\IOException
     * @throws \CFPropertyList\PListException
     * @throws \DOMException
     */
    public static function parseProfileRequest(Request $request) {
        $response = new AppleProfileResponse();

        $data = $request->getContent();

        $plistBegin   = '<?xml version="1.0"';
        $plistEnd   = '</plist>';

        $pos1 = strpos($data, $plistBegin);
        $pos2 = strpos($data, $plistEnd);

        $plistData = substr ($data, $pos1, $pos2 - $pos1 + strlen($plistEnd));

        $plist = null;

        if($pos1 !== false && $pos2 !== false) {
            $plist = new CFPropertyList();
            $plist->parse($plistData, CFPropertyList::FORMAT_XML);
            $response->setData($plist->toArray());
        }

        return $response;
    }


}