<?php
/**
 * Box packing (3D bin packing, knapsack problem).
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace DVDoug\BoxPacker\Test;

use DVDoug\BoxPacker\Item;
use JsonSerializable;
use stdClass;

class TestItem implements Item, JsonSerializable
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $length;

    /**
     * @var int
     */
    private $depth;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var int
     */
    private $overhang_rate;

    /**
     * @var int
     */
    private $weight_limit;

    /**
     * @var array
     */
    private $positions;

    /**
     * @var array
     */
    private $stacking_limit;

    /**
     * @var int
     */
    private $keepFlat;

    /**
     * Test objects that recurse.
     *
     * @var stdClass
     */
    private $a;

    /**
     * Test objects that recurse.
     *
     * @var stdClass
     */
    private $b;

    /**
     * TestItem constructor.
     */
    public function __construct(
        string $description,
        int $width,
        int $length,
        int $depth,
        int $weight,
        int $overhang_rate,
        int $weight_limit,
        array $positions,
        array $stacking_limit,
        bool $keepFlat)
    {
        $this->description = $description;
        $this->width = $width;
        $this->length = $length;
        $this->depth = $depth;
        $this->weight = $weight;
        $this->overhang_rate = $overhang_rate;
        $this->weight_limit = $weight_limit;
        $this->positions = $positions;
        $this->stacking_limit = $stacking_limit;
        $this->keepFlat = $keepFlat;

        $this->a = new stdClass();
        $this->b = new stdClass();

        $this->a->b = $this->b;
        $this->b->a = $this->a;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getOverhangRate(): int
    {
        return $this->overhang_rate;
    }

    public function getWeightLimit(): int
    {
        return $this->weight_limit;
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function getStackingLimit(): array
    {
        return $this->stacking_limit;
    }

    public function getKeepFlat(): bool
    {
        return $this->keepFlat;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'description' => $this->description,
            'width' => $this->width,
            'length' => $this->length,
            'depth' => $this->depth,
            'weight' => $this->weight,
            'overhang_rate' => $this->overhang_rate,
            'weight_limit' => $this->weight_limit,
            'positions' => $this->positions,
            'stacking_limit' => $this->stacking_limit,
            'keepFlat' => $this->keepFlat,
        ];
    }
}
