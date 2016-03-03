<?php
namespace MobileAppPackagingTools;

use CFPropertyList\CFPropertyList;

class IPAPackage {
    protected $filename;

    /**
     * @var ZipArchive
     */
    protected $za;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function open() {
        $this->za = new \ZipArchive();
        $res = $this->za->open($this->filename);

        if($res !== true) {
            throw new \Exception("Could not open ipa file " . $this->filename);
        }
    }

    public function getFile($filename) {
        $contents = "";

        for( $i = 0; $i < $this->za->numFiles; $i++ ){
            $stat = $this->za->statIndex( $i );

            $basename = basename($stat['name']);

            if($basename == $filename) {
                $fp = $this->za->getStream($stat['name']);
                if(!$fp) {
                    throw new \Exception("Could not find " . $filename . " in IPA package");
                }

                while (!feof($fp)) {
                    $contents .= fread($fp, 1024);
                }

                fclose($fp);

                break;
            }
        }

        return $contents;
    }

    public function extractPlist($filename, $format = CFPropertyList::FORMAT_XML) {
        $data = $this->getFile($filename);

        $plistBegin   = '<?xml version="1.0"';
        $plistEnd   = '</plist>';

        $pos1 = strpos($data, $plistBegin);
        $pos2 = strpos($data, $plistEnd);

        if($pos1 && $pos2) {
            //if it's a Plist in a DER encoded certificate extract it
            $plistData = substr ($data, $pos1, $pos2 - $pos1 + strlen($plistEnd));
        } else {
            $plistData = $data;
        }

        $plist = new CFPropertyList();
        $plist->parse($plistData, $format);

        $plistArray = $plist->toArray();

        return $plistArray;
    }

    public function close() {
        $this->za->close();
    }

    public function extractProvisioningProfile() {
        return $this->extractPlist('embedded.mobileprovision');
    }

    public function extractItunesMetadata() {
        return $this->extractPlist('iTunesMetadata.plist');
    }

    public function extractInfo() {
        return $this->extractPlist('Info.plist', CFPropertyList::FORMAT_BINARY);
    }
}
