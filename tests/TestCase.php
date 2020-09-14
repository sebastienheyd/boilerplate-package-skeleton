<?php

namespace ~uc:vendor\~uc:package\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Setup before each test.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Tear down after each test.
     *
     * @return  void
     */
    public function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Tell Testbench to use this package.
     *
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['~uc:vendor\~uc:package\~uc:packageServiceProvider'];
    }
}
