<?php
namespace MobileAppPackagingTools;

use CFPropertyList\CFPropertyList;
use CFPropertyList\CFTypeDetector;
use Symfony\Component\HttpFoundation\Response;

class AppleResponseFactory {
    /**
     * @return Response
     * @throws \CFPropertyList\PListException
     */
    public static function createProfileRequest(AppleProfileRequest $profileRequest) {
        $response   = new Response();
        $plist      = new CFPropertyList();

        $structure = [
            'PayloadContent'        => [
                'URL'               => $profileRequest->getProfileReceiverUrl(),
                'DeviceAttributes'  => $profileRequest->getDeviceAttributes()
            ],
            'PayloadOrganization'   => $profileRequest->getOrganization(),
            'PayloadDisplayName'    => $profileRequest->getDisplayName(),
            'PayloadIdentifier'     => $profileRequest->getIdentifier(),
            'PayloadDescription'    => $profileRequest->getDescription(),
            'PayloadVersion'        => '1',
            'PayloadUUID'           => '9CF421B3-9853-4454-BC8A-982CBD3C907C',
            'PayloadType'           => 'Profile Service'
        ];

        $td = new CFTypeDetector();
        $guessedStructure = $td->toCFType( $structure );
        $plist->add( $guessedStructure );

        $response->headers->set('Content-Type', 'application/x-apple-aspen-config; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="profile.mobileconfig"');
        $response->setContent($plist->toXML(true));

        return $response;
    }

}