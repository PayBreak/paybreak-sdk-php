<?php
/*
 * This file is part of the Graham package.
 *
 * (c) Wojciech Nowicki <wojtek@gettelegramm.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Graham\StandardInterface;

/**
 * Standard Interface EntityInterface
 *
 * @author WN
 * @package Graham\StandardInterface
 */
interface EntityInterface
{
    /**
     * Entity unique ID
     *
     * @param  mixed $id
     * @return mixed
     */
    public function setId($id);

    /**
     * Entity Unique ID
     *
     * @return mixed
     */
    public function getId();
    /**
     * Returns entity as array
     *
     * @return array
     */
    public function toArray();
}
