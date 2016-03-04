<?php
namespace MobileAppPackagingTools;

use CFPropertyList\CFPropertyList;
use CFPropertyList\CFTypeDetector;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class AppleResponseFactory {
    /**
     * @param $manifestUrl
     * @return RedirectResponse
     */
    public static function createDownloadManifestResponse($manifestUrl)
    {
        return new RedirectResponse(
            'itms-services://?action=download-manifest&url=' . $manifestUrl
        );
    }

    /**
     * @param $filename
     * @return Response
     */
    public static function createIpaDownloadResponse($filename) {
        $response = new Response();

        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Content-Type', 'application/octet-stream');

        $response->setContent(file_get_contents($filename));

        return $response;
    }

    /**
     * @return Response
     * @throws \CFPropertyList\PListException
     * @throws \Exception
     */
    public static function createManifestResponse(AppleOTAManifest $appleOTAManifest) {
        $response   = new Response();
        $plist      = new CFPropertyList();

        $structure =
            [
                'items' => [
                    [
                        'assets' => [
                            [
                                'kind'  => 'software-package',
                                'url'   => $appleOTAManifest->getSoftwarePackageUrl()
                            ]
                            //display-image, full-size-image
                        ],

                        'metadata' => [
                            'kind'              => 'software',
                            'bundle-identifier' => $appleOTAManifest->getBundleIdentifier(),
                            'bundle-version'    => $appleOTAManifest->getBundleVersion(),
                            'title'             => $appleOTAManifest->getTitle()
                        ]
                    ]
                ]
            ];

        $td = new CFTypeDetector();
        $guessedStructure = $td->toCFType( $structure );
        $plist->add( $guessedStructure );

        $response->headers->set('Content-Type', 'application/x-plist; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment; filename="Manifest.plist"');
        $response->setContent($plist->toXML(true));

        return $response;
    }

    /**
     * @return Response
     * @throws \CFPropertyList\PListException
     */
    public static function createProfileRequestResponse(AppleProfileRequest $profileRequest) {
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
        $response->headers->set('Content-Disposition', 'attachment; filename="profilerequest.mobileconfig"');
        $response->setContent($plist->toXML(true));

        return $response;
    }

}