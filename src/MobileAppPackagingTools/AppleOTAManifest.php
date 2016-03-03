<?php
namespace MobileAppPackagingTools;

class AppleOTAManifest {
    protected $softwarePackageUrl;

    protected $bundleIdentifier;

    protected $bundleVersion;

    protected $title;

    /**
     * @return mixed
     */
    public function getSoftwarePackageUrl()
    {
        return $this->softwarePackageUrl;
    }

    /**
     * @param mixed $softwarePackageUrl
     * @return AppleOTAManifest
     */
    public function setSoftwarePackageUrl($softwarePackageUrl)
    {
        $this->softwarePackageUrl = $softwarePackageUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBundleIdentifier()
    {
        return $this->bundleIdentifier;
    }

    /**
     * @param mixed $bundleIdentifier
     * @return AppleOTAManifest
     */
    public function setBundleIdentifier($bundleIdentifier)
    {
        $this->bundleIdentifier = $bundleIdentifier;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBundleVersion()
    {
        return $this->bundleVersion;
    }

    /**
     * @param mixed $bundleVersion
     * @return AppleOTAManifest
     */
    public function setBundleVersion($bundleVersion)
    {
        $this->bundleVersion = $bundleVersion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return AppleOTAManifest
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }


}