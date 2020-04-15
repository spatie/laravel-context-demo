<?php

namespace App\Support\Serialization;

use Symfony\Component\Serializer\Mapping\ClassDiscriminatorMapping;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorResolverInterface;

class ClassDiscriminator implements ClassDiscriminatorResolverInterface
{
    private array $mappingForAbstractClasses = [];

    private array $morphClassMappings = [];

    /**
     * This function should be used to configure class mappings
     *
     * The first argument takes the abstract class or interface that needs morph maps
     * The second argument takes an array in the form of
     *
     *      [
     *          'morph_class_name' => ConcreteClass::class,
     *          …
     *      ]
     *
     * @param string $abstractClass
     * @param array $concreteMappings
     *
     * @return $this
     */
    public function mappingFor(string $abstractClass, array $concreteMappings): self
    {
        $this->mappingForAbstractClasses[$abstractClass] = $concreteMappings;

        foreach ($concreteMappings as $morphClass => $className) {
            $this->morphClassMappings[$className] = $morphClass;
        }

        return $this;
    }

    public function getMappingForClass(string $class): ?ClassDiscriminatorMapping
    {
        $mappingForClass = $this->mappingForAbstractClasses[$class] ?? null;

        if (! $mappingForClass) {
            return null;
        }

        return new ClassDiscriminatorMapping('morphClass', $mappingForClass);
    }

    public function getMappingForMappedObject($object): ?ClassDiscriminatorMapping
    {
        $morphClass = $this->morphClassMappings[get_class($object)] ?? null;

        if (! $morphClass) {
            return null;
        }

        return new ClassDiscriminatorMapping('morphClass');
    }

    public function getTypeForMappedObject($object): ?string
    {
        return $this->morphClassMappings[get_class($object)] ?? null;
    }
}
