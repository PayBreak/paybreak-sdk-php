<?php
/*
 * This file is part of the PayBreak/paybreak-sdk-php package.
 *
 * (c) PayBreak <dev@paybreak.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PayBreak\Sdk\Gateways;

use PayBreak\Sdk\ApiClient\ApiClientFactoryInterface;
use Psr\Log\LoggerInterface;
use WNowicki\Generic\Logger\PsrLoggerTrait;
use WNowicki\Generic\Exception;
use PayBreak\ApiClient\ErrorResponseException;

/**
 * Abstract Gateway
 *
 * @author WN
 * @package PayBreak\Sdk\Gateways
 */
abstract class AbstractGateway
{
    use PsrLoggerTrait;

    private $apiFactory;
    private $logger;

    /**
     * @author WN
     * @param ApiClientFactoryInterface $factory
     * @param LoggerInterface $logger
     */
    public function __construct(ApiClientFactoryInterface $factory, LoggerInterface $logger = null)
    {
        $this->apiFactory = $factory;
        $this->logger = $logger;
    }

    /**
     * @author WN
     * @return ApiClientFactoryInterface
     */
    protected function getApiFactory()
    {
        return $this->apiFactory;
    }

    /**
     * @author EB
     * @param $type
     * @param $documentPath
     * @param $token
     * @param $documentName
     * @param array $query
     * @param array $body
     * @return array
     * @throws Exception
     */
    private function makeRequestForDocument($type, $documentPath, $token, $documentName, array $query, array $body = [])
    {
        try {
            return $this->makeRequest($type, $documentPath, $token, $query, $body);
        } catch (ErrorResponseException $e) {
            throw new Exception($e->getMessage());
        } catch (\Exception $e) {
            $this->logError(
                $documentName . 'Gateway::' . $type .' '. $documentName . '[' . $e->getCode() . ']: ' . $e->getMessage()
            );
            throw new Exception('Problem with '.$type. ': ' . $documentName . ' data form Provider API');
        }
    }

    /**
     * @author EB
     * @param $type
     * @param $documentPath
     * @param $token
     * @param array $query
     * @param array $body
     * @return array
     */
    private function makeRequest($type, $documentPath, $token, array $query, array $body = [])
    {
        $api = $this->getApiFactory()->makeApiClient($token);

        switch ($type) {
            case 'post':
                return $api->post($documentPath, $body, $query);
            case 'delete':
                return $api->delete($documentPath, $query);
            case 'patch':
                return $api->patch($documentPath, $body, $query);
            default:
                return $api->get($documentPath, $query);
        }
    }

    /**
     * @author WN
     * @param $documentPath
     * @param $token
     * @param $documentName
     * @param array $query
     * @return array
     * @throws Exception
     */
    protected function fetchDocument($documentPath, $token, $documentName, array $query = [])
    {
        return $this->makeRequestForDocument('get', $documentPath, $token, $documentName, $query);
    }

    /**
     * @author EB
     * @param $documentPath
     * @param array $body
     * @param $token
     * @param $documentName
     * @return array
     * @throws Exception
     */
    protected function postDocument($documentPath, array $body = [], $token, $documentName)
    {
        return $this->makeRequestForDocument('post', $documentPath, $token, $documentName, [], $body);
    }

    /**
     * @author EB
     * @param $documentPath
     * @param $token
     * @param $documentName
     * @param array $body
     * @return array
     * @throws Exception
     */
    protected function patchDocument($documentPath, $token, $documentName, array $body = [])
    {
        return $this->makeRequestForDocument('patch', $documentPath, $token, $documentName, [], $body);
    }

    /**
     * @author LH
     * @param $token
     * @param $url
     * @param $entity
     * @return array
     * @throws Exception
     */
    public function fetchCollection($token, $url, $entity)
    {
        $api = $this->getApiFactory()->makeApiClient($token);

        try {
            $data = $api->get($url);
            $rtn = [];

            foreach ($data as $item) {
                $rtn[] = $entity::make($item);
            }

            return $rtn;
        } catch (ErrorResponseException $e) {
            throw new Exception($e->getMessage());
        } catch (\Exception $e) {
            $this->logError('Couldn\'t fetch collection of [' . $entity . ']: [' . $e->getCode() . ']: ' . $e->getMessage());
            throw new Exception('Problem fetching collection of [' . $entity . '] form Provider API');
        }
    }

    /**
     * @author EB
     * @param $documentPath
     * @param $token
     * @param $documentName
     * @return array
     * @throws Exception
     */
    protected function deleteDocument($documentPath, $token, $documentName)
    {
        return $this->makeRequestForDocument('delete', $documentPath, $token, $documentName, $query = []);
    }

    /**
     * @author WN
     * @return \Psr\Log\LoggerInterface|null
     */
    protected function getLogger()
    {
        return $this->logger;
    }
}
