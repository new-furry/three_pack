<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker\Test;

use DVDoug\BoxPacker\Box;
use JsonSerializable;

class TestBox implements Box, JsonSerializable
{
    /**
     * @var string
     */
    private $reference;

    /**
     * @var int
     */
    private $outerWidth;

    /**
     * @var int
     */
    private $outerLength;

    /**
     * @var int
     */
    private $outerDepth;

    /**
     * @var int
     */
    private $emptyWeight;

    /**
     * @var int
     */
    private $innerWidth;

    /**
     * @var int
     */
    private $innerLength;

    /**
     * @var int
     */
    private $innerDepth;

    /**
 * @var int
 */
    private $maxWeight;
    /**
     * @var int
     */
    private $maxWidth;
    /**
     * @var int
     */
    private $maxLength;
    /**
     * @var int
     */
    private $maxDepth;
    /**
     * @var int
     */
    private $quantity;
    /**
     * @var string
     */
    private $type;

    /**
     * TestBox constructor.
     */
    public function __construct(
        string $reference,
        int $outerWidth,
        int $outerLength,
        int $outerDepth,
        int $emptyWeight,
        int $innerWidth,
        int $innerLength,
        int $innerDepth,
        int $maxWeight,
        int $maxWidth,
        int $maxLength,
        int $maxDepth,
        int $quantity,
        string $type
    ) {
        $this->reference = $reference;
        $this->outerWidth = $outerWidth;
        $this->outerLength = $outerLength;
        $this->outerDepth = $outerDepth;
        $this->emptyWeight = $emptyWeight;
        $this->innerWidth = $innerWidth;
        $this->innerLength = $innerLength;
        $this->innerDepth = $innerDepth;
        $this->maxWeight = $maxWeight;
        $this->maxWidth = $maxWidth;
        $this->maxLength = $maxLength;
        $this->maxDepth = $maxDepth;
        $this->quantity = $quantity;
        $this->type = $type;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getOuterWidth(): int
    {
        return $this->outerWidth;
    }

    public function getOuterLength(): int
    {
        return $this->outerLength;
    }

    public function getOuterDepth(): int
    {
        return $this->outerDepth;
    }

    public function getEmptyWeight(): int
    {
        return $this->emptyWeight;
    }

    public function getInnerWidth(): int
    {
        return $this->innerWidth;
    }

    public function getInnerLength(): int
    {
        return $this->innerLength;
    }

    public function getInnerDepth(): int
    {
        return $this->innerDepth;
    }

    public function getMaxWeight(): int
    {
        return $this->maxWeight;
    }

    public function getMaxWidth(): int
    {
        return $this->maxWidth;
    }

    public function getMaxLength(): int
    {
        return $this->maxLengtha;
    }

    public function getMaxDepth(): int
    {
        return $this->maxDepth;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'reference' => $this->reference,
            'innerWidth' => $this->innerWidth,
            'innerLength' => $this->innerLength,
            'innerDepth' => $this->innerDepth,
            'emptyWeight' => $this->emptyWeight,
            'maxWeight' => $this->maxWeight,
            'maxWidth' => $this->maxWidth,
            'maxLength' => $this->maxLength,
            'maxDepth' => $this->maxDepth,
            'quantity' => $this->quantity,
            'type' => $this->type,
        ];
    }
}
