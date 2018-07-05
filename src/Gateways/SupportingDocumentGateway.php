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
 * Supporting Document Gateway
 *
 * @author EB
 * @package PayBreak\Sdk\Gateways
 */
class SupportingDocumentGateway extends AbstractGateway
{
    /**
     * @author EB
     * @param string $token
     * @param string $installation
     * @param string $application
     * @param string $category
     * @param string $filename
     * @param string $path
     * @return array
     */
    public function getAvailableDocuments($token, $installation, $application, $category, $filename, $path)
    {
        return $this->postDocument(
            '/v4/installations/' . $installation . '/applications/' . $application . '/supporting-documents',
            [
                'category' => $category,
                'filename' => $filename,
                'path' => $path,

            ],
            $token,
            'Supporting documents'
        );
    }
}
