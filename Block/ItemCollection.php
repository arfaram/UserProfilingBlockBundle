<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ez\UserProfilingBlockBundle\Block;

use Ez\UserProfilingBlockBundle\Block\Model\TagItem;

/**
 * Items list for tag block.
 */
class ItemCollection
{
    /** @var \Ez\UserProfilingBlockBundle\Block\Model\TagItem[] */
    private $items = [];

    /**
     * @param \Ez\UserProfilingBlockBundle\Block\Model\TagItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns array of item objects.
     *
     * @return \Ez\UserProfilingBlockBundle\Block\Model\TagItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add item to Items.
     *
     * @param \Ez\UserProfilingBlockBundle\Block\Model\TagItem $item
     */
    public function addItem(TagItem $item)
    {
        $this->items[] = new TagItem(
            $item->getTagId(),
            $item->getContentId()
        );
    }
}
