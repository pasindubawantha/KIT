<?php 

class HttpRequest
{
    private $_httpRequest;

    public function __construct($httpRequest)
    {
        $this->_httpRequest = $httpRequest;
    }

    public function setUrl($url)
    {
        $this->_httpRequest->setUrl($url);
    }
    
    public function send(array $data = array())
    {
        $this->_httpRequest->addQueryData($data);
        try {
            $this->_httpRequest->send();
            if ($this->_httpRequest->getResponseCode() == 200) {
                return json_decode($this->_httpRequest->getResponseBody(), true);
            }
            return array();
        } catch (\HttpException $exception) {
            return false;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}


<?php
require 'HttpRequest.php';
class HttpRequestTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->_httpRequestMock = $this->getMockBuilder('\HttpRequest')
            ->setMethods(array(
                'setUrl', 'addQueryData', 'send', 'getResponseCode', 'getResponseBody'
            ))
            ->disableOriginalConstructor()
            ->getMock();

        $this->_httpRequestMock->expects($this->once())
            ->method('setUrl');

        $this->_httpRequestMock->expects($this->once())
            ->method('addQueryData');

        $this->_httpRequestMock->expects($this->once())
            ->method('send');
    }
    
    public function test_sendShouldReturnData()
    {   

        $expectedValue = json_encode(array(
            'test' => true
        ));
        
        $this->_httpRequestMock->expects($this->once())
            ->method('getResponseCode')
            ->will($this->returnValue(200));
        
        $this->_httpRequestMock->expects($this->once())
            ->method('getResponseBody')
            ->will($this->returnValue($expectedValue));

        $httpRequest = new HttpRequest($this->_httpRequestMock);
        $originalUrl = 'OriginalUrl';
        $httpRequest->setUrl($originalUrl);

        $response = $httpRequest->send();
        $this->assertTrue(isset($response['test']));
        $this->assertTrue($response['test']);
    }
    
    public function test_sendFailAndShouldReturnFalse()
    {   

        $expectedValue = json_encode(array(
            'test' => true
        ));
        
        $this->_httpRequestMock->expects($this->once())
            ->method('getResponseCode')
            ->will($this->returnValue(404));
        
        $httpRequest = new HttpRequest($this->_httpRequestMock);
        $originalUrl = 'OriginalUrl';
        $httpRequest->setUrl($originalUrl);

        $response = $httpRequest->send();
        $this->assertEquals(0, count($responset));
    }
    
    public function test_sendWithParamsShouldReturnData()
    {

        $expectedValue = json_encode(array(
            'test' => true
        ));
        
        $this->_httpRequestMock->expects($this->once())
            ->method('getResponseCode')
            ->will($this->returnValue(200));
        
        $this->_httpRequestMock->expects($this->once())
            ->method('getResponseBody')
            ->will($this->returnValue($expectedValue));

        $httpRequest = new HttpRequest($this->_httpRequestMock);
        $originalUrl = 'OriginalUrl';
        $httpRequest->setUrl($originalUrl);

        $response = $httpRequest->send(array('test' => 'true'));
        $this->assertTrue(isset($response['test']));
        $this->assertTrue($response['test']);
    }
}