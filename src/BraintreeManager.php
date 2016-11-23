<?php

/*
 * This file is part of Laravel Braintree.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Braintree;

use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class BraintreeManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var \BrianFaust\Braintree\BraintreeFactory
     */
    private $factory;

    /**
     * Create a new Braintree manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param \BrianFaust\Braintree\BraintreeFactory  $factory
     */
    public function __construct(Repository $config, BraintreeFactory $factory)
    {
        parent::__construct($config);

        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return mixed
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'braintree';
    }

    /**
     * Get the factory instance.
     *
     * @return \BrianFaust\Braintree\BraintreeFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
