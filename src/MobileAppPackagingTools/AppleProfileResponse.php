<?php
namespace MobileAppPackagingTools;

class AppleProfileResponse {
    protected $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getUdid()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_UDID, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_UDID] : NULL;
    }

    /**
     * @return mixed
     */
    public function getImei()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_IMEI, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_IMEI] : NULL;
    }

    /**
     * @return mixed
     */
    public function getIccid()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_ICCID, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_ICCID] : NULL;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_VERSION, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_VERSION] : NULL;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_PRODUCT, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_PRODUCT] : NULL;
    }

    /**
     * @return mixed
     */
    public function getMeid()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_MEID, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_MEID] : NULL;
    }

    /**
     * @return mixed
     */
    public function getDeviceName()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_DEVICE_NAME, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_DEVICE_NAME] : NULL;
    }

    /**
     * @return mixed
     */
    public function getImsi()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_IMSI, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_IMSI] : NULL;
    }

    /**
     * @return mixed
     */
    public function getMacAddressEn0()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_MAC_ADDRESS_EN0, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_MAC_ADDRESS_EN0] : NULL;
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        return array_key_exists(AppleProfileRequest::DEVICE_ATTRIBUTE_SERIAL, $this->data) ?
            $this->data[AppleProfileRequest::DEVICE_ATTRIBUTE_SERIAL] : NULL;
    }
}