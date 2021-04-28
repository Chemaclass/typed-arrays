<?php

declare(strict_types=1);

namespace TypedArraysTest\Unit\Fixtures;

use TypedArrays\AbstractTypedArray;

final class MutableSimpleObjectList extends AbstractTypedArray
{
    protected function enforceType(): string
    {
        return SimpleObject::class;
    }

    protected function collectionType(): string
    {
        return self::COLLECTION_TYPE_LIST;
    }
}
