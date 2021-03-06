<?php

/*
 * Socialist
 */

namespace tests\database;

use Trismegiste\Yuurei\Facade\Provider;
use Trismegiste\DokudokiBundle\Transform\Delegation\Stage\WhiteMagic;

/**
 * MongoDb_TestCase is a temmplate for Persistence with Yuurei
 */
class MongoDbTestCase extends \PHPUnit_Framework_TestCase
{

    /** @var \Trismegiste\Yuurei\Persistence\RepositoryInterface */
    protected $repo;

    /** @var \MongoCollection */
    protected $collection;

    private function createStage()
    {
        return new WhiteMagic([
            'post' => 'Trismegiste\Socialist\SimplePost',
            'user' => 'Trismegiste\Socialist\User',
            'author' => 'Trismegiste\Socialist\Author',
            'comm' => 'Trismegiste\Socialist\Commentary',
            'status' => 'Trismegiste\Socialist\Status'
        ]);
    }

    protected function setUp()
    {
        $connector = new \tests\Yuurei\Persistence\ConnectorTest();
        $this->collection = $connector->testCollection();
        $facade = new Provider($this->collection);
        $this->repo = $facade->createRepository($this->createStage());
    }

}
