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

/**
 * Class DictionaryGateway
 *
 * @author EA
 * @package PayBreak\Sdk\Gateways
 */
class DictionaryGateway extends AbstractGateway
{
    /**
     * @author EA
     * @param $token
     * @return array
     */
    public function getEmploymentStatuses($token)
    {
        return $this->fetchDocument(
            '/v4/dictionaries/employment-status',
            $token,
            'Dictionary Employment Status'
        );
    }

    /**
     * @author EA
     * @param $token
     * @return array
     */
    public function getMaritalStatuses($token)
    {
        return $this->fetchDocument(
            '/v4/dictionaries/marital-status',
            $token,
            'Dictionary Martial Status'
        );
    }

    /**
     * @author EA
     * @param $token
     * @return array
     */
    public function getResidentialStatuses($token)
    {
        return $this->fetchDocument(
            '/v4/dictionaries/residential-status',
            $token,
            'Dictionary Residential Status'
        );
    }

    /**
     * @author EB
     * @param $token
     * @return array
     */
    public function getUploadDocumentTypes($token)
    {
        return $this->fetchDocument(
            '/v4/dictionaries/upload-document-types',
            $token,
            'Dictionary Document Upload Types'
        );
    }
}
