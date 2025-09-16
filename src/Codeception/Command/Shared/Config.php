<?php
namespace Codeception\Command\Shared;
use Codeception\Configuration;

trait Config
{
    protected function getSuiteConfig($suite, $conf)
    {
        // Allow only alphanumeric, underscore, and dash
        if (!preg_match('/^[\w\-]+$/', $suite)) {
            throw new \InvalidArgumentException("Invalid suite name.");
        }
        if (!preg_match('/^[\w\-\.\/]+$/', $conf)) {
            throw new \InvalidArgumentException("Invalid config path.");
        }
        $config = Configuration::config($conf);
        return Configuration::suiteSettings($suite, $config);
    }

    protected function getGlobalConfig($conf)
    {
        return Configuration::config($conf);
    }

    protected function getSuites($conf)
    {
        Configuration::config($conf);
        return Configuration::suites();
    }

} 
