<?php
namespace Training\TestOM\Model;

class PlayWithTest
{
    private $testObject;
    private $_testObjectFactory;
    private $manager;

    public function __construct(
        \Training\TestOM\Model\Test $testObject,
        \Training\TestOM\Model\TestFactory $testObjectFactory,
        \Training\TestOM\Model\ManagerCustomImplementation $manager
    )
    {
        $this->testObject = $testObject;
        $this->_testObjectFactory = $testObjectFactory;
        $this->manager = $manager;
    }

    public function run()
    {
        $this->testObject->log();
        $customArrayList = ['item1'=>'aaaaa', 'item2'=>'bbbb'];
        $newTestObject = $this->_testObjectFactory->create(['arrayList'=>$customArrayList, 'manager'=>$this->manager]);
        echo '</br>';
        echo '</br>';
        echo '</br>';
        echo '</br>';
        $newTestObject->log();
    }
}