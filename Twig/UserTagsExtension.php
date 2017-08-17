<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ez\UserProfilingBlockBundle\Twig;

use Ez\UserProfilingBlockBundle\User\UserInterests;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Twig helper for logged user tags.
 */
class UserTagsExtension extends Twig_Extension
{
    /** @var \Ez\UserProfilingBlockBundle\User\UserInterests */
    private $userInterests;

    /**
     * @param \Ez\UserProfilingBlockBundle\User\UserInterests $userInterests
     */
    public function __construct(UserInterests $userInterests)
    {
        $this->userInterests = $userInterests;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'logged_user_tags_extension';
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('get_user_tags', [$this, 'getUserTags']),
        ];
    }

    /**
     * Returns logged user tags.
     *
     * @return array
     */
    public function getUserTags()
    {
        return $this->userInterests->getListForLoggedUser();
    }
}
