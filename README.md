A library that can help you to distribute .ipa and .apk package files over the air


# Example usage in a Symfony project for an Apple device UDID request
```php
/**
 * Class BetaDownloadController
 * @package AppBundle\Controller
 * @Route("/beta-download")
 */
class BetaDownloadController extends Controller
{
    /**
     * Sends out an certificate which requests the device to send back it's UDID
     * @Route("/apple-profile-request", name="apple-profile-request")
     */
    public function appleProfileRequestAction(Request $request)
    {
        $response = AppleResponseFactory::createProfileRequestResponse(
            (new AppleProfileRequest())
            ->setProfileReceiverUrl(
                $this->generateUrl("apple-profile-request-receiver", [], UrlGeneratorInterface::ABSOLUTE_URL)
            )
            ->setDeviceAttributes([AppleProfileRequest::DEVICE_ATTRIBUTE_UDID])
            ->setOrganization("Acme Corp.")
            ->setDisplayName("Request UDID")
            ->setIdentifier("com.acme.app")
            ->setDescription("UDID Request")
        );

        return $response;
    }

    /**
     * Receive the UDID form the device and redirect to a content page making the UDID accessable as GET parameter
     * @Route("/apple-profile-request-receiver", name="apple-profile-request-receiver")
     */
    public function appleProfileRequestReceiver(Request $request)
    {
        $profileRequest = AppleRequestFactory::parseProfileRequest($request);

        return new RedirectResponse(
            $this->generateUrl(
                "apple-download-request",
                [
                    'UDID' => $profileRequest->getUdid()
                ]
            )
        );
    }

    /**
     * @Route("/apple-download-request", name="apple-download-request")
     */
    public function appleDownloadRequest(Request $request) {

        return new Response("Your UDID: " . $request->get('UDID'));

    }


}
```

