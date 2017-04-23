<?php
/*
* This file is part of the PayBreak/basket package.
*
* (c) PayBreak <dev@paybreak.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace PayBreak\Sdk\Gateways;

use PayBreak\Sdk\Entities\ApplicationEntity;
use PayBreak\Sdk\SdkException;
use WNowicki\Generic\ApiClient\ErrorResponseException;

/**
 * Application Gateway
 *
 * @author WN
 * @package PayBreak\Sdk\Gateways
 */
class ApplicationGateway extends AbstractGateway
{
    /**
     * @author WN
     * @param int $id
     * @param string $token
     * @return ApplicationEntity
     * @throws SdkException
     */
    public function getApplication($id, $token)
    {
        return ApplicationEntity::make($this->fetchDocument('/v4/applications/' . $id, $token, 'Application'));
    }

    /**
     * @author WN
     * @param ApplicationEntity $application
     * @param string $token
     * @return ApplicationEntity
     * @throws SdkException
     */
    public function initialiseApplication(ApplicationEntity $application, $token)
    {
        $api = $this->getApiFactory()->makeApiClient($token);

        try {
            $response = $api->post('/v4/initialize-application', $application->toArray(true));

            $application->setId($response['application']);
            $application->setResumeUrl($response['url']);

            return $application;

        } catch (ErrorResponseException $e) {

            $this->logWarning('ApplicationGateway::initialiseApplication[' . $e->getCode() . ']: ' . $e->getMessage());
            throw new SdkException($e->getMessage());

        } catch (\Exception $e) {

            $this->logError('ApplicationGateway::initialiseApplication[' . $e->getCode() . ']: ' . $e->getMessage());
            throw new SdkException('Problem Initialising Application on Provider API');
        }
    }

    /**
     * @author EA, EB
     * @param ApplicationEntity $application
     * @param string $token
     * @return ApplicationEntity
     * @throws SdkException
     */
    public function initialiseAssistedApplication(ApplicationEntity $application, $token)
    {
        $api = $this->getApiFactory()->makeApiClient($token);

        try {
            $response = $api->post('/v4/initialize-assisted-application', $application->toArray(true));

            $application->setId($response['application']);
            $application->setResumeUrl($response['url']);
            $application->setUser($response['user']);

            return $application;

        } catch (ErrorResponseException $e) {

            $this->logWarning('ApplicationGateway::initialiseAssistedApplication[' . $e->getCode() . ']: ' . $e->getMessage());
            throw new SdkException($e->getMessage());

        } catch (\Exception $e) {

            $this->logError('ApplicationGateway::initialiseAssistedApplication[' . $e->getCode() . ']: ' . $e->getMessage());
            throw new SdkException('Problem Initialising Assisted Application on Provider API');
        }
    }

    /**
     * @author WN, EB
     * @param int $id
     * @param string $token
     * @param string $reference
     * @return bool
     * @throws SdkException
     */
    public function fulfilApplication($id, $token, $reference = null)
    {
        return $this->requestAction('/v4/applications/' . $id . '/fulfil', ['reference' => $reference], $token);
    }

    /**
     * @param int $id
     * @param string $description
     * @param string $token
     * @return bool
     * @throws SdkException
     */
    public function cancelApplication($id, $description, $token)
    {
        return $this->requestAction(
            '/v4/applications/' . $id . '/request-cancellation',
            ['description' => $description],
            $token
        );
    }

    /**
     * @author JH
     * @param int $installationId
     * @param int $application
     * @param int $amount
     * @param string $description
     * @param string $token
     * @return array
     */
    public function amendOrder($installationId, $application, $amount, $description, $token)
    {
        return $this->postDocument(
            '/v4/installations/' . $installationId . '/applications/' . $application . '/amend',
            [
                'amount' => $amount,
                'description' => $description,
            ],
            $token,
            'Amend Order'
        );
    }

    /**
     * @param $token
     * @return array
     * @throws SdkException
     */
    public function getPendingCancellations($installationId, $token)
    {
        return $this->fetchDocument(
            '/v4/installations/' . $installationId . '/applications',
            $token,
            'Pending Cancellations',
            ['pending-cancellations' => true]
        );
    }

    /**
     * Get Merchant Payments. Filter Params can accept
     * - since, until : (string - ISO8601 Date Part Only)
     * - count, offset : (int)
     *
     * @author SL
     * @param $application
     * @param $token
     * @param array $filterParams
     * @return array
     */
    public function getMerchantPayments($application, $token, array $filterParams = [])
    {
        return $this->fetchDocument(
            '/v4/applications/' . $application . '/merchant-payments',
            $token,
            'Merchant Payments',
            $filterParams
        );
    }

    /**
     * Add a Merchant Payment to the given application. Amount should be supplied in pence.
     *
     * @author SL
     * @param string $application
     * @param \DateTime $effectiveDate
     * @param int $amount
     * @param string $token
     * @return array
     */
    public function addMerchantPayment($application, \DateTime $effectiveDate, $amount, $token)
    {
        return $this->postDocument(
            '/v4/applications/' . $application . '/merchant-payments',
            [
                'amount' => $amount,
                'effective_date' => $effectiveDate->format('Y-m-d'),
            ],
            $token,
            'Add Merchant Payment'
        );
    }

    /**
     * @author EB
     * @param $installationId
     * @param $application
     * @param $token
     * @return array
     */
    public function getApplicationCreditInfo($installationId, $application, $token)
    {
        return $this->postDocument(
            'v4/installations/' . $installationId . '/applications/' . $application . '/get-credit-information',
            [],
            $token,
            'Application Credit Information'
        );
    }

    /**
     * Get application history
     *
     * @author SL
     * @param $application
     * @param $token
     * @return array
     */
    public function getApplicationHistory($application, $token)
    {
        return $this->fetchDocument(
            '/v4/applications/' . $application . '/status-history',
            $token,
            'Application Status History'
        );
    }

    /**
     * @author WN
     * @param string $action
     * @param array $data
     * @param string $token
     * @return bool
     * @throws SdkException
     */
    private function requestAction($action, $data, $token)
    {
        $this->postDocument($action, $data, $token, 'Application');
        return true;
    }
}
