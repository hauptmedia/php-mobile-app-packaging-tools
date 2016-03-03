<?php
namespace MobileAppPackagingTools;

class AppleProfileRequest {
    const DEVICE_ATTRIBUTE_UDID             = 'UDID';
    const DEVICE_ATTRIBUTE_IMEI             = 'IMEI';
    const DEVICE_ATTRIBUTE_ICCID            = 'ICCID';
    const DEVICE_ATTRIBUTE_VERSION          = 'VERSION';
    const DEVICE_ATTRIBUTE_PRODUCT          = 'PRODUCT';
    const DEVICE_ATTRIBUTE_MEID             = 'MEID';
    const DEVICE_ATTRIBUTE_DEVICE_NAME      = 'DEVICE_NAME';
    const DEVICE_ATTRIBUTE_IMSI             = 'IMSI';
    const DEVICE_ATTRIBUTE_MAC_ADDRESS_EN0  = 'MAC_ADDRESS_EN0';
    const DEVICE_ATTRIBUTE_SERIAL           = 'SERIAL';

    protected $profileReceiverUrl;

    protected $deviceAttributes = [];

    protected $organization;

    protected $displayName;

    protected $identifier;

    protected $description;

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param mixed $displayName
     * @return AppleProfileRequest
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProfileReceiverUrl()
    {
        return $this->profileReceiverUrl;
    }

    /**
     * @param mixed $profileReceiverUrl
     * @return AppleProfileRequest
     */
    public function setProfileReceiverUrl($profileReceiverUrl)
    {
        $this->profileReceiverUrl = $profileReceiverUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeviceAttributes()
    {
        return $this->deviceAttributes;
    }

    /**
     * @param mixed $deviceAttributes
     * @return AppleProfileRequest
     */
    public function setDeviceAttributes($deviceAttributes)
    {
        $this->deviceAttributes = $deviceAttributes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param mixed $organization
     * @return AppleProfileRequest
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     * @return AppleProfileRequest
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return AppleProfileRequest
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}