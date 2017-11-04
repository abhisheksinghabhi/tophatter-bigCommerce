<?php
namespace frontend\modules\tophatter\components;

use DOMDocument;
use XMLReader;
use yii\base\Component;

class XmlValidator extends Component
{
    protected $xmlFile;

    protected $xsdFile;

    public function setXMLFile($xmlFile)
    {
        if (!is_file($xmlFile)) {
            throw new \Exception(sprintf('XML file `%s` not found.', $xmlFile));
        }
        $this->xmlFile = $xmlFile;

        return $this;
    }

    public function setXSDFile($xsdFile)
    {
        if (!is_file($xsdFile)) {
            throw new \Exception(sprintf('XSD file `%s` not found.', $xsdFile));
        }
        $this->xsdFile = $xsdFile;

        return $this;
    }

    public function validate()
    {
        libxml_use_internal_errors(true);

        if (!$this->xmlFile) {
            throw new \Exception('You must provide a XSD file with XSDValidator::setXSDFile.');
        }

        $reader = new XMLReader();
        $reader->open($this->xmlFile);
        
        $reader->setParserProperty(XMLReader::VALIDATE, true);

        //validating xml
        if (!$reader->isValid()) {
            $errors = $this->getXMLErrorsString();
            throw new \Exception(sprintf("Document `%s` is not valid :\n%s", $this->xmlFile, $errors));
        }

        //validating with xsd
        $xml = new DOMDocument(); 
        $xml->load($this->xmlFile); 

        if (!$this->xsdFile) {
            throw new \Exception('You must provide a XSD file with XSDValidator::setXSDFile.');
        }

        if (!$xml->schemaValidate($this->xsdFile)) {
            $errors = $this->getXMLErrorsString();
            throw new \Exception(sprintf("Document `%s` does not validate XSD file :\n%s", $this->xmlFile, $errors));
        }

        //return $this;
        return true;
    }

    public function getXMLErrorsString()
    {
        $errorsString = '';
        $errors = libxml_get_errors();

        foreach ($errors as $key => $error) {
            $level = $error->level === LIBXML_ERR_WARNING? 'Warning' : $error->level === LIBXML_ERR_ERROR? 'Error' : 'Fatal';
            $errorsString .= sprintf("    [%s] %s", $level, $error->message);

            if($error->file) {
                $errorsString .= sprintf("    in %s (line %s, col %s)", $error->file, $error->line, $error->column);
            }

            $errorsString .= "\n";
        }

        return $errorsString;
    }

     public function setXMLString($xmlString)
    {
        if (empty($xmlString)) {
            throw new \Exception('XML string is empty.');
        }
        $this->xmlString = $xmlString;

        return $this;
    }

    public function validateString()
    {
        libxml_use_internal_errors(true);

        if (!$this->xmlString) {
            throw new \Exception('You must provide a XML data with XSDValidator::setXMLString.');
        }

        $reader = new XMLReader();
        $reader->xml($this->xmlString);
        
        $reader->setParserProperty(XMLReader::VALIDATE, true);

        //validating xml
        if (!$reader->isValid()) {
            $errors = $this->getXMLErrorsString();
            throw new \Exception(sprintf("XML Document is not valid :\n%s", $errors));
        }

        //validating with xsd
        $xml = new DOMDocument(); 
        $xml->loadXML($this->xmlString); 

        if (!$this->xsdFile) {
            throw new \Exception('You must provide a XSD file with XSDValidator::setXSDFile.');
        }

        if (!$xml->schemaValidate($this->xsdFile)) {
            $errors = $this->getXMLErrorsString();
            $errors = str_replace('{http://tophatter.com/}', '', $errors);
            throw new \Exception($errors);
        }

        return true;
    }
}
