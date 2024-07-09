<?php

declare(strict_types=1);

namespace Metadata\Tests;

use Metadata\MethodMetadata;
use Metadata\Tests\Fixtures\TestObject;
use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\TestCase;

class MethodMetadataTest extends TestCase
{
    public function testConstructor()
    {
        $metadata = new MethodMetadata('Metadata\Tests\Fixtures\TestObject', 'setFoo');
        $expectedReflector = new \ReflectionMethod('Metadata\Tests\Fixtures\TestObject', 'setFoo');
        $expectedReflector->setAccessible(true);

        $this->assertEquals('Metadata\Tests\Fixtures\TestObject', $metadata->class);
        $this->assertEquals('setFoo', $metadata->name);
        $this->assertEquals($expectedReflector, $metadata->reflection);
    }

    public function testSerializeUnserialize()
    {
        $metadata = new MethodMetadata('Metadata\Tests\Fixtures\TestObject', 'setFoo');

        $this->assertEquals($metadata, unserialize(serialize($metadata)));
    }

    public function testInvoke()
    {
        $obj = new TestObject();
        $metadata = new MethodMetadata('Metadata\Tests\Fixtures\TestObject', 'setFoo');

        $this->assertNull($obj->getFoo());
        $metadata->invoke($obj, ['foo']);
        $this->assertEquals('foo', $obj->getFoo());
    }

    public function testLazyReflectionCreationOnConstruction()
    {
        $metadata = new MethodMetadata(TestObject::class, 'setFoo');

        $reflectionProperty = new \ReflectionProperty(MethodMetadata::class, 'reflection');
        $reflectionProperty->setAccessible(true);

        $this->assertNull($reflectionProperty->getValue($metadata));
    }

    public function testLazyReflectionCreationOnUnserialize()
    {
        $metadata = new MethodMetadata(TestObject::class, 'setFoo');
        $metadataUnserialized = unserialize(serialize($metadata));

        $reflectionProperty = new \ReflectionProperty(MethodMetadata::class, 'reflection');
        $reflectionProperty->setAccessible(true);

        $this->assertNull($reflectionProperty->getValue($metadata));
    }

    public function testReflectionReadAccessReturnsSameInstance()
    {
        $metadata = new MethodMetadata(TestObject::class, 'setFoo');

        $reflection1 = $metadata->reflection;
        $reflection2 = $metadata->reflection;

        $this->assertInstanceOf(\ReflectionMethod::class, $reflection1);
        $this->assertSame($reflection1, $reflection2);
    }

    public function testReflectionWriteAccess()
    {
        $metadata = new MethodMetadata(TestObject::class, 'setFoo');

        $otherValue = new \ReflectionMethod(TestObject::class, 'getFoo');
        $metadata->reflection = $otherValue;

        $this->assertSame($otherValue, $metadata->reflection);
    }

    public function testReadAccessForUnknownProperty()
    {
        $metadata = new MethodMetadata(TestObject::class, 'setFoo');

        $this->expectException(Notice::class);
        $this->expectExceptionMessage('Undefined property: Metadata\MethodMetadata::$unknownProperty');

        $metadata->unknownProperty;
    }

    public function testWriteAccessForUnknownProperty()
    {
        $metadata = new MethodMetadata(TestObject::class, 'setFoo');

        $metadata->unknownProperty = 'some value';

        $this->assertSame('some value', $metadata->unknownProperty);
    }
}
