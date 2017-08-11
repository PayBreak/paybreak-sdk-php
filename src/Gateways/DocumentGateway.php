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

/**
 * Class DocumentGateway
 *
 * @author GK
 * @package PayBreak\Sdk\Gateways
 */
class DocumentGateway extends AbstractGateway
{
    /**
     * @author GK, EB
     * @param string $token
     * @param string $installation
     * @param int $application
     * @return array
     */
    public function getAvailableDocuments($token, $installation, $application)
    {
        try {
            return $this->fetchDocument(
                '/v4/installations/' . $installation . '/applications/' . $application . '/documents',
                $token,
                'Documents'
            );
        } catch (\Exception $e) {
            $this->logWarning('Could not fetch document: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * @author GK
     * @param string $token
     * @param string $installation
     * @param int $application
     * @return array
     */
    public function getAgreementPdf($token, $installation, $application)
    {
        $document = $this->fetchDocument(
            '/v4/installations/' . $installation . '/applications/' . $application . '/agreement',
            $token,
            'Agreement Pdf'
        );

        return $document['pdf'];
    }

    /**
     * @author GK
     * @param string $token
     * @param string $installation
     * @param int $application
     * @return array
     */
    public function getPreAgreementPdf($token, $installation, $application)
    {
        $document = $this->fetchDocument(
            '/v4/installations/' . $installation . '/applications/' . $application . '/pre-agreement',
            $token,
            'Pre-agreement Pdf'
        );

        return $document['pdf'];
    }

    /**
     * @author GK
     * @param string $token
     * @param string $installation
     * @param int $application
     * @return array
     */
    public function getAdequateExplanation($token, $installation, $application)
    {
        $document = $this->fetchDocument(
            '/v4/installations/' . $installation . '/applications/' . $application . '/adequate-explanation',
            $token,
            'Adequate Explanation Pdf'
        );

        return $document['pdf'];
    }
}
