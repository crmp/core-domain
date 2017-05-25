<?php

namespace Crmp\Tests\UnitTests\Address;

use Crmp\Domain\Address\Role;
use Crmp\Tests\UnitTests\AbstractDomainTest;
use Ramsey\Uuid\Uuid;

class RoleTest extends AbstractDomainTest
{
    /**
     * @var Role
     */
    protected $role;

    /**
     * @var string
     */
    protected $title;

    public function testItHasSubRoles()
    {
        $role = new Role(uniqid('root', true));

        $otherOne   = new Role(uniqid('sub', true));
        $otherTwo   = new Role(uniqid('sub', true));
        $otherThree = new Role(uniqid('sub', true));

        $role->addSubordinated($otherOne);
        $role->addSubordinated($otherTwo);
        $role->addSubordinated($otherThree);

        static::assertEquals([$otherOne, $otherTwo, $otherThree], $role->getSubordinated());
    }

    public function testItHasAName()
    {
        static::assertEquals($this->title, $this->role->getTitle());
    }

    public function testItHasAUuid()
    {
        static::assertNamespace(['crmp', 'domain-crm', 'role'], Role::UUID_NS);
    }

    public function testUuidChangesPerTitle()
    {
        // Different
        $one = new Role(uniqid('title', true));
        $two = new Role(uniqid('title', true));

        static::assertNotEquals($one->getUUid(), $two->getUUid());

        // Same
        $one = new Role('the title');
        $two = new Role('the title');

        static::assertEquals($one->getTitle(), $two->getTitle());
    }

    protected function setUp()
    {
        $this->role = new Role(
            $this->title = uniqid('title', true)
        );
    }
}
